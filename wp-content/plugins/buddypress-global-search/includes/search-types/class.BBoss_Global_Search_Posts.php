<?php 
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

if (!class_exists('BBoss_Global_Search_Posts')):

	/**
	 *
	 * BuddyPress Global Search  - search posts
	 * **************************************
	 *
	 *
	 */
	class BBoss_Global_Search_Posts extends BBoss_Global_Search_Type {
		private $pt_name;
		private $search_type;

		/**
		 * A real constructor. Since we do want multiple copies of this class.
		 * The idea is to have one object for each searchable custom post type.
		 *
		 * @since 1.0.0
		 */
		public function __construct( $pt_name, $search_type ) {
			$this->pt_name = $pt_name;
			$this->search_type =$search_type;

			add_action( "bboss_global_search_settings_item_{$this->search_type}", array( $this, 'print_search_options' ) );
		}

		
		public function sql( $search_term, $only_totalrow_count=false ){
			/* an example UNION query :- 
			-----------------------------------------------------
			(
				SELECT 
					wp_posts.id , 'posts' as type, wp_posts.post_title LIKE '%ho%' AS relevance, wp_posts.post_date as entry_date 
				FROM 
					wp_posts 
				WHERE 
					1=1 
					AND (
							(
									(wp_posts.post_title LIKE '%ho%') 
								OR 	(wp_posts.post_content LIKE '%ho%')
							)
						) 
					AND wp_posts.post_type IN ('post', 'page', 'attachment') 
					AND (
						wp_posts.post_status = 'publish' 
						OR wp_posts.post_author = 1 
						AND wp_posts.post_status = 'private'
					) 
			)
			----------------------------------------------------
			*/
			global $wpdb;
			$query_placeholder = array(); 
			
			$sql = " SELECT ";
			
			if( $only_totalrow_count ){
				$sql .= " COUNT( DISTINCT id ) ";
			} else {
				$sql .= " DISTINCT id , %s as type, post_title LIKE %s AS relevance, post_date as entry_date  ";
				$query_placeholder[] = $this->search_type;
				$query_placeholder[] = '%'. $search_term .'%';
			}

			$sql .= " FROM {$wpdb->posts} p ";


			/* ++++++++++++++++++++++++++++++++
			 * wp_posts table fields
			 +++++++++++++++++++++++++++++++ */
			$items_to_search = buddyboss_global_search()->option('items-to-search');
			$post_fields 	 = array();
			$tax 			 = array();
			foreach( $items_to_search as $item ) {

				//see print_search_options
				if( strpos( $item, 'post_field_' )===0 ){
					$post_field = str_replace( 'post_field_', '', $item );
					$post_fields[$post_field] = true;
				}

				if ( strpos( $item, '-tax-' ) ) {
					$tax[] = str_replace( $this->search_type.'-tax-', '', $item );
				}
			}

			//Tax query left join
			if ( ! empty( $tax ) ) {
				$sql .= " LEFT JOIN {$wpdb->term_relationships} r ON p.ID = r.object_id ";
			}

			//WHERE
			$sql .= ' WHERE 1=1 AND ( p.post_title LIKE %s OR p.post_content LIKE %s ';
			$query_placeholder[] = '%'. $search_term .'%';
			$query_placeholder[] = '%'. $search_term .'%';

			//Tax query
			if ( ! empty( $tax ) ) {

				$tax_in_arr = array_map( function( $t_name ) {
					return "'" . $t_name . "'";
				}, $tax );

				$tax_in = implode( ', ', $tax_in_arr );

				$sql .= " OR  r.term_taxonomy_id IN (SELECT tt.term_taxonomy_id FROM {$wpdb->term_taxonomy} tt INNER JOIN {$wpdb->terms} t ON 
					  t.term_id = tt.term_id WHERE ( t.slug LIKE %s OR t.name LIKE %s ) AND  tt.taxonomy IN ({$tax_in}) )";
					$query_placeholder[] = '%'. $search_term .'%';
					$query_placeholder[] = '%'. $search_term .'%';
			}

			//Meta query
			if ( ! empty( $post_fields[$this->pt_name.'_meta'] ) ) {
				$sql .= " OR p.ID IN (SELECT post_id FROM {$wpdb->postmeta} WHERE meta_value LIKE %s )";
				$query_placeholder[] = '%'. $search_term .'%';
			}

			//Post should be publish
			$sql .= ") AND p.post_type = '{$this->pt_name}' AND p.post_status = 'publish' ";

			$sql = $wpdb->prepare( $sql, $query_placeholder );

            return apply_filters( 
                'BBoss_Global_Search_Posts_sql', 
                $sql, 
                array( 
                    'search_term'           => $search_term,
                    'only_totalrow_count'   => $only_totalrow_count,
                ) 
            );
		}
		
		protected function generate_html( $template_type='' ){
			$post_ids = array();
			foreach( $this->search_results['items'] as $item_id=>$item_html ){
				$post_ids[] = $item_id;
			}

			//now we have all the posts
			//lets do a wp_query and generate html for all posts
			$qry = new WP_Query( array( 'post_type' => $this->pt_name, 'post__in'=>$post_ids ) );

			if( $qry->have_posts() ){
				while( $qry->have_posts() ){
					$qry->the_post();	
					$result = array(
						'id'	=> get_the_ID(),
						'type'	=> $this->search_type,
						'title'	=> get_the_title(),
						'html'	=> buddyboss_global_search_buffer_template_part( 'loop/post', $template_type, false ),
					);

					$this->search_results['items'][get_the_ID()] = $result;
				}
			}
			wp_reset_postdata();
		}


		/**
		 * What taxonomy should be searched on?
		 * Should search on the Post Meta?
		 *
		 * Prints options to search through all registered taxonomies with give
		 * post type e.g $this->cpt_name
		 *
		 * Print options to search through Post Meta
		 */
		function print_search_options( $items_to_search ){
			global $wp_taxonomies;
			echo "<div class='wp-posts-fields' style='margin: 10px 0 10px 30px'>";
			//echo "<p class='wp-post-part-name' style='margin: 5px 0'><strong>" . __('Account','buddypress-global-search') . "</strong></p>";

			/**  Post Meta Field **********************************/

			$label 		= sprintf( __('%s Meta', 'buddypress-global-search' ), ucfirst( $this->pt_name ) );
			$item 		= 'post_field_' . $this->pt_name.'_meta';
			$checked 	= ! empty( $items_to_search ) && in_array( $item, $items_to_search ) ? ' checked' : '';

			echo "<label><input type='checkbox' value='{$item}' name='buddyboss_global_search_plugin_options[items-to-search][]' {$checked}>{$label}</label><br>";

			/** Post Taxonomies Fields *********************************/
			$pt_taxonomy = get_object_taxonomies( $this->pt_name ) ;

			foreach ( $pt_taxonomy as $tax ) {

				$label 		= ucwords( str_replace( '_', ' ', $tax ) );
				$value 		= $this->search_type.'-tax-'.$tax;
				$checked 	= !empty( $items_to_search ) && in_array( $value, $items_to_search ) ? ' checked' : '';

				echo "<label><input type='checkbox' value='{$value}' name='buddyboss_global_search_plugin_options[items-to-search][]' {$checked}>{$label}</label><br>";
			}

			echo "</div><!-- .wp-user-fields -->";
		}
		
	}

// End class BBoss_Global_Search_Posts

endif;
?>