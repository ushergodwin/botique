 $(document).ready(function() {
     window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);
          $(function(){
            var p =  $("#pay").val();
            if(p == '5000'){
                $("#standard").show();
                $("#office").hide();
            }else{
            $("#office").show(); 
                $("#standard").hide()
            } 
          });  
        $(function(){
        $("#mobile").click(function(){
            $(".discript").show();
        });    
        });
            $(function(){
                $(".discript").hide();
            });
            $(function(){
                $("#cas").click(function(){
                 $(".discript").hide();   
                });
            });
      $(function(){
        $('input[type="radio"]').click(function(){
               if($(this).is(":checked")){
                $(".deliv").submit();
                $(this).attr('checked', true);   
               }else{
                   $(this).removeAttr({"checked": 'checked'});
               }
           });
       });
          $(function(){
            $('input[type="checkbox"]').click(function(){
                if($(this).is(":checked")){
                    $("#password").attr({"type": 'text'});
                }else{
                    $("#password").attr({"type": 'password'});
                }
            });
        });
     $(function(){
         $("#log").click(function(){
             var yes = confirm("Log out of your account?");
             if(yes){
                 return true;
             }else{
                 return false;
             }
         });
     });
 
      $(function(){
            $(".text").css({"border": 'none'});
            $(".profile").on("click", function(){
             $(".text").css({"border": '2px solid green'});
                $(".text").css({"borderTop": 'none'});
                $(".text").css({"borderLeft": 'none'});
                $(".text").css({"borderRight": 'none'});
                $(".text").css({"outline": 'none'});
                $(".text").removeAttr("readonly");
                $("#name").attr("autofocus");
                $("#saveprofile").css({"display": 'block'});
                $(".profile").attr({"href": '#useranchar'});
            });
        });
        $(function(){
            $("#change").on("click", function(){
                $("#password").toggle();
            })
        });
        $(function(){
            $(".textaddress").css({"border": 'none'});
            $(".address").on("click", function(){
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
        });
    $(function(){
        var status = $("#status").val();
        if(status == 'Order Delivered'){
            $("#step2, #step3, #step4").toggleClass("active");
            $("#success2, #success3, #success4").toggleClass("text-primary");
            $("#success2, #success3, #success4").toggleClass("text-muted");
            $("#notification").text("Was seccussfuly Delivered");
            $("#notification").css({"color": 'green'});
        }
        if(status == 'Order Shipped'){
            $("#step2").toggleClass('active');
            $("#success1, #success2").toggleClass('text-muted');
            $("#success1, #success2").toggleClass('text-primary');
        }
        if(status == 'Order In Route'){
            $("#step2, #step3").toggleClass('active');
            $("#success2, #success3").toggleClass('text-muted');
            $("#success2, #success3").toggleClass('text-primary');
        }
        if(status == 'Order Cancelled'){
          $("#notification").text("Was Cancelled");
            $("#notification").css({"color": 'red'});  
        }
        if(status == "Order Received"){
            $("#success1").toggleClass('text-muted');
            $("#success1").toggleClass('text-primary');
        }
    });
    $(function(){
        $("#openorders").on("click", function(){
            $("#order").show();
        });
        $("#opentrack").on("click", function(){
            $("#track").show();
        });
    });
     $(function(){
         $(".open").click(function(){
             $("#bar_icon").toggleClass("fas fa-times-circle");
             $("#bar_icon").toggleClass("fas fa-bars");
             $("#hidden").toggle();
         });
     }); 
     
 });