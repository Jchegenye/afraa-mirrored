$('.owl-carousel').owlCarousel({
        items:3,
        loop:true,
        nav:true,
        //center:true,
        margin:10,
        URLhashListener:true,
        autoplayHoverPause:true,
        startPosition: 'URLHash',
         responsive:
        {
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });
// window.location.href = "login.html"