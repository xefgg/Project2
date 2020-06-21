window.onload = function () {
    let countrySelect = document.querySelector('#selectCountry');
    let title = "";
    let imageid = document.getElementsByClassName("imageid");
    let src = document.getElementsByClassName("src");
    $.ajax({
        type: 'GET',
        url: '../src/php/country.php',
        dataType: 'json',
        success: function (res){
            //console.log(res.country);
            for(let i=0;i<res.country.length;i++){
                let countryOption = new Option(res.country[i],res.country[i]);
                countrySelect.options.add(countryOption);
            }
        }
    });
    $.ajax({
        type: 'POST',
        url: '../src/php/browser.php',
        dataType: 'json',
        data: {
            filter: title,
            action: "title",
            page: 1,
        },
        success: function (res) {
            console.log(res);
            let total = Math.ceil(res.src.length / 20);
            $('.M-box').pagination({
                pageCount: total,
                callback: function (api) {
                    $('.now').text(api.getCurrent());
                    console.log(api.getCurrent());
                    $.ajax({
                        type: 'POST',
                        url: '../src/php/browser.php',
                        dataType: 'json',
                        data: {
                            filter: title,
                            action: "title",
                            page: api.getCurrent(),
                        },
                        success: function (res) {
                            console.log(res);
                            for (let i = 0; i < 20; i++) {
                                imageid[i].href = "";
                                src[i].src = "";
                            }
                            for (let i = 0; i < Math.min(res.id.length, 20); i++) {
                                imageid[i].href = "../src/Details.php?id=" + res.id[i];
                                src[i].src = "../src/travel-images/normal/medium/" + res.src[i];
                            }
                        }
                    })
                }
            });
            for (let i = 0; i < 20; i++) {
                imageid[i].href = "";
                src[i].src = "";
            }
            for (let i = 0; i < Math.min(res.id.length, 20); i++) {
                imageid[i].href = "../src/Details.php?id=" + res.id[i];
                src[i].src = "../src/travel-images/normal/medium/" + res.src[i];
            }

        }
    })
}

function search() {
    let titlesearch = document.getElementsByClassName("titlesearch");
    let title = titlesearch[0].value;
    let imageid = document.getElementsByClassName("imageid");
    let src = document.getElementsByClassName("src");
    $.ajax({
        type: 'POST',
        url: '../src/php/browser.php',
        dataType: 'json',
        data:{
            filter: title,
            action: "title",
            page: 1,
        },
        success: function (res){
            console.log(res);
            let total = Math.ceil(res.src.length/20);
            $('.M-box').pagination({
                pageCount: total,
                callback: function (api) {
                    $('.now').text(api.getCurrent());
                    console.log(api.getCurrent());
                    $.ajax({
                        type: 'POST',
                        url: '../src/php/browser.php',
                        dataType: 'json',
                        data: {
                            filter: title,
                            action: "title",
                            page: api.getCurrent(),
                        },
                        success: function (res) {
                            console.log(res);
                            for(let i=0;i<20;i++) {
                                imageid[i].href = "";
                                src[i].src = "";
                            }
                            for(let i=0;i<Math.min(res.id.length,20);i++){
                                imageid[i].href = "../src/Details.php?id=" + res.id[i];
                                src[i].src = "../src/travel-images/normal/medium/" + res.src[i];
                            }
                        }
                    })
                }
            });
            for(let i=0;i<20;i++) {
                imageid[i].href = "";
                src[i].src = "";
            }
            for(let i=0;i<Math.min(res.id.length,20);i++){
                imageid[i].href = "../src/Details.php?id=" + res.id[i];
                src[i].src = "../src/travel-images/normal/medium/" + res.src[i];
            }

        }
    });
}

function selectcity(){
    var select = document.getElementById("selectCountry");
    var value = select.value;
    var citySelect = document.getElementById("selectCity");
    $.ajax({
        type: 'POST',
        url: '../src/php/city.php',
        dataType: 'json',
        data:{
            country: value,
        },
        success: function (res){
            console.log(res.city);
            citySelect.options.length = 0;
            for(let i=0;i<res.city.length;i++){
                let cityOption = new Option(res.city[i],res.city[i]);
                citySelect.options.add(cityOption);
            }
        }
    });
}

function filter() {
    let content = document.getElementById("selectContent").value;
    let country = document.getElementById("selectCountry").value;
    let city = document.getElementById("selectCity").value;
    let imageid = document.getElementsByClassName("imageid");
    let src = document.getElementsByClassName("src");
    let filter = new Array(content,country,city)
    console.log(filter)
    $.ajax({
        type: 'POST',
        url: '../src/php/browser.php',
        dataType: 'json',
        data:{
            filter:JSON.stringify(filter),
            action: "filter",
            page: 1,
        },
        success: function (res){
            console.log(res.id);
            let total = Math.ceil(res.src.length/20);
            $('.M-box').pagination({
                pageCount: total,
                callback: function (api) {
                    $('.now').text(api.getCurrent());
                    console.log(api.getCurrent());
                    $.ajax({
                        type: 'POST',
                        url: '../src/php/browser.php',
                        dataType: 'json',
                        data: {
                            filter:JSON.stringify(filter),
                            action: "filter",
                            page: api.getCurrent(),
                        },
                        success: function (res) {
                            console.log(res);
                            for(let i=0;i<20;i++) {
                                imageid[i].href = "";
                                src[i].src = "";
                            }
                            for(let i=0;i<Math.min(res.id.length,20);i++){
                                imageid[i].href = "../src/Details.php?id=" + res.id[i];
                                src[i].src = "../src/travel-images/normal/medium/" + res.src[i];
                            }
                        }
                    })
                }
            });
            for(let i=0;i<20;i++) {
                imageid[i].href = "";
                src[i].src = "";
            }
            for(let i=0;i<Math.min(res.id.length,20);i++){
                imageid[i].href = "../src/Details.php?id=" + res.id[i];
                src[i].src = "../src/travel-images/normal/medium/" + res.src[i];
            }
        }
    });
}

function countryfilter(object){
    let country = object.innerText.toLowerCase();
    let imageid = document.getElementsByClassName("imageid");
    let src = document.getElementsByClassName("src");
    $.ajax({
        type: 'POST',
        url: '../src/php/browser.php',
        dataType: 'json',
        data:{
            filter:country,
            action: "country",
            page: 1,
        },
        success: function (res){
            console.log(res.id);
            let total = Math.ceil(res.src.length/20);
            $('.M-box').pagination({
                pageCount: total,
                callback: function (api) {
                    $('.now').text(api.getCurrent());
                    console.log(api.getCurrent());
                    $.ajax({
                        type: 'POST',
                        url: '../src/php/browser.php',
                        dataType: 'json',
                        data: {
                            filter:country,
                            action: "country",
                            page: api.getCurrent(),
                        },
                        success: function (res) {
                            console.log(res);
                            for(let i=0;i<20;i++) {
                                imageid[i].href = "";
                                src[i].src = "";
                            }
                            for(let i=0;i<Math.min(res.id.length,20);i++){
                                imageid[i].href = "../src/Details.php?id=" + res.id[i];
                                src[i].src = "../src/travel-images/normal/medium/" + res.src[i];
                            }
                        }
                    })
                }
            });
            for(let i=0;i<20;i++) {
                imageid[i].href = "";
                src[i].src = "";
            }
            for(let i=0;i<Math.min(res.id.length,20);i++){
                imageid[i].href = "../src/Details.php?id=" + res.id[i];
                src[i].src = "../src/travel-images/normal/medium/" + res.src[i];
            }
        }
    });
}

function contentfilter(object) {
    let content = object.innerText.toLowerCase();
    let imageid = document.getElementsByClassName("imageid");
    let src = document.getElementsByClassName("src");
    $.ajax({
        type: 'POST',
        url: '../src/php/browser.php',
        dataType: 'json',
        data:{
            filter:content,
            action: "content",
            page: 1,
        },
        success: function (res){
            console.log(res.id);
            let total = Math.ceil(res.src.length/20);
            $('.M-box').pagination({
                pageCount: total,
                callback: function (api) {
                    $('.now').text(api.getCurrent());
                    console.log(api.getCurrent());
                    $.ajax({
                        type: 'POST',
                        url: '../src/php/browser.php',
                        dataType: 'json',
                        data: {
                            filter:content,
                            action: "content",
                            page: api.getCurrent(),
                        },
                        success: function (res) {
                            console.log(res);
                            for(let i=0;i<20;i++) {
                                imageid[i].href = "";
                                src[i].src = "";
                            }
                            for(let i=0;i<Math.min(res.id.length,20);i++){
                                imageid[i].href = "../src/Details.php?id=" + res.id[i];
                                src[i].src = "../src/travel-images/normal/medium/" + res.src[i];
                            }
                        }
                    })
                }
            });
            for(let i=0;i<20;i++) {
                imageid[i].href = "";
                src[i].src = "";
            }
            for(let i=0;i<Math.min(res.id.length,20);i++){
                imageid[i].href = "../src/Details.php?id=" + res.id[i];
                src[i].src = "../src/travel-images/normal/medium/" + res.src[i];
            }
        }
    });
}

function cityfilter(object) {
    let city = object.innerText.toLowerCase();
    let imageid = document.getElementsByClassName("imageid");
    let src = document.getElementsByClassName("src");
    $.ajax({
        type: 'POST',
        url: '../src/php/browser.php',
        dataType: 'json',
        data:{
            filter:city,
            action: "city",
            page: 1,
        },
        success: function (res){
            console.log(res.id);
            let total = Math.ceil(res.src.length/20);
            $('.M-box').pagination({
                pageCount: total,
                callback: function (api) {
                    $('.now').text(api.getCurrent());
                    console.log(api.getCurrent());
                    $.ajax({
                        type: 'POST',
                        url: '../src/php/browser.php',
                        dataType: 'json',
                        data: {
                            filter:city,
                            action: "city",
                            page: api.getCurrent(),
                        },
                        success: function (res) {
                            console.log(res);
                            for(let i=0;i<20;i++) {
                                imageid[i].href = "";
                                src[i].src = "";
                            }
                            for(let i=0;i<Math.min(res.id.length,20);i++){
                                imageid[i].href = "../src/Details.php?id=" + res.id[i];
                                src[i].src = "../src/travel-images/normal/medium/" + res.src[i];
                            }
                        }
                    })
                }
            });
            for(let i=0;i<20;i++) {
                imageid[i].href = "";
                src[i].src = "";
            }
            for(let i=0;i<Math.min(res.id.length,20);i++){
                imageid[i].href = "../src/Details.php?id=" + res.id[i];
                src[i].src = "../src/travel-images/normal/medium/" + res.src[i];
            }
        }
    });
}





