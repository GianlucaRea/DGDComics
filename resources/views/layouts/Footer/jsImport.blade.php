<!-- all js here -->
<!-- jquery latest version -->
<script src="{{ asset('js/vendor/jquery-1.12.0.min.js') }}"></script>
<!-- popper js -->
<script src="{{ asset('js/popper.min.js') }}"></script>
<!-- bootstrap js -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- owl.carousel js -->
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<!-- meanmenu js -->
<script src="{{ asset('js/jquery.meanmenu.js') }}"></script>
<!-- wow js -->
<script src="{{ asset('js/wow.min.js') }}"></script>
<!-- jquery.parallax-1.1.3.js -->
<script src="{{ asset('js/jquery.parallax-1.1.3.js') }}"></script>
<!-- jquery.countdown.min.js -->
<script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
<!-- jquery.flexslider.js -->
<script src="{{ asset('js/jquery.flexslider.js') }}"></script>
<!-- chosen.jquery.min.js -->
<script src="{{ asset('js/chosen.jquery.min.js') }}"></script>
<!-- jquery.counterup.min.js -->
<script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
<!-- waypoints.min.js -->
<script src="{{ asset('js/waypoints.min.js') }}"></script>
<!-- plugins js -->
<script src="{{ asset('js/plugins.js') }}"></script>
<!-- main js -->
<script src="{{ asset('js/main.js') }}"></script>
<!-- googleapis -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMlLa3XrAmtemtf97Z2YpXwPLlimRK7Pk" ></script>
<script>
    /* Google Map js */
    function initialize() {
        var mapOptions = {
            zoom: 15,
            scrollwheel: false,
            center: new google.maps.LatLng(42.3690279, 13.34978865)
        };

        var map = new google.maps.Map(document.getElementById('googleMap'),
            mapOptions);

        var marker = new google.maps.Marker({
            position: map.getCenter(),
            animation:google.maps.Animation.BOUNCE,
            icon: 'img/map.png',
            map: map
        });

    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>




