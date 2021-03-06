$( document ).ready(function() {

    var wow = new WOW(
        {
            boxClass:     'timeline-post',      // default
            animateClass: 'is-visible', // default
            offset:       100          // default
        }
    );

    wow.init();

    $('.mdl-button a').click( function() { // Au clic sur un �l�ment
        var page = $(this).attr('href'); // Page cible
        var speed = 750; // Dur�e de l'animation (en ms)
        var scroll = $(page).offset().top - 100;
        $('html, body').animate( { scrollTop: scroll }, speed ); // Go
        return false;
    });

    $(".lightbox").fancybox({
        openEffect: 'elastic',
        closeEffect: 'elastic',
        autoSize: true,
        type: 'iframe',
        iframe: {
            preload: false // fixes issue with iframe and IE
        },
        helpers:
        {
            overlay:
            {
                css: { 'background': 'rgba(0, 0, 0, 0.5)' }
            }
        }
    });
    $('.mdl-layout').on('click', function() {
        $.fancybox.close();
    });

    $('.flash-info').each(function(){
        var week = $(this).attr('data-week');
        $('#article-s'+ week).prepend($(this));
        $(this).addClass('is-visible');
    });

    $('#trumbowyg-demo').trumbowyg();

});
//# sourceMappingURL=main.js.map
