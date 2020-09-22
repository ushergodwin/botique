$(document).ready(() => {
  //initialize tooltips
  $('[data-toggle = "tooltip"]').tooltip();
//fetch data
var ajax =   setInterval( () => {
  
     $.ajax({
      url: "get",
      type: "GET",
      data: {no_order: 'orders'},
      success: (orderData) => {
        $("#no_of_orders").html(orderData);
      }
     });
     $.ajax({
      url: "get",
      type: "GET",
      data: {cancelled_order: 'orders'},
      success: (orderData) => {
        $("#cancelled_orders").html(orderData);
      }
     });
     $.ajax({
      url: "get",
      type: "GET",
      data: {delivered_order: 'orders'},
      success: (orderData) => {
        $("#delivered_orders").html(orderData);
      }
     });
     $.ajax({
      url: "get",
      type: "GET",
      data: {current_order: 'orders'},
      success: (orderData) => {
        $("#current_orders").html(orderData);
      }
     });
      var d = new Date();
   var h = d.getHours();
   if(h === 20 || h=== 21 || h=== 22 || h === 23 || h === 0 || h === 1 || h === 2 || h === 3 || h === 4 || h === 5 || h === 6){
    clearInterval(ajax);
   }

    }, 30 * 1000);
    //user settings
      $(".user").on("submit", (e) => {
       e.preventDefault();
       $.ajax({
        url: "update",
        type: "POST",
        data: $(".user").serializeArray(),
        beforeSend: () => {
          $(".saving").show();
        },
        success: (data) => {
          $(".response").html(data);
          $(".response").fadeOut(12 * 1000);
        },
        complete: () => {
          $(".saving").hide();
        }
       });
  } );

  $(".addressBook").on("submit", (e) => {
       e.preventDefault();
       $.ajax({
        url: "update",
        type: "POST",
        data: $(".addressBook").serializeArray(),
        beforeSend: () => {
          $(".saving").show();
        },
        success: (data) => {
          $(".response").html(data);
          $(".response").fadeOut(12 * 1000);
        },
        complete: () => {
          $(".saving").hide();
        }
       });
  } );

    $(".changePassword").on("submit", (e) => {
       e.preventDefault();
       $.ajax({
        url: "update",
        type: "POST",
        data: $(".changePassword").serializeArray(),
        beforeSend: () => {
          $(".saving").show();
        },
        success: (data) => {
          $(".response").html(data);
          $(".response").fadeOut(12 * 1000);
        },
        complete: () => {
          $(".saving").hide();
        }
       });
  } );
  //normal stuff of hide and show
  $(".hide-side-bar").on("click", () => {
    $("#mySidebar").css({"width": '0px'});
    $(".w3-main").css({"marginLeft": '0px'});
    $(".open-side-bar").show();
    $(".hide-side-bar").hide();
  });

  $(".open-side-bar").on("click", () => {
     $("#mySidebar").css({"width": '200px'});
    $(".w3-main").css({"marginLeft": '200px'});
    $(".open-side-bar").hide();
    $(".hide-side-bar").show();
  });

  $("#bottom-bar").on("click", () => {
    $("#card-next-to-nav").slideToggle(1000);
  });

  $(".open-bottom-bar").on("click", () => {
    $("#card-next-to-nav").slideToggle(1000);
  });

  $("#open-product-links").on("click", () => {
    $(".show-product-links").slideToggle(1000);
    $("#product-angle").toggleClass("fas fa-angle-down");
    $("#product-angle").toggleClass("fas fa-angle-up");
  });

   $("#open-user-links").on("click", () => {
    $(".show-user-links").slideToggle(1000);
    $("#user-angle").toggleClass("fas fa-angle-down");
    $("#user-angle").toggleClass("fas fa-angle-up");
  });

$('a.top').click( () => {
 $('html, body').animate({scrollTop: '0'}, 700);
});
   $(".text").css({"border": 'none'});
            $(".textaddress").css({"border": 'none'});
            $(".profile").on("click", () => {
             $(".text").css({"border": '2px solid green'});
                $(".text").css({"borderTop": 'none'});
                  $(".text").css({"borderLeft": 'none'});
                   $(".text").css({"borderRight": 'none'});
                   $(".text").css({"outline": 'none'});
                  $(".text").removeAttr("readonly");
                  $("#name").attr("autofocus");
                $("#saveprofile").css({"display": 'block'});
             });
            $(".address").on("click", () => {
                  $(".textaddress").css({"border": '2px solid green'});
                   $(".textaddress").css({"borderTop": 'none'});
                    $(".textaddress").css({"borderLeft": 'none'});
                    $(".textaddress").css({"borderRight": 'none'});
                   $(".textaddress").css({"outline": 'none'});
                  $(".textaddress").removeAttr("readonly");
                  $("#saveaddress").css({"display": 'block'});
                 $(".address").attr({"href": '#addressanchar'});
                $("#address").attr("autofocus");
            });
               //show password
            $(".showPassword").on("click", () => {
              $("#current").attr({"type": 'text'});
                $("#new").attr({"type": 'text'});
                $("#conf").attr({"type": 'text'});
              $(".showPassword").hide();
              $(".hidePassword").show();
            });
            //hide password
            $(".hidePassword").on("click", () => {
              $("#current").attr({"type": 'password'});
                $("#new").attr({"type": 'password'});
                $("#conf").attr({"type": 'password'});
              $(".showPassword").show();
              $(".hidePassword").hide();
            });

  });