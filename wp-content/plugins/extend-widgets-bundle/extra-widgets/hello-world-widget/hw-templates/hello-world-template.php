<div>
	Widget template
You need to provide a template to tell the widget how it should be displayed. You supply a template name by overriding the get_template_name function and returning the name of the template file, without a .php file extension. By default, the base SiteOrigin_Widget class looks for a PHP file, with the name returned by get_template_name, in a tpl directory, in the widget directory. You can change this behaviour by overriding the get_template_dir function and returning the path of a directory (without leading or trailing slashes), relative to the widget class file.
    <?php echo $args['before_title'] ?>
    <h1><?php echo $instance['title'] ?></h1>
    <?php echo $args['after_title'] ?>
    <div>
        <a href="<?php $instance['link_url'] ?>"><?php $instance['link_text'] ?></a>
    </div>
</div>