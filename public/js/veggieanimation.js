console.log("Go! :D");

window.onload=function(){

    var tl = new TimelineMax();
    tl.set('#avocado',{visibility:'visible'});

    TweenMax.from("#title", 0.2, {opacity:0, ease:Back.easeIn});
    TweenMax.from('.button-a', 0.2, {opacity:0, ease:Back.easeIn});

    TweenMax.from('.container--head-title', 0.2, {opacity:0, ease:Back.easeIn});
    TweenMax.from('.container--head-subtitle',0.2, {opacity:0, ease:Back.easeIn});
    TweenMax.from('.cnt--item', 0.2, {opacity:0, ease:Back.easeIn});
    TweenMax.from('.container--head.add .search', 0.2, {opacity:0, ease:Back.easeIn});

    // .staggerFrom('.get__circle',1,{drawSVG:" 100 100"})
    // .set('.get__letter',{visibility:'visible'})
    // .staggerFrom('.get__letter',1,{drawSVG:"100 100"})
    // .set('.get__subtitle',{visibility:'visible'})
    // .staggerFromTo('.n ,.o ,.t ,.i ,.f ,.i ,.e ,.d',1,{y:60,opacity:0},{y:0,opacity:1 ,ease:Power2.ease},0.5);


    // var button = document.getElementById('button');
    // button.onclick = function(){
    //     tl.reversed(!tl.reversed());
    // };

};