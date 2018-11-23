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

    window.onload = function () {
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
    }

    // Table Search
    $("#search").keyup(function(){

        var str= $("#search").val();
        if(str == "") {
            $.get( "{{ asset(url('users/livesearch')) }}");
        }else {
            $.get( "{{ asset(url('users/livesearch?uid=')) }}"+str, function( data ) {
                $( "#txtHint" ).html( data );
            });
        }
    });


    var time = ['.start_time','.end_time'];

    for (let i = 0; i <= time.length; i++) {
        $(time[i]).timepicker();
    }

    // $('.year').datepicker({
    //     minViewMode: 2,
    //     format: 'yyyy'
    //   });

    $('#txtHint').DataTable({
        "columnDefs": [
            { "targets": [1,2,3,4], "orderable": false }
        ]
    });

});


var textarea = document.querySelector('textarea');

textarea.addEventListener('keydown', autosize);

function autosize(){
  var el = this;
  setTimeout(function(){
    el.style.cssText = 'height:auto; padding:0';
    // for box-sizing other than "content-box" use:
    // el.style.cssText = '-moz-box-sizing:content-box';
    el.style.cssText = 'height:' + el.scrollHeight + 'px';
  },0);
}
