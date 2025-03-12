<!doctype html>
<html lang="<?php echo get_html_lang(); ?>">

<head>
    <title><?php echo option('site_title'); echo isset($title) ? ' | ' . strip_formatting($title) : ''; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=yes" />
    <?php if ($description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>

    <?php echo auto_discovery_link_tags(); ?>

    <?php fire_plugin_hook('public_head',array('view'=>$this)); ?>

    <!-- Stylesheets -->
    <?php
    queue_css_url('https://fonts.googleapis.com/css?family=Raleway:400,600');
    queue_css_file('style');

    echo head_css();
    ?>

    <!-- JavaScripts -->
    <?php queue_js_file('vendor/selectivizr', 'javascripts', array('conditional' => '(gte IE 6)&(lte IE 8)')); ?>
    <?php queue_js_file(array('fastclick', 'mall.modernizr.min', 'vendor/respond', 'jquery.scrollTo.min', 'globals', 'events')); ?>
    <?php queue_js_string("
          window.addEventListener('load', function() {
              FastClick.attach(document.body);
          }, false);
    "); ?>
    <?php echo head_js(); ?>

</head>

<?php if(!@$bodyclass): ?>
<?php $bodyclass = 'home'; ?>
<?php endif; ?>

<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
    <header>
        <div class="row">
            <div class="column">
                <h1 id="site-title"><?php echo link_to_home_page(theme_logo(), array('alt' => 'Logo for Carleton Guide to Medieval Rome', 'title' => 'Logo for Carleton Guide to Medieval Rome')); ?></h1>
            </div>
            <div class="column">
                <nav id="navigation" data-role="none">
                    <?php echo public_nav_main(); ?>
                </nav>
            </div>
        </div>
        
            
        <?php echo search_form(); ?>
    

    </header>
