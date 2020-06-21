window.onload = function () {
    let imageid = document.getElementsByClassName("imageid");
    let src = document.getElementsByClassName("src");
    let title = document.getElementsByClassName("title");
    let description = document.getElementsByClassName("description");
    let operation = document.getElementsByClassName("operation");
    $.ajax({
        type: 'POST',
        url: '../src/php/my photo.php',
        dataType: 'json',
        data: {
            imgid: "",
            page: 1,
        },
        success: function (res) {
            console.log(res);
            let total = Math.ceil(res.src.length / 5);
            $('.M-box').pagination({
                pageCount: total,
                callback: function (api) {
                    $('.now').text(api.getCurrent());
                    console.log(api.getCurrent());
                    $.ajax({
                        type: 'POST',
                        url: '../src/php/my photo.php',
                        dataType: 'json',
                        data: {
                            imgid: "",
                            page: api.getCurrent(),
                        },
                        success: function (res) {
                            console.log(res);
                            for (let i = 0; i < 5; i++) {
                                imageid[i].href = "";
                                src[i].src = "";
                                title[i].innerHTML = "";
                                description[i].innerHTML = "";
                            }
                            for (let i = 0; i < Math.min(res.id.length, 5); i++) {
                                imageid[i].href = "../src/Details.php?id=" + res.id[i];
                                src[i].src = "../src/travel-images/normal/medium/" + res.src[i];
                                title[i].innerHTML = res.title[i];
                                description[i].innerHTML = res.description[i];
                            }
                            for(let i = Math.min(res.id.length, 5);i<5;i++){
                                operation[i].innerHTML = "";
                            }
                        }
                    })
                }
            });
            for (let i = 0; i < 5; i++) {
                imageid[i].href = "";
                src[i].src = "";
                title[i].innerHTML = "";
                description[i].innerHTML = "";
            }
            for (let i = 0; i < Math.min(res.id.length, 5); i++) {
                imageid[i].href = "../src/Details.php?id=" + res.id[i];
                src[i].src = "../src/travel-images/normal/medium/" + res.src[i];
                title[i].innerHTML = res.title[i];
                description[i].innerHTML = res.description[i];
            }
            for(let i = Math.min(res.id.length, 5);i<5;i++){
                operation[i].innerHTML = "";
            }
            if(res.src.length == "0"){
                let result = document.getElementsByClassName("photoCollection");
                result[0].innerHTML = "<p class='hint'>You haven't uploaded any photos yet, you can click the Upload button <i class=\"fa fa-upload\" aria-hidden=\"true\"></i> to upload one!</p>"
            }
        }
    })
    $(".delete").click(function () {
        let index = $('.delete').index(this);
        let url = document.getElementsByClassName("imageid")[index].href;
        let image = url.split('?')[1];
        let arr = image.split('=');
        let imageid = arr[1];
        console.log(imageid);
        $.ajax({
            type: 'POST',
            url: '../src/php/delete.php',
            dataType: 'json',
            data: {
                imageid: imageid,
            },
            success: function (res) {

            }
        })
        location.reload();
    })
    $(".modify").click(function () {
        let index = $('.modify').index(this);
        let url = document.getElementsByClassName("imageid")[index].href;
        let image = url.split('?')[1];
        let arr = image.split('=');
        let imageid = arr[1];
        window.location.href = "Modify.php?id=" + imageid;
    })
}



