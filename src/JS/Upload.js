window.onload = function () {
    let countrySelect = document.querySelector('#selectCountry');
    $.ajax({
        type: 'GET',
        url: '../src/php/country.php',
        dataType: 'json',
        success: function (res) {
            //console.log(res.country);
            for (let i = 0; i < res.country.length; i++) {
                let countryOption = new Option(res.country[i], res.country[i]);
                countrySelect.options.add(countryOption);
            }
        }
    });
}

function uploadPic() {
    document.getElementById("upPicture").style.display = "inline";
    document.getElementById("hint").setAttribute("hidden",true);
    var file = document.getElementById("picName").files[0];
    var reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = function(){
        document.getElementById("upPicture").setAttribute("src",reader.result);
    }
}

function checkform(){
    let warning = document.getElementsByClassName("warning");
    let file = document.getElementById("picName").files[0];
    if(file == undefined){
        let hint = document.getElementById("hint");
        hint.innerHTML = "Please upload your picture!"
        return false;
    }
    let title = document.getElementById("title").value;
    if(title == ""){
        warning[0].innerHTML = "* Title cannot be empty!";
        return false;
    }
    let description = document.getElementById("description").value;
    if(description == ""){
        warning[1].innerHTML = "* Description cannot be empty!";
        return false;
    }
    let content = document.getElementById("selectContent").value;
    let country = document.getElementById("selectCountry").value;
    let city = document.getElementById("selectCity").value;
    if (content == "Content" || country == "Country" || city == "City"){
        warning[2].innerHTML = "* Select your picture information";
        return false;
    }
    return true;
}

/*
function submit() {
    var formData = new FormData();
    var file = document.getElementById("picName").files[0];
    formData.append('file',file);
    $.ajax({
        type: 'POST',
        url: '../src/php/upload.php',
        dataType: 'json',
        data:formData,
        async:false,
        contentType: false,
        processData: false,
        cache:false,
        //mimeType: "multipart/form-data",
        success: function (res) {
            console.log(res)
        }
    });
}*/
