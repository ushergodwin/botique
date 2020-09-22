$(document).ready(function(){
    $('#search').on("keyup", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="search"]').val($(this).text());
        $(this).parent(".result").empty();
    });
    //mobile search
        $('#mobileSearch').on("keyup", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".mobileResult");
        if(inputVal.length){
            $.get("search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".mobileResult p", function(){
        $(this).parents(".search-box").find('input[type="search"]').val($(this).text());
        $(this).parent(".mobileResult").empty();
    });
    //submit the form
     $(".result").on("click", function(){
        setTimeout( () => {
            $(".desktopForm").submit();
        }, 300)
      });
      $(".mobileResult").on("click", () => {
        setTimeout( function() {
            $(".mobileForm").submit();
        }, 300)
      }); 
});