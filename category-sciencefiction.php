<?php get_header(); ?>
<div class="container home-page">
  <div class="row">
    <div class="category-information text-center">
      <div class="row">
        <div class="col-md-4">
          <h1 class="category-title"><?php single_cat_title() ?></h1>
        </div>
        <div class="col-md-4">
          <div class="category-description"><?php echo category_description() ?></div>
        </div>
        <div class="col-md-4">
          <div class="cat-stats">
            <span>Articles: 20</span>
            <span>Comments: 100</span>
          </div>
        </div>
      </div>
    </div>
    <?php
      if (have_posts()) {// Check If There's Posts
        while (have_posts()) {
          the_post(); ?>
          <div class="col-sm-6">
            <div class="main-post">
              <h3 class="post-title">
                <a href="<?php the_permalink() ?>">
                  <?php the_title() ?>
                </a>
              </h3>
              <span class="post-author">
                <i class="fa fa-user fa-fw"></i> <?php the_author_posts_link() ?>, 
              </span>
              <span class="post-date">
                <i class="fa fa-calendar fa-fw"></i> <?php the_time('F j, Y') ?>
              </span>
              <span class="post-comments">
                <i class="fa fa-comments-o fa-fw"></i>
                <?php comments_popup_link('0 Comments', 'One Comment', '% Comments', 'Comment-url', 'Comments Disabled'); ?>
              </span>
              <div class="post-content">
                <!-- <?php the_content('Read More') ?>  --> <!-- Using More Tag -->
                <?php the_excerpt() ?>                      <!-- Using The Excerpt -->
              </div>
              <hr>
              <p class="post-categories">
                <i class="fa fa-tags fa-fw"></i> <?php the_category(', ') ?>
              </p>
            </div>
          </div>
        <?php
        }
      }
      echo "<div class='clearfix'></div>";
      echo '<div class="post-pagination">';
      if (get_previous_posts_link()) {
        previous_posts_link('<i class="fa fa-chevron-left fa-lg" aria-hidden="true"></i> New Articles');
      } else {
        echo '<span class="previous-span">New Articles</span>';
      }
      if (get_next_posts_link()) {
        next_posts_link('Old Articles <i class="fa fa-chevron-right fa-lg" aria-hidden="true"></i>');
      } else {
        echo '<span class="next-span">Old Articles</span>';
      }
      echo '</div>'; ?>
      <div class="pagination-numbers">
        <?php 
          // Set Numbering Pagination
          echo numbering_pagination();
        ?>
      </div>
  </div>
</div>
<?php get_footer(); ?>