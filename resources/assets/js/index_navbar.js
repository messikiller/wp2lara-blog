;NProgress.configure({
    speed: 1000
}).start();
$(function(){

    // $('.catebar > li > ul.children').addClass('animated zoomIn');
    $('.catebar > li > a').hover(function(){
        $(this).next('ul.children').slideDown(200);
    }, function(){
        $(this).next('ul.children').hide();
    });

    $('.catebar > li > ul.children').mouseover(function(){
        $(this).show();
    }).mouseout(function(){
        $(this).hide();
    });
});
NProgress.done();
