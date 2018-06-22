
    <div id="mySidenav" class="sidenav side-menu">

    <?php
        //$location = 'festival_menu';
        //$menu_obj = wpse45700_get_menu_by_location($location);
        //echo "<h3>".esc_html($menu_obj->name)."</h3>";
    ?>
      <a href="#" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="tab_menu">
        <?php $menu_obj = wpse45700_get_menu_by_location('tab_menu'); ?>
          <?php wp_nav_menu( array( 'theme_location' 	=> 'tab_menu',
                                    'items_wrap'		=> '<ul class="list-inline top-menu" id="">%3$s</ul>',
                                    'menu_class' 		=> '' ,
                                    'container_id' => $menu_obj->name ) ); ?>
        </div>
        <div class="menu_content">
            <?php $menu_obj = wpse45700_get_menu_by_location('festival_menu'); ?>
            <?php wp_nav_menu( array( 'theme_location' 	=> 'festival_menu',
                                    'items_wrap'		=> '<ul class="sub_menu" id="info">%3$s</ul>',
                                    'menu_class' 		=> '',
                                    'container_id' => $menu_obj->name ) ); ?>
        </div>
        <div class="menu_content">
        <?php $menu_obj = wpse45700_get_menu_by_location('ship_menu'); ?>
        <?php wp_nav_menu( array( 'theme_location' 	=> 'ship_menu',
                                'items_wrap'		=> '<ul class="sub_menu" id="ship">%3$s</ul>',
                                'menu_class' 		=> '',
                                'container_id' => $menu_obj->name) ); ?>
        </div>
    </div>



    <script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "40rem";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
    </script>
