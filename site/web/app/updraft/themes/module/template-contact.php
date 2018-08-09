<?php /*
/* Template Name: Contact
*/
get_header();?>

<main class="main" itemscope itemType="https://schema.org/WebPage">
    <section class="contact-form u-center-block">
        <header class="contact-form__header">
            <h2 class="contact-form__header-title u-text-center">
                Contact Module
            </h2>
        </header>
        <?php echo do_shortcode('[gravityform id=3 title=false description=false ajax=true tabindex=49]');?>
    </section>
</div>

<?php get_footer();?>