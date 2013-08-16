<?php
/**
 * The main template file.
 *
 * @package WordPress_Themes
 * @subpackage Gridlock
 */

get_header(); ?>

<?php $cat = get_query_var("category_name");
  if (!empty($cat)) { // category ?>
  <div id="category-row" class="row">
    <div id="category-head">
      <?php $cat_name = get_category_by_slug(get_query_var("category_name"))->name; ?>
      <div class="category-row header-<?php echo strtolower($cat_name); ?>"></div>
        <div class="category-headline">
          <h1><?php echo $cat_name; ?></h1> 
          <h3><?php echo get_term_by("slug", get_query_var("issue"), "issue")->name; ?></h3>
        </div>
      </div>
    </div>
  </div>
    <?php
        $meta_query = new WP_Query(array_merge(array("issue" => get_query_var("issue"), "category_name" => get_query_var("category_name"), get_option("gridlock_query")) ));
        $old_row = 0;
        while ( $meta_query->have_posts() ) : $meta_query->the_post(); ?>
            <div class='row gridlock-row'>
              <div class="article-container col-12" >
                <?php get_template_part( 'content' ); 
                // closing the column tab?>
              </div>
            </div>
    <?php endwhile; ?>
  <?php } else {
    // issue
  ?>
  <?php get_template_part("issue"); ?>
  <?php } ?>

<?php get_footer(); ?>

