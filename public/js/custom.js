$(document).ready(function(){

    $(function () {
        $('[data-toggle="popover"]').popover()
    });

    $.ajax({
        method: 'GET',
        url: '/dashboard/delegate/ajaxoneonone',
        success: function(data){ 
            data.forEach(element => {
                
                $('.btn-ts-trigger-' + element['id']).popover({ 
                    placement : 'top',
                    html : true,
                    title: function() {
                    return $("#popover-header").html();
                    },
                    content: function() {
                    return $("#popover-content-" + element['id']).html();
                    }
                });
                
            });

              
        
        }
    });

  

    // $('.btn-ts-trigger-afraa').on('click', function () {

    //     //$('.testi').addClass("active");
    //     var data = $(".btn-ts-trigger-afraa").attr('href');
    //     console.log(data)
        
    // });
    
    $.ajax({
        method: 'GET',
        url: '/notification/sessions',
        success: function(data){
            //console.log(data.current_session);

            $.growl.notice({ 
                title: "Current Session", 
                message: "" + data.current_sessions[0].title + " event is happening now.", 
                url: "/dashboard/delegate",
                duration: 60500,
                location: 'br'
            });

            $.growl.error({ 
                title: "Next Session", 
                message: "" + data.next_sessions[0].title + " is happening in next 15 minute(s).", 
                url: "/dashboard/delegate",
                duration: 60000,
                location: 'br'
            });
        }
    });

    // $.growl.error({ message: "The kitten is attacking!" });
    // $.growl.notice({ message: "The kitten is cute!" });
    // $.growl.warning({ message: "The kitten is ugly!" });
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // $('.owl-carousel').owlCarousel({
    //         items:4,
    //         loop:true,
    //         nav:true,
    //         //center:true,
    //         margin:10,
    //         URLhashListener:true,
    //         autoplayHoverPause:true,
    //         startPosition: 'URLHash',
    //         responsive:
    //         {
    //             0:{
    //                 items:1
    //             },
    //             600:{
    //                 items:2
    //             },
    //             1000:{
    //                 items:3
    //             }
    //         }
    //     });

    $(".owl-carousel").owlCarousel({
        items:1,
        loop:true,
        nav:true,
        center:true,
        margin: 10,
        autoplay:true,
        autoplayTimeout:3000,
        URLhashListener:true,
        autoplayHoverPause:false,
        startPosition: 'URLHash'
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

    //bootstrap 4 all file inputs, show there file names
    $('.custom-file input').change(function (e) {
        var files = [];
        for (var i = 0; i < $(this)[0].files.length; i++) {
            files.push($(this)[0].files[i].name);
        }
        $(this).next('.custom-file-label').html(files.join(', '));
    });

    var mySelect = $('#first-disabled2');

    $('#special').on('click', function () {
      mySelect.find('option:selected').prop('disabled', true);
      mySelect.selectpicker('refresh');
    });

    $('#special2').on('click', function () {
      mySelect.find('option:disabled').prop('disabled', false);
      mySelect.selectpicker('refresh');
    });

    $('#basic2').selectpicker({
      liveSearch: true,
      maxOptions: 1
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