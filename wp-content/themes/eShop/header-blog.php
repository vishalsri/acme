<?php
/**
 * The template for displaying the header of the Blog page
 *
 * @package eShop
 * @subpackage eShop
 */
 global $theme_options;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<!--
====================================================================================================================================== Site by eShopgenius.com==================================================
========================================================================================================
-->
	<head>
	<!-- Title of the Page 
================================================== -->
		<title>
		<?php
			if ( is_category() ) {
				echo __('Category Archive for &quot;', 'eShop'); single_cat_title(); echo __('&quot; | ', 'eShop'); bloginfo( 'name' );
			} elseif ( is_tag() ) {
				echo __('Tag Archive for &quot;', 'eShop'); single_tag_title(); echo __('&quot; | ', 'eShop'); bloginfo( 'name' );
			} elseif ( is_archive() ) {
				wp_title(''); echo __(' Archive | ', 'eShop'); bloginfo( 'name' );
			} elseif ( is_search() ) {
				echo __('Search for &quot;', 'eShop').wp_specialchars($s).__('&quot; | ', 'eShop'); bloginfo( 'name' );
			} elseif ( is_home() || is_front_page()) {
				bloginfo( 'name' ); echo ' | '; bloginfo( 'description' );
			}  elseif ( is_404() ) {
				echo __('Error 404 Not Found | ', 'eShop'); bloginfo( 'name' );
			} elseif ( is_single() ) {
				wp_title('');
			} else {
				echo wp_title( ' | ', false, 'right' ); bloginfo( 'name' );
			}
		?>
		</title>
		<!-- Basic Page Needs
================================================== -->
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif; ?>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<link rel="icon" type="image/x-icon" href="<?php echo $theme_options['favicon']['url']; ?>">
		<!-- CSS -->
 		<link rel="stylesheet" type="text/css" href="../wp-content/themes/eShop/blog/css/main.css">
	<!-- Wordpress Header
================================================== -->
		<?php //wp_head(); // For plugins ?>
	</head>
	<body <?php //body_class(); ?>>
		<script src="../wp-content/themes/eShop/blog/js/lib/greensock/TweenMax_min.js"></script>
		<!-- Tools n Utils -->
		<script src="../wp-content/themes/eShop/blog/js/lib/setsnail/system/BrowserDetect_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/lib/setsnail/debug/Debug_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/lib/setsnail/animation/AnimationUtils_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/lib/setsnail/utils/Trace_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/lib/setsnail/utils/EventDispatcher_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/lib/setsnail/utils/ColorUtils_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/lib/setsnail/utils/CSS_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/lib/setsnail/utils/Snail_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/lib/setsnail/utils/ArrayUtils_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/lib/setsnail/utils/RenderEngine_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/lib/setsnail/utils/StringUtils_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/lib/setsnail/utils/instafeed.min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/lib/setsnail/utils/MapUtils_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/lib/setsnail/share/ShareUtils_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/lib/setsnail/search/SearchManager_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/lib/setsnail/text/Text_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/lib/setsnail/prototype/array/sortOn_min.js"></script>
		<!-- TouchLib -->
		<script src="../wp-content/themes/eShop/blog/js/lib/setsnail/touch/Touchable_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/lib/setsnail/touch/TouchDragger_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/lib/setsnail/touch/utils/DragGroup_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/lib/setsnail/touch/utils/DragInfo_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/lib/setsnail/touch/utils/GroupDragger_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/lib/setsnail/touch/utils/TouchInfo_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/lib/setsnail/touch/utils/EaseInfo_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/lib/setsnail/touch/plugins/DraggerPlugin_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/lib/setsnail/touch/plugins/DraggerEasePlugin_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/lib/setsnail/touch/plugins/DragBasic_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/lib/setsnail/touch/plugins/DragBounds_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/lib/setsnail/touch/plugins/DragEase_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/lib/setsnail/utils/Rectangle_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/lib/setsnail/utils/MathUtils_min.js"></script>
		<!-- ResizeManager -->
		<script src="../wp-content/themes/eShop/blog/js/lib/setsnail/resize/ResizeManager_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/lib/setsnail/resize/ResizeManagerSettings_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/lib/setsnail/resize/ResizeEvents_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/lib/setsnail/video/VideoPlayer_min.js"></script>
		<!-- RetinaHandler -->
		<script src="../wp-content/themes/eShop/blog/js/lib/setsnail/image/RetinaImage_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/lib/setsnail/retina/RetinaHandle_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/lib/setsnail/retina/RetinaHandleEvents_min.js"></script>
		<!-- ContentManager -->
		<script src="../wp-content/themes/eShop/blog/js/lib/setsnail/contentManager/ContentManager_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/lib/setsnail/contentManager/TemplateData_min.js"></script>
		<!--
		END SnailLib
		-->
		<!-- Src -->
		<script src="../wp-content/themes/eShop/blog/js/src/Main_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/src/setsnail/Config_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/src/setsnail/Assets_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/src/setsnail/ui/UIColors_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/src/setsnail/utils/GuideLines_min.js"></script>
		<!--<script src="../wp-content/themes/eShop/blog/js/src/setsnail/utils/LinedCircle.js"></script>-->
		<!--<script src="../wp-content/themes/eShop/blog/js/src/setsnail/utils/RoundCircleGroup.js"></script>-->
		<!--<script src="../wp-content/themes/eShop/blog/js/src/setsnail/utils/GroupedCircles.js"></script>-->
		<script src="../wp-content/themes/eShop/blog/js/src/setsnail/utils/ScrollController_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/src/setsnail/utils/ImageSlider_min.js"></script>
		<!--LINES-->
		<script src="../wp-content/themes/eShop/blog/js/src/setsnail/utils/Lines/PsychedelicLines_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/src/setsnail/utils/Lines/LineMaskDrawer_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/src/setsnail/utils/Lines/LineMaskShape_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/src/setsnail/utils/Lines/CirclesOnALines_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/src/setsnail/ui/buttons/TextButton_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/src/setsnail/ui/text/TextArea_min.js"></script>
		<!-- Templates -->
		<script src="../wp-content/themes/eShop/blog/js/src/setsnail/templates/PageTemplate_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/src/setsnail/templates/TemplateHome_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/src/setsnail/templates/TemplateCase_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/src/setsnail/templates/TemplateCasesOverview_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/src/setsnail/templates/TemplatePrincip_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/src/setsnail/templates/TemplateProfil_min.js"></script>
		<!-- Modules -->
		<script src="../wp-content/themes/eShop/blog/js/src/setsnail/ui/modules/Module_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/src/setsnail/ui/modules/WhiteSpaceModule_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/src/setsnail/ui/modules/ReturnModule_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/src/setsnail/ui/modules/BasicHomeModule_min.js"></script>
        <script src="../wp-content/themes/eShop/blog/js/src/setsnail/ui/modules/home/HomeStoryModule_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/src/setsnail/ui/modules/case/CaseOverviewModule_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/src/setsnail/ui/modules/case/CaseHomeModule_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/src/setsnail/ui/modules/case/CaseImageModule_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/src/setsnail/ui/modules/case/CaseVideoModule_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/src/setsnail/ui/modules/case/CaseTextModule_min.js"></script>
        <script src="../wp-content/themes/eShop/blog/js/src/setsnail/ui/modules/casesoverview/OverviewCaseModule_min.js"></script>
        <script src="../wp-content/themes/eShop/blog/js/src/setsnail/ui/modules/principles/PrincipleSectionModule_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/src/setsnail/ui/modules/profile/ProfileEmployeeModule_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/src/setsnail/ui/modules/profile/ProfileInfoModule_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/src/setsnail/ui/modules/profile/ProfileEmployee_min.js"></script>
        <!-- Components -->
        <script src="../wp-content/themes/eShop/blog/js/src/setsnail/ui/components/Footer_min.js"></script>
        <script src="../wp-content/themes/eShop/blog/js/src/setsnail/ui/components/HomeStory_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/src/setsnail/ui/components/CasesInfoBox_min.js"></script>
		<!-- Menu -->
		<script src="../wp-content/themes/eShop/blog/js/src/setsnail/ui/menu/MainMenu_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/src/setsnail/ui/menu/MenuBorder_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/src/setsnail/ui/menu/MenuBorderLines_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/src/setsnail/ui/menu/MenuLogo_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/src/setsnail/ui/menu/MenuContent_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/src/setsnail/ui/menu/MenuContactInfo_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/src/setsnail/ui/menu/MenuFooter_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/src/setsnail/ui/menu/MenuSelector_min.js"></script>
		<script src="../wp-content/themes/eShop/blog/js/src/setsnail/ui/menu/MenuSocial_min.js"></script>