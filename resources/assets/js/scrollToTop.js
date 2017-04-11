$(document).ready(function(){
    // Display the scroll to top button depending on scrollbar's vertical position  
    $(window).scroll(function(){
        if ($(this).scrollTop() > 300) {
            $('#scrollToTop').fadeIn();
        } else {
            $('#scrollToTop').fadeOut();
        }
    });

    // Animate the scrolling on button click
    $('#scrollToTop').click(function(){
        $('html, body').animate({scrollTop : 0}, 800);
        return false;
    });
});
