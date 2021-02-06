<?php get_header(); ?>
<div class="container home-page networking-category">
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
    <div class="col-md-9">
    <?php
      if (have_posts()) {// Check If There's Posts
        while (have_posts()) {
          the_post(); ?>
          <div class="main-post">
            <div class="row">
              <div class="col-md-6">
                <?php the_post_thumbnail('', ['class' => 'img-fluid img-thumbnail', 'title' => 'Post Image']) ?>
              </div>
              <div class="col-md-6">
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
              </div>
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
        <?php
        }
      }
      ?>
      </div>
      <div class="col-md-3">
        Here Will Be Sidebar
      </div>
      <div class="pagination-numbers">
        <?php 
          // Set Numbering Pagination
          echo numbering_pagination();
        ?>
      </div>
  </div>
</div>
<?php get_footer(); ?>