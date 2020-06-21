window.onload = function () {
    let filter = "";
    let imageid = document.getElementsByClassName("imageid");
    let src = document.getElementsByClassName("src");
    let title = document.getElementsByClassName("title");
    let description = document.getElementsByClassName("description");
    $.ajax({
        type: 'POST',
        url: '../src/php/search.php',
        dataType: 'json',
        data: {
            filter: filter,
            action: "title",
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
                        url: '../src/php/search.php',
                        dataType: 'json',
                        data: {
                            filter: filter,
                            action: "title",
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

        }
    })
}

function search() {
    let content = $('input[name="filter"]:checked').val();
    let filter = "";
    let imageid = document.getElementsByClassName("imageid");
    let src = document.getElementsByClassName("src");
    let title = document.getElementsByClassName("title");
    let description = document.getElementsByClassName("description");
    if(content == "title"){
        filter = document.getElementsByClassName("filbyTitle")[0].value;
        $.ajax({
            type: 'POST',
            url: '../src/php/search.php',
            dataType: 'json',
            data: {
                filter: filter,
                action: "title",
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
                            url: '../src/php/search.php',
                            dataType: 'json',
                            data: {
                                filter: filter,
                                action: "title",
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

            }
        })
    }
    if(content == "description"){
        filter = document.getElementsByClassName("filbyDescription")[0].value;
        $.ajax({
            type: 'POST',
            url: '../src/php/search.php',
            dataType: 'json',
            data: {
                filter: filter,
                action: "description",
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
                            url: '../src/php/search.php',
                            dataType: 'json',
                            data: {
                                filter: filter,
                                action: "description",
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

            }
        })
    }
    if(content == undefined){
        alert("Please choose a way to search!")
    }
}