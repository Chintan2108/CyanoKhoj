$(document).ready(function(){
    //Select option if clicked upon text
    $(".org_type").click(function(){
        if($(this).prev().prop("checked")===false)
            $(this).prev().prop("checked",true);
        else
            $(this).prev().prop("checked",false);
    });
});
