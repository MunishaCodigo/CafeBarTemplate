(function($) {
  "use strict"; // Start of use strict

  // Smooth scrolling using jQuery easing
      $(document).ready(function(){
      $("a").on('click', function(event) {

       if (this.hash !== "") {
          event.preventDefault();
          var hash = this.hash;

          $('html, body').animate({
          scrollTop: $(hash).offset().top
         }, 500, function(){
  
        window.location.hash = hash;
        });
      } // End if
    });
  });

  // Closes responsive menu when a scroll trigger link is clicked
  $('.js-scroll-trigger').click(function() {
    $('.navbar-collapse').collapse('hide');
  });

  // Activate scrollspy to add active class to navbar items on scroll
  $('body').scrollspy({
    target: '#mainNav',
    offset: 57
  });

  // Collapse Navbar
  var navbarCollapse = function() {
    if ($("#mainNav").offset().top > 100) {
      $("#mainNav").addClass("navbar-shrink");
    } else {
      $("#mainNav").removeClass("navbar-shrink");
    }
  };
  // Collapse now if page is not at top
  navbarCollapse();
  // Collapse the navbar when page is scrolled
  $(window).scroll(navbarCollapse);

  // Scroll reveal calls
  window.sr = ScrollReveal();
  sr.reveal('.sr-icons', {
    duration: 600,
    scale: 0.3,
    distance: '0px'
  }, 200);
  sr.reveal('.sr-button', {
    duration: 1000,
    delay: 200
  });
  sr.reveal('.sr-contact', {
    duration: 600,
    scale: 0.3,
    distance: '0px'
  }, 300);
      $("#hot_drinks").click(function() {
          
        var val ="Hot Drinks";

        $.ajax({ 
        type: 'POST',
        url: 'beverages.php',
        data: { 'types': val },
        success: function(response) {
            $("#content_area").html(response);
        }
        });
    });

      $("#cold_drinks").click(function() {
          
        var val ="Cold Drinks";

        $.ajax({ 
        type: 'POST',
        url: 'beverages.php',
        data: { 'types': val },
        success: function(response) {
            $("#content_area").html(response);
        }
        });
    });
         $("#side_order").click(function() {
          
        var val ="Side Order";

        $.ajax({ 
        type: 'POST',
        url: 'beverages.php',
        data: { 'types': val },
        success: function(response) {
            $("#content_area").html(response);
        }
        });
    });


})(jQuery); // End of use strict
