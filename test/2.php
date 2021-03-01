<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8>
    
    <title>TEST</title>
    <style>
   #searchsubmit{display:none;}


    </style>

<script type="text/javascript" src="jquery-3.5.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

    
    const search_input = $('.search-form__input');
    const search_results = $('.ajax-search');
    search_input.keyup(function () {
        let search_value = $(this).val();
        search_results.fadeOut(200); 
        if (search_value.length > 2) { 
          
            $('#searchsubmit').show();    
        }

        if (search_value.length  < 3) { 
          
          $('#searchsubmit').hide();
          search_results.fadeOut(200);    
      }

    });

$('#searchsubmit').click(function () {
        let search_value = $(search_input).val();
        search_results.empty();
            search_results.fadeIn(200).css("height","100").css('background-image','url(preloader.gif)').css("background-repeat","no-repeat");
            $.ajax({
            url: 'search.php',
            type: 'POST',
            data: { 'ss':search_value },
            success: function (results) {
                        search_results.empty();
                        search_results.css('background-image','url()');
                        search_results.html(results);                      
                        } 
            
            });
        
    });

    
       
    



});

</script>

</head>
<body>
<h1>Форма поиска</h1>

<input  class="search-form__input" type="text"   />
    <button  id="searchsubmit">Найти</button>
    <ul class="ajax-search"></ul>
</form>


</body>
</html>

