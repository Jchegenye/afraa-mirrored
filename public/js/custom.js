$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.owl-carousel').owlCarousel({
            items:4,
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

    $('#switch_to_logout').on('change.bootstrapSwitch', function(e) {

        var logout_url = $("#logout_url").val();

        $.ajax({
            method: 'POST',
            url: logout_url,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(){
                window.location.href = "/";
            }
        });
    });
    
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
    initialCountry: "auto",
    geoIpLookup: function(callback) {
        $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
        var countryCode = (resp && resp.country) ? resp.country : "";
        callback(countryCode);
        });
    },
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js" // just for formatting/placeholders etc
    });
  
});
