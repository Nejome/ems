$(function(){

    $('#sidebar').hide();

    //the side-bar script
    $('#control').click(function(){

        $('#sidebar').toggle(500);

    });

    //the content of side-bar script

    $('.menu').hide();

    $('#employees').click(function(){

        $('#employees-menu').slideToggle(800);

        $('.my-left1').toggleClass('non-displayed');
        $('.my-down1').toggleClass('non-displayed');

    });

});

$('#managements').click(function(){

    $('#managements-menu').slideToggle(800);

    $('.my-left5').toggleClass('non-displayed');
    $('.my-down5').toggleClass('non-displayed');

});

$('#collages').click(function(){

    $('#collages-menu').slideToggle(800);

    $('.my-left6').toggleClass('non-displayed');
    $('.my-down6').toggleClass('non-displayed');

});

$('#jobs').click(function(){

    $('#jobs-menu').slideToggle(800);

    $('.my-left2').toggleClass('non-displayed');
    $('.my-down2').toggleClass('non-displayed');

});

$('#attendance').click(function(){

    $('#attendance-menu').slideToggle(800);

    $('.my-left1').toggleClass('non-displayed');
    $('.my-down1').toggleClass('non-displayed');

});

$('#leaves').click(function(){

    $('#leaves-menu').slideToggle(800);

    $('.my-left3').toggleClass('non-displayed');
    $('.my-down3').toggleClass('non-displayed');;

});

$('#reports').click(function(){

    $('#reports-menu').slideToggle(800);

    $('.my-left4').toggleClass('non-displayed');
    $('.my-down4').toggleClass('non-displayed');

});

$('#users').click(function(){

    $('#users-menu').slideToggle(800);

    $('.my-left7').toggleClass('non-displayed');
    $('.my-down7').toggleClass('non-displayed');

});