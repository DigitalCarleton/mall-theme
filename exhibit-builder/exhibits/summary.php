<?php queue_js_url('//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-525629892de15af0'); ?>
<?php queue_js_file('scavenger-hunts'); ?>
<?php queue_js_string("
  addthis.layers({
    'theme' : 'transparent',
    'share' : {
      'position' : 'left',
      'numPreferredServices' : 5
    }   
  });
"); ?>
<?php /* Load all exhibit builder child page layouts */ ?>
<?php set_exhibit_pages_for_loop_by_exhibit(); ?>
<?php foreach (loop('exhibit_page') as $exhibitPage): ?>
<?php endforeach; ?>

<?php echo head(array('title' => metadata('exhibit', 'title'), 'bodyclass'=>'exploration-answer')); ?>

<div role="main">

<h1><?php echo metadata('exhibit', 'title'); ?></h1>

<article class="answer">
<?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
<div class="exhibit-description">
    <?php echo $exhibitDescription; ?>
</div>
<?php endif; ?>

<?php if (($exhibitCredits = metadata('exhibit', 'credits'))): ?>
<div class="exhibit-credits">
    <h3><?php echo __('Credits'); ?></h3>
    <p><?php echo $exhibitCredits; ?></p>
</div>
<?php endif; ?>

<?php $relatedItems = array(); ?>

<div class="content">

<?php foreach (loop('exhibit_page') as $exhibitPage): ?>
    
    <h2><?php echo $exhibitPage->title; ?></h2>
  
    <?php exhibit_builder_render_exhibit_page($exhibitPage); ?>
    
    <?php $exhibitEntries  = $exhibitPage->getPageBlocks(); ?>
    
    <?php foreach ($exhibitEntries as $exhibitEntry): ?>
        <?php if ($exhibitItem = $exhibitEntry->item_id): ?>
            <?php $relatedItems[] = $exhibitItem; ?>
        <?php endif; ?>
    <?php endforeach; ?>

<?php endforeach; ?>

</div>

</article>

<aside class="learn-more">

    <div class="other-questions">
        <p class="back"><a href="<?php echo url('exhibits'); ?>">Go back to all Explorations of Medieval Rome</a></p>
        
    </div>
    
    <?php if (count($relatedItems) > 0): ?>
    <div class="items">
        <h3>Learn more about&hellip;</h3>
        <ul>
        <?php foreach($relatedItems as $relatedItem): ?>
            <?php $item = get_record_by_id('item', $relatedItem); ?>
            <li><?php echo link_to_item(null, array(), 'show', $item); ?></li>
        <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>

    <?php if (metadata('exhibit', 'has tags')): ?>
    <div class="themes">
        <h3>Explore other questions about&hellip;</h3>
        <?php echo tag_cloud('exhibit', 'explorations/browse'); ?>
    </div>
    <?php endif; ?>

</aside>

</div>
<?php echo foot(); ?>
