<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php wp_head(); ?>

    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img-dist/favicon.ico"/>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text|Unica+One" rel="stylesheet">

    <script>try{Typekit.load({ async: true });}catch(e){}</script>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.min.css"/>

    <!-- Google Analytics-->
    <?php if (!is_user_logged_in()) {?>
      <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-93265332-1', 'auto');
        ga('send', 'pageview');

      </script>
    <?php } ?> 

		<!-- Google Tag Manager -->
    <?php if (!is_user_logged_in()) {?>
			<script>
				(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
				new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
				j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
				'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
				})(window,document,'script','dataLayer','GTM-M5F4RXD');
			</script>
    <?php } ?> 
		<!-- End Google Tag Manager -->

    <!-- End Facebook Pixel Code -->
</head>
