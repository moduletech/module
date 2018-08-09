<?php /*
/* Template Name: Quiz
*/

get_header();?>

<main class="main quiz" itemscope itemType="https://schema.org/WebPage">

    <section class="quiz-body">
        <?php echo do_shortcode('[gravityform id='.  get_field('quiz_form_id') . ' title=false description=false ajax=true tabindex=49]');?>
    </section><!-- quiz-body-->
    <p class="copyright u-text-white u-text-center u-pt-20">
        Copyright &copy; <?php echo Date('Y');?> Module Housing, LLC
    </p>
</main>

<?php require('footer-quiz.php');?>