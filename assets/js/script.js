$(document).ready(function(){
   'use strict';
    
    //Nav Side Activate
    var navStatus = 0;
    
    console.log(navStatus);
    
    $('#btn-nav-expand').click(function(){
        
        if (navStatus == 0){
            $('#btn-nav-expand').addClass('active');
            $('#nav-side').addClass('active');
            $('#homepage').animate({
                marginRight : '25%'
            }, 300);
            navStatus = 1;
        } else {
            $('#btn-nav-expand').removeClass('active');
            $('#nav-side').removeClass('active');
            $('#homepage').animate({
                marginRight : '0'
            }, 300);
            navStatus = 0;
        }
    });
    
    //Disable Nav Side on click
    
    $('#nav-side a').click(function(){
        $('#btn-nav-expand').removeClass('active');
        $('#nav-side').removeClass('active');
        $('#homepage').animate({
            marginRight : '0'
        }, 300);
        navStatus = 0;
    });

    $(window).scroll(function () {
        //if you hard code, then use console
        //.log to determine when you want the
        //nav bar to stick.
        'use strict';
        
        if ( $(window).scrollTop() > 0){
            $('header').addClass('active');
        } if ( $(window).scrollTop() == 0){
            $('header').removeClass('active');
        }
        
    });

    $("#homepage .cover a, #nav-side a").on('click', function(event) {

        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800, function(){

                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
        } // End if
    });
    
    //Career Section
    $('#career .quest #step-01').addClass('active');
    $('#career #sliderTop ul li:first-of-type').addClass('active');
    $('#career #sliderBottom ul li:first-of-type').addClass('active');
    
    $('#career .quest #step-01 button[value="1"]').click(function(){
        $('#career .quest #step-01').removeClass('active');
        $('#career .quest #step-02').addClass('active');
    
        $('#career #sliderTop ul li:first-of-type').removeClass('active');
        $('#career #sliderBottom ul li:first-of-type').removeClass('active');
    
        $('#career #sliderTop ul li:nth-of-type(2)').addClass('active');
        $('#career #sliderBottom ul li:nth-of-type(2').addClass('active');
    })
    
    $('#career .quest #step-02 button').click(function(){
        $('#career .quest #step-02').removeClass('active');
        $('#career .quest #step-03').addClass('active');
    
        $('#career #sliderTop ul li:nth-of-type(2)').removeClass('active');
        $('#career #sliderBottom ul li:nth-of-type(2)').removeClass('active');
    
        $('#career #sliderTop ul li:last-of-type').addClass('active');
        $('#career #sliderBottom ul li:last-of-type').addClass('active');
    
        $('button#sendMessage').removeAttr("disabled");
    })
    
    $('#career .quest #surveyReset').click(function(){
        $('#career .quest #step-01').addClass('active');
        $('#career #sliderTop ul li:first-of-type').addClass('active');
        $('#career #sliderBottom ul li:first-of-type').addClass('active');
    
        $('#career .quest #step-02').removeClass('active');
        $('#career .quest #step-03').removeClass('active');
    
        $('#career #sliderTop ul li:nth-of-type(2)').removeClass('active');
        $('#career #sliderBottom ul li:nth-of-type(2)').removeClass('active');
    
        $('#career #sliderTop ul li:last-of-type').removeClass('active');
        $('#career #sliderBottom ul li:last-of-type').removeClass('active');
    
        
    })
});




