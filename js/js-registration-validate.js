$(document).ready(function(){
    //Select radio-option if clicked across it.
    $(".radio-option").click(function(){
    
        $(this).parent().find("p").css({'color':'whitesmoke','letter-spacing':'0' });

        $(".org_type").removeClass('selected-option');

        if($(this).children(".input-radio").prop("checked")===false)
        {
            $(this).children(".input-radio").prop("checked",true);
            $(this).children(".org_type").addClass('selected-option');
        }
        else
            $(this).children(".input-radio").prop("checked",true);
    });

  
});
