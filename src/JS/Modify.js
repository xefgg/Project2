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
    let image = window.location.href.split('?')[1];
    let arr = image.split('=');
    let id = arr[1];
    let src = document.getElementById("upPicture");
    let title = document.getElementById("title");
    let description = document.getElementById("description");
    let content = document.getElementById("selectContent");
    let country = document.getElementById("selectCountry");
    let city = document.getElementById("selectCity");
    $.ajax({
        type: 'POST',
        url: '../src/php/modify.php',
        dataType: 'json',
        data: {
            id: id,
        },
        success: function (res) {
            console.log(res)
            src.src = "../src/travel-images/normal/medium/" + res.src;
            title.value = res.title;
            description.value = res.description;
            content.value = res.content;
        }
    })
    let imageid = document.getElementById("id");
    imageid.value = id;
}

function reupload() {
    var file = document.getElementById("picName").files[0];
    var reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = function(){
        document.getElementById("upPicture").setAttribute("src",reader.result);
    }
}

function checkupdate(){
    let warning = document.getElementsByClassName("warning");
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

function modify() {
    var formData = new FormData();
    $.ajax({
        type: 'POST',
        url: '../src/php/update.php',
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
}