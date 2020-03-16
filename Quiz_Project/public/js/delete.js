$(document).ready(function(){
    $('.delete_form').on('submit', function(){
        if(confirm("Are you sure ?")){
            return true;
        }
        else{
            return false;
        }
    });
});

$(document).ready(function(){
    $('.delete_post').click(function(){
        if(confirm("Are you sure ?")){
            return true;
        }
        else{
            return false;
        }
    });
});