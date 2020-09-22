window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 6000);
// Reference : https://mdbootstrap.com/snippets/jquery/mdbootstrap/944829#js-tab-view


function myDelete(d,t) {
        var id = d;
        var title = t;
        window.location.href = "delete.php?deleteId="+id+"&title="+title;
}
    // window.alert("title"+title+"ID"+id); // checking

// For live search : REFERENCE : https://youtu.be/a5UGrlEwSfI
$(document).ready(function(){
    $("#search_text").keyup(function(){
        var search = $(this).val(); // We are storing string from searchbox into this search variable
        $.ajax({
            url:'action.php',
            method:'post',
            data:{query:search},
            success:function(response){
                $("#table-data").html(response);
            }
        })
        // document.getElementById("reset").innerHTML = "Reset";
    });
});

// function category(){
//     var x = document.getElementById("category").value;
//     window.alert("Category : "+x);
// }