<?php /*
/* Template Name: Document Embed
*/
get_header();?>
  
<style>
  
  .doc-embed-frame {
    width: 100%;
    min-height: 90vh;
  }
</style>

<main class="main" itemscope itemType="https://schema.org/WebPage">

<div class='u-container'>

  <div class="double-header">
    <br />
    <h2 class="title"><?= the_field('document_name'); ?></h2>
  </div>
  <br />

  <?php
  
    $file = get_field('file');
  
  ?>
  <section>
    <iframe class="doc-embed-frame" src="<?php echo $file['url']; ?>"></iframe>
  </section>
</div>
</main>

<?php
// include('templates/_mailing-list.php');
get_footer();?>
