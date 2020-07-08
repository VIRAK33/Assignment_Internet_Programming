$(document).ready(function(){
    var id = "";
    var category = "Electronic";
    var category_id = 1;
    var search = "";


    $("#Electronic").click(function(){
        $(".text_category").removeClass("active");
        $("#Electronic").addClass("active");
        category = "Electronic";
        category_id = 1;
        var search = $("#search51").val(); 
        if(search){
            load_data(search, category_id);
        }else{
            category_click(search,category_id);
        }
    });
    $("#Hand_bags").click(function(){
        $(".text_category").removeClass("active");
        $("#Hand_bags").addClass("active");
        category = "Hand_bags";
        category_id = 2;
        var search = $("#search51").val(); 
        if(search){
            load_data(search, category_id);
        }else{
            category_click(search,category_id);
        }
    });
    $("#Wallete").click(function(){
        $(".text_category").removeClass("active");
        $("#Wallete").addClass("active");
        category = "Wallete";
        category_id = 3;
        var search = $("#search51").val(); 
        if(search){
            load_data(search, category_id);
        }else{
            category_click(search,category_id);
        }
    });
    $("#Cloth").click(function(){
        $(".text_category").removeClass("active");
        $("#Cloth").addClass("active");
        category = "Cloth";
        category_id = 4;
        var search = $("#search51").val(); 
        if(search){
            load_data(search, category_id);
        }else{
            category_click(search,category_id);
        }
    });

    // Click function
    function category_click(search, category_id){
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {
                category_id: category_id,
                key:search
            },
            success: function (data) {
                $("#item").empty();
                $("#item").append(data);
            }
        })
    }


    // Search function
    function load_data(search, category_id){
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{
                key:search,
                category_id:category_id
                
            },
            success:function(data)
            {
             $('#item').html(data);
            },
            error: function(data){
                console.log("error:" + data);
            }
        });
    }
    $('#search51').keyup(function(){
        var search = $(this).val();      
        if(search != '')
        {                   
            load_data(search, category_id);
        }
        else
        {
            category_click(search,category_id);
        }
    });

    $("#load_more").click(function(){
        
        var no_item = document.getElementById("number_item").value;
        
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{
                key:search,
                category_id:category_id,
                no_item:no_item
                
            },
            success:function(data)
            {
                document.getElementById("number_item").value= Number(no_item)+3;
                $('#item').html(data);
            },
            error: function(data){
                console.log("error:" + data);
            }
        });

    })





});