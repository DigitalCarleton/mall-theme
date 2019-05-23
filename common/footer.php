
    <footer>
        <div class="copy">
            <?php echo get_theme_option('footer'); ?>
        </div>
        <div class="logos">
            <a href="https://www.carleton.edu/"><img src="<?php echo img('Carleton_simplified_CMYK_Blue.eps'); ?>" alt="Logo for Carleton College" title="Carleton College"></a>
            <a href="https://www.carleton.edu/"><img src="<?php echo img('Carleton_word_mark_CMYK_Blue.eps'); ?>" alt="Logo for Carleton College"></a>
        </div>
        <?php fire_plugin_hook('public_footer', array('view'=>$this)); ?>
    </footer>

</body>

</html>
