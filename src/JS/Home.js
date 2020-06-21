function refresh(){
    let display = document.getElementsByClassName("imgdisplay");
    let display1 = document.getElementsByClassName("titledisplay");
    let display2 = document.getElementsByClassName("desdisplay");
    let link = document.getElementsByClassName("link");
    $.ajax({
        type: 'GET',
        url: 'src/php/home.php',
        dataType: 'json',
        success: function (res){
            console.log(res);
            for(let i=0;i<3;i++){
                display[i].src = "src/travel-images/normal/medium/" + res.src[i];
                display1[i].innerHTML = res.title[i];
                display2[i].innerHTML = res.description[i];
                link[i].href = "./src/Details.php?id=" + res.link[i];
            }
        }
    });
}

function backToTop(){
    var currentScroll =  document.body.scrollTop || document.documentElement.scrollTop;
    if(currentScroll > 0 ){
        window.requestAnimationFrame(backToTop);
        window.scrollTo(0,currentScroll - (currentScroll/5));
    }
}

