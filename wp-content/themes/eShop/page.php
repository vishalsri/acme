<?php get_header(); 
 global $theme_options;
?>
<!-- Top Header
================================================== --> 
<?php //get_template_part( 'partials/content','hero' ); ?>
<div class="main-content-inner">
    <div class="container">
        <div class="page-content">
		<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
		?>
        </div>
    </div>
    <div id="work-container">
        <div class="grid-sizer"></div>
        <div class="box col2 work-129  " style="  " onclick="void(0)">
            <div class="image">
                <img src="../wp-content/uploads/2015/02/honeywell_total_comfort_r_1070x535-1070x535.jpg" alt="" class="visible-sm visible-md visible-lg">
                <img src="../wp-content/uploads/2015/01/moreworks_hw_connect.jpg" alt="" class="visible-xs">
            </div>
            <div class="hfi-text">
                <div class="hfi-text-inner">
                    <h3>HONEYWELL TOTAL COMFORT</h3>
                    <div class="hfi-bottom">
                        <p>B2B &amp; B2C Mobile App</p>
                        <a href="total-comfort-app/index.html" class="btn btn-view">View Case Study</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="box col1 work-136  " style="  " onclick="void(0)">
            <div class="image">
                <img src="../wp-content/uploads/2015/02/duggal.jpg" alt="" class="visible-sm visible-md visible-lg">
                <img src="../wp-content/uploads/2015/02/duggal-min.jpg" alt="" class="visible-xs">
            </div>
            <div class="hfi-text">
                <div class="hfi-text-inner">
                    <h3>Duggal</h3>
                    <div class="hfi-bottom">
                        <p>B2C Corporate Website</p>
                        <a href="duggal/index.html" class="btn btn-view">View Case Study</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="box col1 work-130  " style="  " onclick="void(0)">
            <div class="image">
                <img src="../wp-content/uploads/2017/02/RC_WORK_LISTING-535x1070.jpg" alt="" class="visible-sm visible-md visible-lg">
                <img src="../wp-content/uploads/2017/02/RC_WORK_MAIN_535-1.jpg" alt="" class="visible-xs">
            </div>
            <div class="hfi-text">
                <div class="hfi-text-inner">
                    <h3>Renaissance Capital</h3>
                    <div class="hfi-bottom">
                        <p>B2B Corporate Website</p>
                        <a href="renaissance-capital/index.html" class="btn btn-view">View Case Study</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="box col1 work-138  " style="  " onclick="void(0)">
            <div class="image">
                <img src="../wp-content/uploads/2015/02/main_5351.jpg" alt="" class="visible-sm visible-md visible-lg">
                <img src="../wp-content/uploads/2015/02/main_5351.jpg" alt="" class="visible-xs">
            </div>
            <div class="hfi-text">
                <div class="hfi-text-inner">
                    <h3>AnimalPak</h3>
                    <div class="hfi-bottom">
                        <p>B2C Ecommerce Website</p>
                        <a href="animalpak/index.html" class="btn btn-view">View Case Study</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="box col1 work-136  " style="  " onclick="void(0)">
            <div class="image">
                <img src="../wp-content/uploads/2016/09/bonchon_535.jpg" alt="" class="visible-sm visible-md visible-lg">
                <img src="../wp-content/uploads/2016/09/bonchon_535-1.jpg" alt="" class="visible-xs">
            </div>
            <div class="hfi-text">
                <div class="hfi-text-inner">
                    <h3>Bonchon</h3>
                    <div class="hfi-bottom">
                        <p>B2C Corporate Website</p>
                        <a href="bonchon/index.html" class="btn btn-view">View Case Study</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="box col2  " style="color:#FFF; background-color:#7fa588">
            <img src="../wp-content/uploads/2015/02/1070x535-1070x535.png" alt="" class="visible-sm visible-md visible-lg">
            <img src="../wp-content/uploads/2015/02/535x535.png" alt="" class="visible-xs">
            <div class="quote-text">
                <p>At Lounge Lizard, our success is measured by your success. For us it&#8217;s not just creating something that looks great; it needs to deliver results!</p>
            </div>
        </div>
        <div class="box col1 work-142  " style="  " onclick="void(0)">
            <div class="image">
                <img src="../wp-content/uploads/2018/03/work-535x535.jpg" alt="" class="visible-sm visible-md visible-lg">
                <img src="../wp-content/uploads/2018/03/work-535x535.jpg" alt="" class="visible-xs">
            </div>
            <div class="hfi-text">
                <div class="hfi-text-inner">
                    <h3>Cooperative Elevator</h3>
                    <div class="hfi-bottom">
                        <p>B2C &amp; B2B Corporate Website</p>
                        <a href="cooperative-elevator/index.html" class="btn btn-view">View Case Study</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="box col1 work-131  " style="  " onclick="void(0)">
            <div class="image">
                <img src="../wp-content/uploads/2015/02/main_5352.jpg" alt="" class="visible-sm visible-md visible-lg">
                <img src="../wp-content/uploads/2015/02/main_5352.jpg" alt="" class="visible-xs">
            </div>
            <div class="hfi-text">
                <div class="hfi-text-inner">
                    <h3>The Broadway League</h3>
                    <div class="hfi-bottom">
                        <p>B2B Membership Website</p>
                        <a href="the-broadway-league/index.html" class="btn btn-view">View Case Study</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="box col1 work-139  " style="  " onclick="void(0)">
            <div class="image">
                <img src="../wp-content/uploads/2015/02/cheery_main_535x1070-535x1070.jpg" alt="" class="visible-sm visible-md visible-lg">
                <img src="../wp-content/uploads/2015/02/cheery_main_5351-min.jpg" alt="" class="visible-xs">
            </div>
            <div class="hfi-text">
                <div class="hfi-text-inner">
                    <h3>Cheery</h3>
                    <div class="hfi-bottom">
                        <p>B2C Mobile Application</p>
                        <a href="cheery/index.html" class="btn btn-view">View Case Study</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="box col2 work-130  " style="  " onclick="void(0)">
            <div class="image">
                <img src="../wp-content/uploads/2015/02/Main_1070-1070x535.jpg" alt="" class="visible-sm visible-md visible-lg">
                <img src="../wp-content/uploads/2015/02/fletcher_knight_535-min.jpg" alt="" class="visible-xs">
            </div>
            <div class="hfi-text">
                <div class="hfi-text-inner">
                    <h3>Fletcher-Knight</h3>
                    <div class="hfi-bottom">
                        <p>B2B Corporate Website</p>
                        <a href="fletcher-knight/index.html" class="btn btn-view">View Case Study</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="box col2 work-130  " style="  " onclick="void(0)">
            <div class="image">
                <img src="../wp-content/uploads/2016/09/thor_1070x535-1070x535.jpg" alt="" class="visible-sm visible-md visible-lg">
                <img src="../wp-content/uploads/2016/09/thor_535.jpg" alt="" class="visible-xs">
            </div>
            <div class="hfi-text">
                <div class="hfi-text-inner">
                    <h3>Thor</h3>
                    <div class="hfi-bottom">
                        <p>B2B Corporate Website</p>
                        <a href="thor/index.html" class="btn btn-view">View Case Study</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="box col1 work-139  " style="  " onclick="void(0)">
            <div class="image">
                <img src="../wp-content/uploads/2016/11/Main_535.jpg" alt="" class="visible-sm visible-md visible-lg">
                <img src="../wp-content/uploads/2016/11/Main_535-2.jpg" alt="" class="visible-xs">
            </div>
            <div class="hfi-text">
                <div class="hfi-text-inner">
                    <h3>Siraj</h3>
                    <div class="hfi-bottom">
                        <p>B2C Mobile Application</p>
                        <a href="siraj/index.html" class="btn btn-view">View Case Study</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="box col1 work-138  " style="  " onclick="void(0)">
            <div class="image">
                <img src="../wp-content/uploads/2015/02/kyboe_main_535.jpg" alt="" class="visible-sm visible-md visible-lg">
                <img src="../wp-content/uploads/2015/02/kyboe_main_535.jpg" alt="" class="visible-xs">
            </div>
            <div class="hfi-text">
                <div class="hfi-text-inner">
                    <h3>KYBOE!</h3>
                    <div class="hfi-bottom">
                        <p>B2C Ecommerce Website</p>
                        <a href="kyboe/index.html" class="btn btn-view">View Case Study</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="box col1  " style="color:#FFF; background-color:#fe5d4b">
            <img src="../wp-content/uploads/2015/02/535x535.png" alt="" class="visible-sm visible-md visible-lg">
            <img src="../wp-content/uploads/2015/02/535x535.png" alt="" class="visible-xs">
            <div class="quote-text">
                <p>We pour every ounce of creativity, tech wizardry, and passion into every project</p>
            </div>
        </div>
        <div class="box col1 work-133  " style="  " onclick="void(0)">
            <div class="image">
                <img src="../wp-content/uploads/2015/02/motorola_cid1.jpg" alt="" class="visible-sm visible-md visible-lg">
                <img src="../wp-content/uploads/2015/01/moreworks_motorola.jpg" alt="" class="visible-xs">
            </div>
            <div class="hfi-text">
                <div class="hfi-text-inner">
                    <h3>Motorola Solutions</h3>
                    <div class="hfi-bottom">
                        <p>B2B Social Network</p>
                        <a href="motorola-solutions/index.html" class="btn btn-view">View Case Study</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="box col2 work-130  " style="  " onclick="void(0)">
            <div class="image">
                <img src="../wp-content/uploads/2015/02/NIRU_main1070-1070x535.png" alt="" class="visible-sm visible-md visible-lg">
                <img src="../wp-content/uploads/2015/02/NIRU_main535.jpg" alt="" class="visible-xs">
            </div>
            <div class="hfi-text">
                <div class="hfi-text-inner">
                    <h3>Niru Group</h3>
                    <div class="hfi-bottom">
                        <p>B2B Corporate Website</p>
                        <a href="niru-group/index.html" class="btn btn-view">View Case Study</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="box col1 work-136  " style="  " onclick="void(0)">
            <div class="image">
                <img src="../wp-content/uploads/2018/01/535x1070-535x1070.jpg" alt="" class="visible-sm visible-md visible-lg">
                <img src="../wp-content/uploads/2018/01/535x535.jpg" alt="" class="visible-xs">
            </div>
            <div class="hfi-text">
                <div class="hfi-text-inner">
                    <h3>Sachem Public Library</h3>
                    <div class="hfi-bottom">
                        <p>B2C Corporate Website</p>
                        <a href="sachem-public-library/index.html" class="btn btn-view">View Case Study</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="box col1 work-132  " style="  " onclick="void(0)">
            <div class="image">
                <img src="../wp-content/uploads/2015/02/work_listing_535x1070-535x1070.jpg" alt="" class="visible-sm visible-md visible-lg">
                <img src="../wp-content/uploads/2015/02/work_main_535-min.jpg" alt="" class="visible-xs">
            </div>
            <div class="hfi-text">
                <div class="hfi-text-inner">
                    <h3>FESTO</h3>
                    <div class="hfi-bottom">
                        <p>B2B Mobile Application</p>
                        <a href="festo/index.html" class="btn btn-view">View Case Study</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="box col1 work-130  " style="  " onclick="void(0)">
            <div class="image">
                <img src="../wp-content/uploads/2018/01/work-535x535.jpg" alt="" class="visible-sm visible-md visible-lg">
                <img src="../wp-content/uploads/2018/01/work-535x535.jpg" alt="" class="visible-xs">
            </div>
            <div class="hfi-text">
                <div class="hfi-text-inner">
                    <h3>Datorama</h3>
                    <div class="hfi-bottom">
                        <p>B2B Corporate Website</p>
                        <a href="datorama/index.html" class="btn btn-view">View Case Study</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="box col2 work-130  " style="  " onclick="void(0)">
            <div class="image">
                <img src="../wp-content/uploads/2018/01/work-1070x535-1070x535.jpg" alt="" class="visible-sm visible-md visible-lg">
                <img src="../wp-content/uploads/2018/01/work-535x535-1.jpg" alt="" class="visible-xs">
            </div>
            <div class="hfi-text">
                <div class="hfi-text-inner">
                    <h3>Agility</h3>
                    <div class="hfi-bottom">
                        <p>B2B Corporate Website</p>
                        <a href="agility/index.html" class="btn btn-view">View Case Study</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="box col2 work-130  " style="  " onclick="void(0)">
            <div class="image">
                <img src="../wp-content/uploads/2017/11/silvercast-1070x535-1070x535.jpg" alt="" class="visible-sm visible-md visible-lg">
                <img src="../wp-content/uploads/2017/11/silvercast-535x535.jpg" alt="" class="visible-xs">
            </div>
            <div class="hfi-text">
                <div class="hfi-text-inner">
                    <h3>Silvercast</h3>
                    <div class="hfi-bottom">
                        <p>B2B Corporate Website</p>
                        <a href="silvercast/index.html" class="btn btn-view">View Case Study</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="box col1 work-141  " style="  " onclick="void(0)">
            <div class="image">
                <img src="../wp-content/uploads/2017/11/fidgy-535x535.jpg" alt="" class="visible-sm visible-md visible-lg">
                <img src="../wp-content/uploads/2017/11/fidgy-535x535.jpg" alt="" class="visible-xs">
            </div>
            <div class="hfi-text">
                <div class="hfi-text-inner">
                    <h3>Fidgy</h3>
                    <div class="hfi-bottom">
                        <p>B2C Mobile Game</p>
                        <a href="fidgy/index.html" class="btn btn-view">View Case Study</a>
                    </div>
                </div>
            </div>
        </div>
        <p style="clear:both;"></p>
    </div>
    <script type="text/javascript">
        jQuery(function($) {
            setTimeout(function() {
                $("#work-container").css("visibility", "visible");
            }, 500);

            function wndsize() {
                var w = 0;
                var h = 0;
                //IE
                if (!window.innerWidth) {
                    if (!(document.documentElement.clientWidth == 0)) {
                        //strict mode
                        w = document.documentElement.clientWidth;
                        h = document.documentElement.clientHeight;
                    } else {
                        //quirks mode
                        w = document.body.clientWidth;
                        h = document.body.clientHeight;
                    }
                } else {
                    //w3c
                    w = window.innerWidth;
                    h = window.innerHeight;
                }
                return {
                    width: w,
                    height: h
                };
            }
            var $container = $('#work-container');
            //fixes 1-2px rounding issue dealing with 3 columns
            $(window).resize(function() {
                //var windowWidth = $(window).width();
                var windowWidth = wndsize()['width'];
                var remainder = windowWidth % 3;
                $('#work-container').css('width', windowWidth - remainder);
            });
            $(window).resize();
            // $container.imagesLoaded(function() {
                // $container.masonry({
                    // itemSelector: '.box',
                    // gutter: 0,
                    // columnWidth: '.grid-sizer',
                    // percentPosition: true,
                    // maxColumnHeightDifference: 3
                // });
            // });
        });
    </script>
</div>

<?php
	get_footer(); 
?>