window.onload = function(){
    let image = window.location.href.split('?')[1];
    let arr = image.split('=');
    let id = arr[1];
    let picsrc = document.getElementById("image");
    let title = document.getElementsByClassName("picTitle");
    let author = document.getElementsByClassName("author");
    let description = document.getElementsByClassName("imgDetail");
    let likenum = document.getElementsByClassName("likeNum");
    let content = document.getElementsByClassName("content");
    let country = document.getElementsByClassName("country");
    let city = document.getElementsByClassName("city");
    let button = document.getElementById("likebutton");
    let status;
    $.ajax({
        type: 'POST',
        url: '../src/php/detail.php',
        dataType: 'json',
        data:{
            id: id,
        },
        success: function (res){
            console.log(res)
            picsrc.src = "../src/travel-images/normal/medium/" + res.src;
            title[0].innerHTML = res.title;
            if(res.description)
            description[0].innerHTML = res.description;
            likenum[0].innerHTML = res.likenum;
            content[0].innerHTML = res.content;
            country[0].innerHTML = res.country;
            city[0].innerHTML = res.city;
            author[0].innerHTML = "by " + res.author;
        }
    });
    $.ajax({
        type: 'POST',
        url: '../src/php/checkCollect.php',
        dataType: 'json',
        data:{
            id: id,
        },
        success: function (res){
            console.log(res)
            if(res.infoCode == 0){
                button.setAttribute("class","like");
                status = true;
            } else {
                button.setAttribute("class","dislike");
                status = false;
            }
        }
    });
    $("#likebutton").click(function () {
        //未收藏，点击后收藏
        if(status){
            $.ajax({
                type: 'POST',
                url: '../src/php/collect.php',
                dataType: 'json',
                data:{
                    id: id,
                },
                success: function (res){
                    console.log(res)
                    status = false;
                    button.setAttribute("class","dislike");
                    likenum[0].innerHTML++;
                }
            });
        } else {
            $.ajax({
                type: 'POST',
                url: '../src/php/uncollect.php',
                dataType: 'json',
                data:{
                    id: id,
                },
                success: function (res){
                    console.log(res)
                    status = true;
                    button.setAttribute("class","like");
                    likenum[0].innerHTML--;
                }
            });
        }
    })
}

