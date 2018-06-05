$(document).ready(function(){
  load_cart_data();
    
  function load_cart_data()
  {
    $.ajax({
      url:"cart.php",
      method:"POST",
      dataType:"json",
      success:function(data)
      {
        $('#cart_details').html(data.cart_details);
        $('.total_price').text(data.total_price);
        $('.badge').text(data.total_item);
      }
    });
  }

  $(document).on('click', '.add_to_cart', function(){
    var product_id       = $(this).attr("id");
    var product_name     = $('#name'+product_id+'').val();
    var product_price    = $('#price'+product_id+'').val();
    var product_quantity = $('#quantity'+product_id).val();
    var product_shot     = $('#shot'+product_id).val();
    var product_shot     = product_shot ? product_shot : 'N/A';
    var action = "add";
    if(product_quantity > 0)
    {
      $.ajax({
        url:"action.php",
        method:"POST",
        data:{product_id:product_id, product_name:product_name, product_price:product_price, product_shot:product_shot, product_quantity:product_quantity, action:action},
        success:function(data)
        {
          load_cart_data();
          alert("Item has been added into your cart");
        }
      });
    }
    else
    {
      alert("Please Enter Number of Quantity");
    }
  });

  $(document).on('click', '.delete', function(){
    var product_id = $(this).attr("id");
    var product_shot  = this.value;
    //alert(product_shot);
    var action = 'remove';
    if(confirm("Are you sure you want to remove this product?"))
    {
      $.ajax({
        url:"action.php",
        method:"POST",
        data:{product_id:product_id, action:action ,product_shot:product_shot},
        success:function()
        {
          load_cart_data();
          $('#cart-popover').popover('hide');
          alert("Item has been removed from Cart");
        }
      })
    }
    else
    {
      return false;
    }
  });
  
  $(document).on('change', '.cart_quantity', function(){
    var product_id = $(this).attr("id");
    var product_quantity = this.value;
    var action ='change';
    //alert(product_quantity);
      $.ajax({
      url:"action.php",
      method:"POST",
      data:{action:action,product_id:product_id, product_quantity:product_quantity},
      success:function()
      {
        load_cart_data();
      }
    });
  });  

  $(document).on('click', '#clear_cart', function(){
    var action = 'empty';
    $.ajax({
      url:"action.php",
      method:"POST",
      data:{action:action},
      success:function()
      {
        load_cart_data();
        $('#cart-popover').popover('hide');
        alert("Your Cart has been clear");
      }
    });
  });

  $(document).on('click', '#check_out_cart', function(){
  //var number = ;
    var action = 'check_out';
    var tot_price = $('#tot_price').val();
    if(tot_price == 0)
    {
      alert("Sorry check out is not possible without shopping");
      return false;
    }
  });

  });