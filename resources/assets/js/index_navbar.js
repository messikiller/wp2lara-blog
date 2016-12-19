;NProgress.configure({
    template: '<div class="bar" role="bar" style="height:3px;background:#3498db;"><div class="peg"></div></div><div class="spinner" role="spinner"><div class="spinner-icon" style="border-left-color:#eaeaea;border-top-color:#eaeaea;"></div></div>'
});

NProgress.start();

$(function(){
    $('.catebar > li > a').hover(function(){
        $(this).children('i.fa').removeClass('fa-rotate-270').addClass('fa-rotate-270');
        $(this).next('ul.children').show();
        // $(this).next('ul.children').slideDown(200);
    }, function(){
        $(this).children('i.fa').removeClass('fa-rotate-270');
        $(this).next('ul.children').hide();
    });

    $('.catebar > li > ul.children').mouseover(function(){
        $(this).prev('a').children('i.fa').removeClass('fa-rotate-270').addClass('fa-rotate-270');
        $(this).show();
    }).mouseout(function(){
        $(this).prev('a').children('i.fa').removeClass('fa-rotate-270');
        $(this).hide();
    });
});

NProgress.done();
