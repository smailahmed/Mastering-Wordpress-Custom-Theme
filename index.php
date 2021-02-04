<?php get_header(); ?>
<div class="container">
  <div class="row">
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
                <?php the_post_thumbnail('', ['class' => 'img-fluid img-thumbnail', 'title' => 'Post Image']) ?>
                <div class="post-content">
                  <!-- <?php the_content('Read More') ?>  --> <!-- Using More Tag -->
                  <?php the_excerpt() ?>                      <!-- Using The Excerpt -->
                </div>
                <hr>
                <p class="post-categories">
                  <i class="fa fa-tags fa-fw"></i> <?php the_category(', ') ?>
                </p>
                <p class="post-tags">
                  <?php 
                    if (has_tag()) {
                      the_tags();
                    } else {
                      echo 'Tags: There\'s No Tags';
                    }
                  ?>
                </p>
              </div>
            </div>
          <?php
          }
        }
        echo "<div class='clearfix'></div>";
        echo '<div class="post-pagination">';
        if (get_previous_posts_link()) {
          previous_posts_link('<i class="fa fa-chevron-left fa-lg" aria-hidden="true"></i> Prev');
        } else {
          echo '<span class="previous-span">Prev</span>';
        }
        if (get_next_posts_link()) {
          next_posts_link('Next <i class="fa fa-chevron-right fa-lg" aria-hidden="true"></i>');
        } else {
          echo '<span class="next-span">Next</span>';
        }
        echo '</div>';
      ?>
  </div>
</div>
<?php get_footer(); ?>
<!-- 
<div class="main-post">
    <p class="post-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora et laboriosam deserunt, odit repellendus quasi hic consequuntur accusamus odio.</p>
    <hr>
    <p class="categories">
      <i class="fa fa-tags fa-fw"></i> 
      HTML, Test, Coding, Security</p>
</div>
-->
