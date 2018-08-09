<section class="mailing-list u-text-center" id="mailer">
    <div class="u-container">
        <h2 class="mailing-list-headline">
            <?php the_field('cta_headline', 'option');?>
        </h2>
        <p class="mailing-list-desc">
            <?php the_field('cta_copy', 'option');?>
        </p>
        <div class="mailing-list-form">
            <?php echo do_shortcode('[gravityform id='.  get_field('cta_form_id', 'option') . ' title=false description=false ajax=true tabindex=49]');?>
        </div>
    </div>
</section>