<?php
queue_js_file('scavenger-hunts');
echo head(array(
    'title' => metadata('exhibit_page', 'title') . ' &middot; ' . metadata('exhibit', 'title'),
    'bodyclass' => 'explorations exploration-answer show'));
?>

<div role="main">
    <h1><span class="exhibit-page"><?php echo metadata('exhibit_page', 'title'); ?></h1>

    <div class="content">
        <?php exhibit_builder_render_exhibit_page(); ?>
    </div>

    <aside class="learn-more">
        <nav id="exhibit-pages" class="side">
            <div class = "items">
                <h4><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></h4>
                <?php echo exhibit_builder_page_tree($exhibit, $exhibit_page); ?>
            </div>
        </nav>

        <div class="other-questions">
            <p class="back"><a href="<?php echo url('exhibits'); ?>">Go back to all explorations of Medieval Rome</a></p>
        </div>
    </aside>

    <div id="exhibit-page-navigation">
        <?php if ($prevLink = exhibit_builder_link_to_previous_page()): ?>
        <div id="exhibit-nav-prev">
        <?php echo $prevLink; ?>
        </div>
        <?php endif; ?>
        <?php if ($nextLink = exhibit_builder_link_to_next_page()): ?>
        <div id="exhibit-nav-next">
        <?php echo $nextLink; ?>
        </div>
        <?php endif; ?>
        <div id="exhibit-nav-up">
        <?php echo exhibit_builder_page_trail(); ?>
        </div>
    </div>
    
</div>
<?php echo foot(); ?>
