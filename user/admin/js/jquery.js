 $(document).ready( () => {
  //initialize tooltips
  $('[data-toggle = "tooltip"]').tooltip();
    //show laoding
  $(document).ajaxStart( () => {
     $(".loading").show();
});
  //hide loading
$(document).ajaxComplete( () => {
  $( ".loading" ).hide();
});
//submit the desktop form
  $(".addProductForm").on("submit", (event) => {
    event.preventDefault();
    var fd = new FormData(document.getElementById('addProductForm'));
    var image = $("#destopFile").val().split('\\').pop();
         fd.append("product_image", image);
        $.ajax({
          url: "logic",
          type: "POST",
          data: fd,
          processData: false,
          contentType: false,
          beforeSend: () => {
            $(".loading").show();
          },
          success: (data) => {
            $(".addRespose").fadeIn(2000);
            $(".addRespose").html(data);
            $(".addRespose").fadeOut( 12 * 1000);
            $(".addProductForm *").val("");
          },
          complete: () => {
            $(".laoding").hide();
          },
           error: (jqXHR, textStatus, errorThrown) => {
           console.log(textStatus, errorThrown);
        }
           
      });
  });

  //submit delete products
  $("#deleteProductForm").submit( (e) => {
    e.preventDefault();
    $.ajax({
      url: "logic",
      type: "POST",
      data: $("#deleteProductForm").serializeArray(),
      success: (deleteData) => {
        $(".deleteResponse").fadeIn(2000);
        $(".deleteResponse").html(deleteData);
        $(".deleteResponse").fadeOut(12 * 1000);
        $("#deleteProductForm *").val("");
      }
    });
  });

  //submit delete all products
  $("#deleteAllProductsForm").submit( (e) => {
    e.preventDefault();
    $.ajax({
      url: "logic",
      type: "POST",
      data: $("#deleteAllProductsForm").serializeArray(),
      success: (deleteAllData) => {
        $(".deleteAllResponse").fadeIn(2000);
         $(".deleteAllResponse").html(deleteAllData);
        $(".deleteAllResponse").fadeOut(12 * 1000); 
        $(".deleteAllProductsForm *").val("");
      }
    });
  });

  //submit update product price
  $("#updatePriceForm").submit( (e) => {
    e.preventDefault();
    $.ajax({
      url: "logic",
      type: "POST",
      data: $("#updatePriceForm").serializeArray(),
      success: (updatePriceData) => {
        $(".updatePriceResponse").fadeIn(2000);
        $(".updatePriceResponse").html(updatePriceData);
        $(".updatePriceResponse").fadeOut(12 * 1000);
        $("#updatePriceForm *").val("");
      }
    });
  });

  //update product status
  $("#updateStatusForm").submit( (e) => {
    e.preventDefault();
    $.ajax({
      url: "logic",
      type: "POST",
      data: $("#updateStatusForm").serializeArray(),
      beforeSend: () => {
        $(".loading-data").show();
      },
      success: (updateStatusData) => {
        $(".updateStatusResponse").fadeIn(2000);
          $(".updateStatusResponse").html(updateStatusData);
          $(".updateStatusResponse").fadeOut(12 * 1000);
          $("#updateStatusForm *").val("");
      },
      complete: () => {
        $(".loading-data").hide();
      }
    });
  });

   $("#deliveryForm").on("submit", (e) => {
      e.preventDefault();
      $.ajax({
        url: "logic",
        type: "POST",
        data: $("#deliveryForm").serializeArray(),
        success: (deliveryData) => {
          $(".deliveryRespose").html(deliveryData);
          $(".deliveryRespose").fadeOut(12 * 1000);
          $("#deliveryForm *").val("");
        }
      });
    });

    //update delivery cost
     $("#updateDeliveryForm").on("submit", (e) => {
      e.preventDefault();
      $.ajax({
        url: "logic",
        type: "POST",
        data: $("#updateDeliveryForm").serializeArray(),
        success: (deliveryData) => {
          $(".updateDeliveryRespose").html(deliveryData);
          $(".updateDeliveryRespose").fadeOut(12 * 1000);
          $("#updateDeliveryForm *").val("");
        }
      });
    });

     //add vouchar
        $("#voucharForm").on("submit", (e) => {
      e.preventDefault();
      $.ajax({
        url: "logic",
        type: "POST",
        data: $("#voucharForm").serializeArray(),
        success: (voucharData) => {
          $(".voucharResponse").html(voucharData);
          $(".voucharResponse").fadeOut(12 * 1000);
          $("#voucharForm *").val("");
        }
      });
    });
            $("#email").on("keyup", () => {
      var email = $("#email").val();
      $(".previewEmail").text(email);
    });

     $("#message").on("keyup", () => {
      var message = $("#message").val();
      $(".previewMessage").text(message);
    });

     $(".contactAdmin").submit( (e) => {
      e.preventDefault();
      $.ajax({
        url: "logic",
        type: "POST",
        data: $(".contactAdmin").serializeArray(),
        success: (data) =>  {
          $(".resposnse").html(data);
          $(".resposnse").fadeOut(12 * 1000);
        }

      });
     });


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

$("#destopFile").on("change", () => {
   var file = $("#destopFile").val().split('\\').pop();
  var path = 'product-images/'+file;
    $("#previewFile").attr("src", path);
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