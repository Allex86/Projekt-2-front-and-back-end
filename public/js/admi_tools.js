$(document).ready(function() {

    $(".remove_product_from_database").click(function()
    {
        var product_id = parseInt($(this).attr("data-id"));

        $.ajax({
            type: 'POST', 
            url: '/AdminTools/AdminToolsRemoveProduct',
            data: {"product_id": product_id},
            success: function(){location.reload()}
        });
    });

    /*$(".submit_aply").click(function()
    {
        var product_id = parseInt($(this).attr("data-id"));

        $.ajax({
            type: 'GET', 
            url: '/AdminTools/AdminToolsEditProduct',
            data: {"product_id": product_id},
            success: function(){location.reload()}
        });
    });*/

    $(document).ready(function() {
        $(".edit_product_bloc").hide();
        $(".edit_product_from_database").click(function() {
            $(this).next(".edit_product_bloc").slideToggle("slow" /*"fast"*/ );
        });
    });
});