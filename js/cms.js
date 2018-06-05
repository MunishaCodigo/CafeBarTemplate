(function($) {

  // Closes responsive menu when a scroll trigger link is clicked
  $('.js-scroll-trigger').click(function() {
    $('.navbar-collapse').collapse('hide');
  });

  // Collapse Navbar
  var navbarCollapse = function() {
    if ($("#mainNav").offset().top > 100) 
    {
      $("#mainNav").addClass("navbar-shrink");
    } else 
    {
      $("#mainNav").removeClass("navbar-shrink");
    }
  };
  // Collapse now if page is not at top
  navbarCollapse();

        $( document ).ready(function() {
  
        var val ="all";

        $.ajax({ 
        type: 'POST',
        url: 'beverages.php',
        data: { 'drinks': val },
        success: function(response) {
            $("#db_content").html(response);
        }
        });
    });
  //display db on click
      $("#all_drinks").click(function() {
          
        var val ="all";

        $.ajax({ 
        type: 'POST',
        url: 'beverages.php',
        data: { 'drinks': val },
        success: function(response) {
            $("#db_content").html(response);
        }
        });
      });

     $("#add_new").click(function() {
          
        var val ="add";

        $.ajax({ 
        type: 'POST',
        url: 'beverages.php',
        data: { 'drinks': val },
        success: function(response) {
            $("#db_content").html(response);
        }
        });
    });

     function update(id)
    {
        var val =id;

        $.ajax({ 
        type: 'POST',
        url: 'beverages.php',
        data: { 'update': val },
        success: function(response) {
            $("#db_content").html(response);
        }
        });
    }

    function remove(id)
    {
     if(confirm("Are you sure you want to remove this product?"))
      {
        var val =id;

        $.ajax({ 
        type: 'POST',
        url: 'addDrinks.php?drink=remove',
        data: { 'remove': val },
        success: function(response) {
            $("#db_content").html(response);
        }
        });
    }
  else
  {
    return false;
  }
}


})(jQuery); 