
$(".nav-logo").click(function(e){
    e.preventDefault();
    $('html, body').animate({scrollTop: window.innerHeight}, 1000)
    alert("Siker");
})

$('.gallery a').fancybox({});

