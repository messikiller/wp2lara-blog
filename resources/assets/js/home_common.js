;$(document).ready(function()
{
    // navbar configure
    $('.catebar > li > a').hover(function(){
        $(this).children('i.fa').removeClass('fa-rotate-270').addClass('fa-rotate-270');
        $(this).next('ul.children').show();
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

    // navbar stickup configure
    $('#navbar').stickUp();

    // footer image popover configure
    $('#footer .donation img').each(function(){
        $(this).popover({
            placement: 'top',
            trigger: 'hover',
            content: $(this).attr('alt'),
            tipClass: 'donate-tip'
        });
    });

    // nprogress and pjax configure
    NProgress.configure({
        template: '<div class="bar" role="bar" style="height:3px;background:#3498db;">'
            +'<div class="peg"></div></div><div class="spinner" role="spinner">'
            +'<div class="spinner-icon" style="border-left-color:#eaeaea;border-top-color:#eaeaea;"></div></div>'
    });
    $(document).pjax('a', '#pjax-container');
    $(document).on('pjax:timeout', function(event){
        event.preventDefault();
    });
    $(document).on('pjax:start', function(){
        NProgress.start();
    });
    $(document).on('pjax:end', function(){
        NProgress.done();
    });

});
