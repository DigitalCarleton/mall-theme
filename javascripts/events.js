(function($) {
    $(document).ready( function() {
        if ($('body').hasClass('event')) {
            var $root = $('html, body');

            var $period = $('#period-nav');
            var periodTop = $('div.items').position().top;
            
            var windowTop;
            var $window = $(window);
            
            $window.resize(function() {
                periodTop = $('div.items').position().top;
                positionNav();
            });

            $window.scroll( function() {
                positionNav();
            });

            function positionNav() {
                windowTop = $window.scrollTop();
                if (windowTop >= periodTop) {
                    $period.addClass('fixed');
                } else {
                    if ($period.hasClass('fixed')) {
                        $period.removeClass('fixed');
                    }
                }
            }

            $('a[href^="#"]').click(function () {
                $root.animate({
                    scrollTop: $( $.attr(this, 'href') ).offset().top -50
                }, 1000);

                return false;
            });
            
            $('html').click(function () {
                $('#period-nav').removeClass('on');
                $('#period-nav').addClass('off');
            });
            
            $('#period-nav .sub-menu').prepend('<li class="current">'+$('#period-nav li:first-of-type').text()+'</li>');
            $('#period-nav a').click(function(e) {
                e.stopPropagation();
                $('.current').text($(this).text());
            });
            
            $('#period-nav .current').click(function(e) {
                e.stopPropagation();
                $('#period-nav').toggleClass('on');
                $('#period-nav').toggleClass('off');
            });

        }
    });
  
})(jQuery)