<?php /*
/* Template Name: Tour Sign-up
*/
get_header();?>

<main class="main" itemscope itemType="https://schema.org/WebPage">
    <section class="contact-form u-center-block">
        <header class="contact-form__header">
            <h2 class="contact-form__header-title u-text-center">
                Sign Up For A Tour
            </h2>
        </header>
        <?php echo do_shortcode('[gravityform id="22" title="true" description="true" ajax=true tabindex=49]');?>
    </section>
</div>

<?php get_footer();?>
