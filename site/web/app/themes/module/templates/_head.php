<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php wp_head(); ?>

    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img-dist/favicon.ico"/>
  
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text|Unica+One" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/cnc7avl.css">

    <script>try{Typekit.load({ async: true });}catch(e){}</script>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.min.css"/>

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
