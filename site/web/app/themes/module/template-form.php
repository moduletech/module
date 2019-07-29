<?php /*
/* Template Name: Land Waitlist Form
*/
get_header();
?>

<main class="main" itemscope itemType="https://schema.org/WebPage">
<br /><br />
<div class='u-container'>
  <?php echo do_shortcode('[gravityform id="24" title="true" description="true"]'); ?>
</div>
  
</main>

<?php
// include('templates/_mailing-list.php');
get_footer();?>
