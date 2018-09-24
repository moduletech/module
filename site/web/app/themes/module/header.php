<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php include('templates/_head.php');?>

<body <?php body_class(); ?>>
<?php if (is_front_page()) {?>
    <header class="site-header__home">
        <a href="<?php echo bloginfo('url');?>">
            <img class="primary-nav__logo" src="<?php echo get_stylesheet_directory_uri();?>/assets/img-dist/logo-white__text.svg" alt="Module Logo">
        </a>
    </header>

    <nav class="nav-primary__home js-nav-primary__home">
        <div class="nav-branding">
            <a href="<?php echo bloginfo('url');?>">
                <img class="primary-nav__logo u-center-block" src="<?php echo get_stylesheet_directory_uri();?>/assets/img-dist/logo-black__text.svg" alt="Module Logo">
            </a>
        </div>
        <a href="#" class="nav-primary__toggle js-nav-toggle">
            <svg class="nav-primary__toggle-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13 10"><path fill="#1C496F" d="M1.1 4h10.7c.5 0 .9.4.9.9v.3c0 .5-.4.9-.9.9H1.1C.7 6 .3 5.7.3 5.2v-.4c0-.5.4-.8.8-.8zm0 3.6h10.7c.5 0 .9.4.9.9v.3c0 .5-.4.9-.9.9H1.1c-.5 0-.9-.4-.9-.9v-.3c.1-.5.5-.9.9-.9zm0-7.3h10.7c.5 0 .9.4.9.9v.3c0 .5-.4.9-.9.9H1.1c-.4 0-.8-.4-.8-.9v-.3c0-.5.4-.9.8-.9z"/></svg>
        </a>
        <div class="nav-primary__collapse">
            <?php wp_nav_menu(array('theme_location' => 'primary', 'items_wrap' => '<ul class="nav-links">%3$s</ul>'));?>
        </div>
    </nav>



<?php } else { ?>
    <header class="site-header">
        <nav class="nav-primary">
            <div class="nav-branding">
                <a href="<?php echo bloginfo('url');?>">
                    <img class="primary-nav__logo u-center-block" src="<?php echo get_stylesheet_directory_uri();?>/assets/img-dist/logo-black__text.svg" alt="Module Logo">
                </a>
            </div>
            <a href="#" class="nav-primary__toggle js-nav-toggle">
                <svg class="nav-primary__toggle-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13 10"><path fill="#1C496F" d="M1.1 4h10.7c.5 0 .9.4.9.9v.3c0 .5-.4.9-.9.9H1.1C.7 6 .3 5.7.3 5.2v-.4c0-.5.4-.8.8-.8zm0 3.6h10.7c.5 0 .9.4.9.9v.3c0 .5-.4.9-.9.9H1.1c-.5 0-.9-.4-.9-.9v-.3c.1-.5.5-.9.9-.9zm0-7.3h10.7c.5 0 .9.4.9.9v.3c0 .5-.4.9-.9.9H1.1c-.4 0-.8-.4-.8-.9v-.3c0-.5.4-.9.8-.9z"/></svg>
            </a>
            <div class="nav-primary__collapse">
                <?php wp_nav_menu(array('theme_location' => 'primary', 'items_wrap' => '<ul class="nav-links">%3$s</ul>'));?>
            </div>
        </nav>
    </header>
<?php } ?>
