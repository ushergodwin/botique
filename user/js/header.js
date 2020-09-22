$(document).ready(function($){
    $('[data-toggle="tooltip"]').tooltip();
              $(function(){
         $(".open").click(function(){
             $("#bar_icon").toggleClass("fas fa-times");
             $("#bar_icon").toggleClass("fas fa-bars");
             $("#hidden").toggle();
         });
     });

    $(function(){
        $("#service").click(function(){
            $("#ser").toggle(1000);
            $("#downs").toggleClass('fa fa-angle-down');
            $("#downs").toggleClass('fa fa-angle-up');
        });
        $("#message").click(function(){
            $("#form").toggle(1000);
                $("#down").toggleClass('fa fa-angle-down');
            $("#down").toggleClass('fa fa-angle-up');
        });
        $(".categ").on("click", function(){
          $(".showcat").toggle();
            $("#cat").toggleClass('fa fa-angle-down');
            $("#cat").toggleClass('fa fa-angle-up');  
        });
         $(".men").on("click", function(){
          $(".menlist").toggle();
            $("#men").toggleClass('fa fa-angle-down');
            $("#men").toggleClass('fa fa-angle-up');  
        });
         $(".women").on("click", function(){
          $(".womenlist").toggle();
            $("#women").toggleClass('fa fa-angle-down');
            $("#women").toggleClass('fa fa-angle-up');  
        });
         $(".Children").on("click", function(){
          $(".chlist").toggle();
            $("#chls").toggleClass('fa fa-angle-down');
            $("#chls").toggleClass('fa fa-angle-up');  
        });
    }); 
});