 elseif (get_row_layout() == 'details_accordion') :?>
          <section class="home-details">
            <div class="home-header">
              <h2 class="title"><?=get_sub_field('title')?></h2>
              <h4 class="subtitle"><?=get_sub_field('subtitle')?></h4>
            </div>
            <div class="details_accordion">
              <h4 class="header">Click on each feature to learn more</h4>
              <?
              if(have_rows('details')):
                while(have_rows('details')):
                the_row();
                ?>
                <div class="detail">
                  <div class="intro">
                    <? if(get_sub_field('graphic')) { ?><img src="<?= get_sub_field('graphic') ?>" alt="" /><? } ?>
                    <h3><?= get_sub_field('title') ?></h3>
                    <div class="description"><?= get_sub_field('description') ?></div>
                  </div>
                  <div class="more">
                    <?
                    if(have_rows('sub_details')):
                      while(have_rows('sub_details')):
                      the_row();
                      ?>
                      <div class="sub_detail">
                        <span class="sub_title"><?= get_sub_field('sub_title'); ?></span>
                        <div class="description"><?= get_sub_field('sub_description'); ?></div>
                      </div>
                      <?
                      endwhile;
                    endif;
                    ?>
                   </div>
                </div>
                <?
                endwhile;
              endif;
              ?>
            </div>
            <script>
              jQuery('.details_accordion .detail').each( function() {
                jQuery(this).addClass('closed');
                jQuery(this).click(function() {
                  jQuery(this).toggleClass('closed');
                })
              });
            </script>
          </section>