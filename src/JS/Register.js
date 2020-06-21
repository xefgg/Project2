function check_validity(){
    let hint = document.getElementById("hint");
    let username = document.forms[0].username;
    let email = document.forms[0].email;
    let password = document.forms[0].password;
    let comfirmpassword = document.forms[0].comfirmpassword;
    let mailReg = /^([0-9A-Za-z\-_\.]+)@([0-9a-z]+\.[a-z]{2,3}(\.[a-z]{2})?)$/g;;
    let passReg= /^[\w]{6,12}$/;
    if(username.value.length<6) {
        document.getElementById("hint").innerHTML = "用户名必须大于6位";
        return false;
    }
    if(!mailReg.test(email.value)) {
        document.getElementById("hint").innerHTML = "请输入正确的邮箱";
        return false;
    }
    if(!passReg.test(password.value)){
        document.getElementById("hint").innerHTML = "密码弱，必须为6-12位，只能是字母、数字和下划线";
        return false;
    }
    if(comfirmpassword.value !== password.value) {
        document.getElementById("hint").innerHTML = "两次输入密码不一致";
        return false;
    }
    $.ajax({
        type: 'POST',
        url: '../src/php/register.php',
        dataType: 'json',
        data:{
            username:document.forms[0].username.value,
            password:document.forms[0].password.value,
        },
        success: function (res){
            console.log(res);
            if(res.infoCode == 0){
                hint.innerHTML = "该用户名已存在";
                return false;
            }else{
                alert("Successful registration!");
                window.location.href = "../src/Log in.html";
            }
        }
    });
}