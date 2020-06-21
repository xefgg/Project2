function userlogin(){
    let hint = document.getElementById("hint");
    $.ajax({
        type: 'POST',
        url: '../src/php/login.php',
        dataType: 'json',
        data:{
            username:document.forms[0].username.value,
            password: document.forms[0].password.value,
        },
        success: function (res){
            console.log(res);
            if(res.infoCode == 0){
                hint.innerHTML = "Log in fail ! Please check your username and password";
            }else{
                window.location.href = "../index.php";
            }
        }
    });

}