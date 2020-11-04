
/*$(document).ready(function(){
    //Select option if clicked upon text
    $(".org_type").click(function(){
        if($(this).prev().prop("checked")===false)
            $(this).prev().prop("checked",true);
        else
            $(this).prev().prop("checked",false);
    });
});*/
function NameValidation(){
    var user = document.getElementById('fullname').value;
    //username should contain firstname and lastname 
    var regName = /^[a-zA-Z]+ [a-zA-Z]+$/;
    if(!regName.test(user)) {
        alert("Please enter your full name (first & last name)");
        document.getElementById('fullname').focus();
        return false;
    }
    else {
        return true;
    }
}

function EmailValidation(){
    var email = document.getElementById('email').value;
    var emailPat = /^(\".*\"|[A-Za-z]\w*)@(\[\d{1,3}(\.\d{1,3}){3}]|[A-Za-z]\w*(\.[A-Za-z]\w*)+)$/
    var EmailmatchArray = email.match(emailPat);
    var givendomain = email.split('@')[1].split('.')[0];
    var invaliddomains= ["maildrop","yopmail", "dispostable", "mailinator", "mailexpire", "mintemail"];

    if (EmailmatchArray == null) {
        alert("Please enter a valid email ID.");
        document.getElementById('email').focus();
        return false; 
    }
    else {
        for(let i=0; i < invaliddomains.length; i++){
            var res=givendomain.indexOf(invaliddomains[i]);
            if (res!=-1){
                alert("Please enter a valid domain.");  
                document.getElementById('email').focus();
                return false;     
            }
        }
        return true;
    }
}

function dobValidation(){
    var dob = new Date(document.getElementById("dob").value);
		var today = new Date();
        var age = today.getFullYear() - dob.getFullYear();
        if (age<=22) {
            alert("You must be 22 years or older.");
            document.getElementById('dob').focus();
            return false;
        }
        return true;
}

function checkvalidation()
{
    if(NameValidation() && EmailValidation() && dobValidation())
    {
        return true;
    }
    else{
        return false;
    }
}



    
    
 
        
    