<!doctype html>
<html lang="en">
<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="index/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="index/img/favicon.ico" type="image/x-icon">
    <title>Path Of The Food</title>


    <link href="index/style.css" rel="stylesheet">

</head>
<body>


    <!--
		We position the images fixed and therefore need to place them outside of #skrollr-body.
		We will then use data-anchor-target to display the correct image matching the current section (.gap element).
	-->

	<!-- home -->
	<div
		class="parallax-image-wrapper parallax-image-wrapper-100"
		data-anchor-target="#home"
		data-bottom-top="transform:translate3d(0px, 200%, 0px)"
		data-top-bottom="transform:translate3d(0px, 0%, 0px)">

		<div
			class="parallax-image parallax-image-100"
			style="background-image:url(index/img/bcg_slide-3.jpg)"
			data-anchor-target="#home"
			data-bottom-top="transform: translate3d(0px, -80%, 0px);"
			data-top-bottom="transform: translate3d(0px, 80%, 0px);"
		></div>
		<!--the +/-80% translation can be adjusted to control the speed difference of the image-->
	</div>


	<!-- slide 2 -->
	<div
		class="parallax-image-wrapper parallax-image-wrapper-100"
		data-anchor-target="#ordena"
		data-bottom-top="transform:translate3d(0px, 200%, 0px)"
		data-top-bottom="transform:translate3d(0px, 0%, 0px)">

		<div
			class="parallax-image parallax-image-100"
			style="background-image:url(index/img/orderphoto.jpg  )"
			data-anchor-target="#ordena"
			data-bottom-top="transform: translate3d(0px, -80%, 0px);"
			data-top-bottom="transform: translate3d(0px, 80%, 0px);"
		></div>
	</div>


	<!-- slide 3 -->
	<div
		class="parallax-image-wrapper parallax-image-wrapper-100"
		data-anchor-target="#localiza"
		data-bottom-top="transform:translate3d(0px, 200%, 0px)"
		data-top-bottom="transform:translate3d(0px, 0%, 0px)">

		<div
			class="parallax-image parallax-image-100"
			style="background-image:url(index/img/maphoto1.jpg)"
			data-anchor-target="#localiza"
			data-bottom-top="transform: translate3d(0px, -80%, 0px);"
			data-top-bottom="transform: translate3d(0px, 80%, 0px);"
		></div>
	</div>

    <!-- /Slide end-->
    <div
            class="parallax-image-wrapper parallax-image-wrapper-100"
            data-anchor-target="#about"
            data-bottom-top="transform:translate3d(0px, 200%, 0px)"
            data-top-bottom="transform:translate3d(0px, 0%, 0px)">

        <div
                class="parallax-image parallax-image-100"
                style="background:#e65100"
                data-anchor-target="#about"
                data-bottom-top="transform: translate3d(0px, -80%, 0px);"
                data-top-bottom="transform: translate3d(0px, 80%, 0px);"
                ></div>
    </div>




	<!-- Nav /-->
	<header data-0="background-color: rgba(230,81,0,0.25);" data-150="background-color: rgba(230,81,0, 1);">

		<div class="btn-responsive-menu">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </div>

		<ul id="nav" data-0="padding:20px 0;" data-150="padding: 0 0;">

			<li><a href="#home">Pof</a></li>
			<li><a href="#ordena">Ordena</a></li>
            <li><a href="#localiza">Localiza</a></li>

		</ul>

	</header>


	<div id="skrollr-body">


		<!-- Home /-->
		<div id="home" class="gap gap-100" style="background-image:url(index/img/bcg_slide-3.jpg);" id="top">

	         	<div class="box-home">

		         	<h2>Path Of The Food</h2>
                    <p>Tu comida en tiempo y forma</p>

	         	</div>

		</div>



		<!-- Slide 2 /-->
		<div id="ordena" class="gap gap-100" style="background-image:url(index/img/orderphoto.jpg);  text-align: left">

			 <div id="container-1">

	         	<div class="box" data-anchor-target="#container-1" data-bottom="opacity:0;bottom:30%" data-top="opacity:1;bottom:40%">

		         	<h2>Ordena tu comida fácil y rapido</h2>
                    <p>Con nuestro método de orden en 4 pasos, ahorrás mucho tiempo, claro sabemos que tienes hambre, nostros te ayudamos</p>
	         	</div>

             </div>

		</div>



		<!-- Slide 3 /-->
		<div id="localiza" class="gap gap-100" style="background-image:url(index/img/maphoto1.jpg);">

			 <div id="container-2">

	         	<div class="box localiza" data-anchor-target="#container-2" data-bottom="right:100%;bottom:10%;" data-top="right:45%;bottom:35%">

                    <h2>Localiza tu pedido, no te frustres!</h2>
                    <p>Con nuestro sistema de pedido tu podrás saber en cualquier momento su estatus y admeas reastrear en mapa su localización.</p>

	         	</div>

             </div>

		</div>

		<div id="about" class="gap gap-100">

            <div id="container-3">
                <div class="box" data-anchor-target="#container-3" data-bottom="right: 25%; bottom:10%; opacity:0" data-top="right:25%;bottom:35%; opacity:1">
                    <h2>Esto es todo</h2>
                    <p>Te ha gustado nuestra idea? <br>Ponte en contacto con alguno de nosotros <br><a href="https://www.twitter.com/ferfrancuito" target="_blank">@ferfrancuito</a>, <a href="https://www.twitter.com/marinslns" target="_blank">@marinslns</a>, <a href="https://www.twitter.com/juank2502" target="_blank">@juank2502</a>, <a href="https://www.twitter.com/hozkarr" target="_blank">@hozkarr</a>.</p>
                </div>
            </div>

		</div>

	</div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="index/js/skrollr.min.js"></script>
<script src="index/js/skrollr.menu.min.js"></script>

<script type="text/javascript">
$(function(){

	var s = skrollr.init({
		smoothScrolling: true
	});

	//The options (second parameter) are all optional. The values shown are the default values.
	skrollr.menu.init(s, {
	    //skrollr will smoothly animate to the new position using `animateTo`.
	    animate: true,

	    //The easing function to use.
	    easing: 'sqrt',

	    //Multiply your data-[offset] values so they match those set in skrollr.init
	    scale: 2,

	    //How long the animation should take in ms.
	    duration: function(currentTop, targetTop) {
	        //By default, the duration is hardcoded at 500ms.
	        return 500;

	        //But you could calculate a value based on the current scroll position (`currentTop`) and the target scroll position (`targetTop`).
	        //return Math.abs(currentTop - targetTop) * 10;
	    }

	    //If you pass a handleLink function you'll disable `data-menu-top` and `data-menu-offset`.
	    //You are in control where skrollr will scroll to. You get the clicked link as a parameter and are expected to return a number.
	    /*
	    handleLink: function(link) {
	        return 400;//Hardcoding 400 doesn't make much sense.
	    }*/
	});

	//When btn is clicked
		$(".btn-responsive-menu").click(function() {
			$("#nav").slideToggle('fast', function() {});

		});


	});
	</script>
</body>
</html>