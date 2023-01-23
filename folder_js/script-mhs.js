// sidebar-menu
$(".sidebar ul li").on('click', function(){
    $(".sidebar ul li.active").removeClass('active');
    $(this).addClass('active');
});
// sidebar-menu selesai

// sidebar
const menu = document.getElementById('m-label');
const sidebar = document.getElementsByClassName('sidebar')[0];
const content = document.getElementById('content');

menu.onclick = (function(){
    sidebar.classList.toggle('hide');
});

content.onclick = (function(){
    sidebar.classList.add('hide');
});

// sidebar selesai

// dropdown
$(document).ready(function(){
    $(".dd").click(function(){
        $("#dropdown").slideToggle("slow");
    });
});

$(document).ready(function(){
    $("#dropdown").click(function(){
        $("#dropdown").slideToggle("slow");
    });
});
// dropdown selesai