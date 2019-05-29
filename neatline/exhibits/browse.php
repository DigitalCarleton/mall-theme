<?php
queue_js_file('jquery.masonry');
$title = __('Historical Maps');
echo head(array('title' => $title, 'bodyclass' => 'neatline'));
?>

<div role="main">

<?php echo flash(); ?>
<h1><?php echo $title; ?></h1>

<?php echo pagination_links(); ?>

<div class="questions">
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

</div>

<script>
var $container = jQuery('.questions');
// initialize
$container.masonry({
  itemSelector: '.questions',
  gutter: 20,
  isFitWidth: true
});
</script>

<?php echo foot(); ?>

