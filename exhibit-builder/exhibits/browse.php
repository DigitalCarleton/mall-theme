<?php
queue_js_file('jquery.masonry');
$title = __('Explore Medieval Rome');
echo head(array('title' => $title, 'bodyclass' => 'explorations browse'));
?>

<div role="main">

<h1><?php echo $title; ?></h1>
<?php if (count($exhibits) > 0): ?>

<?php echo pagination_links(); ?>
    
<div class="neatline">
  <?php foreach (loop('NeatlineExhibit') as $e): ?>
          <h2>
            <?php echo nl_getExhibitLink(
              $e, 'show', nl_getExhibitField('title'),
              array('class' => 'neatline'), true
            );?>
          </h2>
        <?php endforeach; ?>
</div>

<?php echo pagination_links(); ?>

<?php else: ?>
<p><?php echo __('There are no exhibits available yet.'); ?></p>
<?php endif; ?>

</div>

<script>
var $container = jQuery('.neatline');
// initialize
$container.masonry({
  itemSelector: '.neatline',
  isFitWidth: true,
  gutter: 10
});
</script>

<?php echo foot(); ?>
