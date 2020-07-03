<!-- slider-area-start -->
{{--<div class="slider-area" style="border-bottom: #000000 solid 2px;">
    <div class="slider-active owl-carousel">
        <div class="single-slider pt-125 pb-130 bg-img" style="background-image: url('{{ asset('img/immaginiNostre/slide1New.jpg')}}'); background-size: 100%; background-repeat: no-repeat; height: 750px"></div>
        <div class="single-slider pt-215 pb-100 bg-img" style="background-image: url('{{ asset('img/immaginiNostre/slide2New.jpg')}}'); background-size: 100%; background-repeat: no-repeat; height: 750px"></div>
        <div class="single-slider pt-215 pb-100 bg-img" style="background-image: url('{{ asset('img/immaginiNostre/slide3New.jpg')}}'); background-size: 100%; background-repeat: no-repeat; height: 750px"></div>
        <div class="single-slider pt-215 pb-100 bg-img" style="background-image: url('{{ asset('img/immaginiNostre/slide4New.jpg')}}'); background-size: 100%; background-repeat: no-repeat; height: 750px"></div>
    </div>
</div>--}}

{{--tentativi andati a a male--}}

{{--<style>
    * {box-sizing: border-box;}
    body {font-family: Verdana, sans-serif;}
    .mySlides {
        display: none;
        height: 750px;
    }
    img {vertical-align: middle;}

    /* Slideshow container */
    .slideshow-container {
        width: 100%;
        height: 750px;
        position: relative;
        border-bottom: 2px solid black;
    }

    /* Caption text */
    .text {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }

    .active {
        background-color: #717171;
    }

    /* Fading animation */
    .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 4.5s;
        animation-name: fade;
        animation-duration: 4.5s;
    }

    @-webkit-keyframes fade {
        from {opacity: .4}
        to {opacity: 1}
    }

    @keyframes fade {
        from {opacity: .4}
        to {opacity: 1}
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {
        .text {font-size: 11px}
    }
</style>

<body>

<div class="slideshow-container">

    <div class="mySlides fade">
        <img src="{{asset('img/immaginiNostre/slide1New.jpg')}}" style="width:100%; background-size: 100%; background-repeat: no-repeat; height: 100%;">
    </div>

    <div class="mySlides fade">
        <img src="{{asset('img/immaginiNostre/slide2New.jpg')}}" style="width:100%; background-size: 100%; background-repeat: no-repeat; height: 100%;">
    </div>

    <div class="mySlides fade">
        <img src="{{asset('img/immaginiNostre/slide3New.jpg')}}" style="width:100%; background-size: 100%; background-repeat: no-repeat; height: 100%;">
    </div>

    <div class="mySlides fade">
        <img src="{{asset('img/immaginiNostre/slide4New.jpg')}}" style="width:100%; background-size: 100%; background-repeat: no-repeat; height: 100%;">
    </div>

    <div style="text-align:center">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>
</div>
<br>

<script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        setTimeout(showSlides, 5000); // Change image every 2 seconds
    }
</script>--}}

<style>
    .w3-content{margin-left:auto;margin-right:auto}.w3-content{width:100%; height: 750px; border-bottom: 2px solid black}
    .w3-animate-fading{animation:fading 10s infinite}@keyframes fading{0%{opacity:0}20%{opacity:1}80%{opacity: 1}100%{opacity:0}}
    .mySlides {display: none;height: 750px;}
    .w3-hoverable tbody tr:hover,.w3-ul.w3-hoverable li:hover{background-color:#ccc}.w3-centered tr th,.w3-centered tr td{text-align:center}
</style>

<div class="w3-content" style="background-color: #000000">
    <img class="mySlides w3-animate-fading" src="{{asset('img/immaginiNostre/slide1New.jpg')}}" style="width:100%; background-size: 100%; background-repeat: no-repeat; height: 100%;">
    <img class="mySlides w3-animate-fading" src="{{asset('img/immaginiNostre/slide2New.jpg')}}" style="width:100%; background-size: 100%; background-repeat: no-repeat; height: 100%;">
    <img class="mySlides w3-animate-fading" src="{{asset('img/immaginiNostre/slide3New.jpg')}}" style="width:100%; background-size: 100%; background-repeat: no-repeat; height: 100%;">
    <img class="mySlides w3-animate-fading" src="{{asset('img/immaginiNostre/slide4New.jpg')}}" style="width:100%; background-size: 100%; background-repeat: no-repeat; height: 100%;">
</div>

<script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        slides[slideIndex-1].style.display = "block";
        setTimeout(showSlides, 9600); // Change image every 6 seconds
    }

</script>


<!-- slider-area-end -->