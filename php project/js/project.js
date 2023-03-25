// Dom Structure is Loaded
$(document).ready(function(){
    // alert("Testing JQUERY CODE");

    $(".categoryData").click(function(ev){
        // console.log(ev);
        ev.preventDefault();
        // console.log("WORKING");

        // console.log($(this));
        var ans = $(this).attr("for");
        // console.log(ans);

        $.post("filter_cat.php" , {categoryid:ans} , function(response){
            console.log(response);
            // $(".resultData").html("hello");
            $(".resultData").html(response);
        })

       
    });
    $(".brandData").click(function(ev){
        // console.log(ev);
        ev.preventDefault();
        // console.log("WORKING");

        // console.log($(this));
        var ans = $(this).attr("for");
        // console.log(ans);

        $.post("filter_brand.php" , {brandid:ans} , function(response){
            console.log(response);
            // $(".resultData").html("hello");
            $(".resultData").html(response);
        })
    })
   
    $(".btn-add-cart").click(function(){
        // console.log('TEST');
        var ans = $(this).attr("for");
        // console.log(ans);
        var rec = {proid:ans};
        // console.log(rec);
        $.post("cart_action.php" , rec , function(res){
            console.log(res);
            alert(res);
            window.location.href="cart.php";
        })
    })

    $(".cart-delete").click(function(){
        if(confirm("Do you want to delete ?")){
            var currentButton = $(this);
            var ans = $(this).attr("for");
            // console.log(ans);
            $.post("delete_cart_action.php" , {id:ans} , function(response){
                // console.log(response);
                currentButton.parent().parent().remove();
            })
        }
    })

    $(".deletePro").click(function(ev){
        // alert();
        if(confirm("Are you sure,Want to Delete Record")){
            ev.preventDefault();
            var id = $(this).attr("for");
            // alert(id);

            $.post("delete_pro.php" , {record:id} , function(res){
                console.log(res);
                if(res=="Deleted"){
                    window.location.reload();
                }
            })
        }
    })
    
});