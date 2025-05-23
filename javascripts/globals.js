(function($) {

    $(document).ready( function() {

        $(function() {
            FastClick.attach(document.body);
        });    

        if (!$('body').hasClass('home')) {
            /* Create the mobile menu and its icons */
            var menu_icon = $('<a href="#navigation" class="icon-alone"><span aria-hidden="true" data-icon="&#xe005;"></span><span class="screen-reader-text">Menu</span></a>');
            var search_icon = $('<a href="#search-form" class="icon-alone"><span aria-hidden="true" data-icon="&#xe000;"></span><span class="screen-reader-text">Search</span></a>');
            var mobile_nav = $('<nav id="mobile-nav"></nav>');
            $("#site-title").after(mobile_nav);
            mobile_nav.prepend(search_icon);
            mobile_nav.prepend(menu_icon);
            
            // if ($('html').hasClass('touch')) {
            //     var top_y = $('div[role="main"] > h1').first().position().top;
            //     $.scrollTo(top_y);
            // }
            
            $("#search-form").hide();
            $("#navigation").hide();
            
            $("#mobile-nav a").click(function(e) {
                e.preventDefault();
                var content = $(this).attr("href");
                $(content).slideToggle(400);
            });
        } else {
            if ($(window).width() < 640) {
                $("#search").insertAfter("#navigation");
            }            
            
            $(window).resize( function() {
                if ($(window).width() < 640) {
                    $("#search").insertAfter("#navigation");
                } else {
                    $("#search").insertBefore("#navigation");
                }
            });
        }
    });
  
})(jQuery)