<?php get_header();
  include(get_template_directory() . '/includes/breadcrumb.php'); // Include Breadcrumb
?>
<div class="container single-page">
  <?php
    if (have_posts()) {
      while (have_posts()) {
        the_post(); ?>
          <div class="main-post single-post">
            <?php edit_post_link('Edit <i class="fa fa-pencil"></i>') ?>
            <h3 class="post-title">
              <a href="<?php the_permalink() ?>">
                <?php the_title() ?>
              </a>
            </h3>
            <span class="post-date">
              <i class="fa fa-calendar fa-fw"></i> <?php the_time('F j, Y') ?>
            </span>
            <span class="post-comments">
              <i class="fa fa-comments-o fa-fw"></i>
              <?php comments_popup_link('0 Comments', 'One Comment', '% Comments', 'Comment-url', 'Comments Disabled'); ?>
            </span>
            <div class="row">
              <div class="col-sm-6">
                <?php the_post_thumbnail('', ['class' => 'img-fluid img-thumbnail', 'title' => 'Post Image']) ?>
              </div>
              <div class="col-sm-6">
                <div class="post-content">
                  <?php the_content() ?>
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
    echo "<div class='clearfix'></div>"; ?>
    <?php
    // Use WP_Query To Get Random Posts From Same Category
    $random_posts_arguments = array(
      'post_per_page'       => 3,
      'orderby'             => 'rand',
      'category__in'        => wp_get_post_categories(get_queried_object_id()),
      'post__not_in'        => array(get_queried_object_id())
    );
    $random_posts = new WP_Query($random_posts_arguments);
    if ($random_posts->have_posts()) {
      while ($random_posts->have_posts()) {
        $random_posts->the_post() ?>
        <div class="author-posts">
          <h3 class="post-title">
            <a href="<?php the_permalink() ?>">
              <?php the_title() ?>
            </a>
          </h3>
          <hr/>
        </div>
      <?php
      }
    }
    wp_reset_postdata(); // Reset Loop Query
    ?>
    <div class="author-info-container">
      <div class="row">
        <div class="col-md-2">
          <?php
            $avatar_arguments = array(
              'class' => 'img-fluid img-thumbnail d-block mx-auto'
            );
            echo get_avatar(get_the_author_meta('ID'), 128, '', 'User Avatar', $avatar_arguments);
          ?>
        </div>
        <div class="col-md-10 author-info">
          <h4>
            <?php the_author_meta('first_name') ?>
            <?php the_author_meta('last_name') ?>
            (<span class="nickname"> <?php the_author_meta('nickname') ?> </span>)
          </h4>
          <?php if (get_the_author_meta('description')) { ?>
            <p><?php the_author_meta('description') ?></p>
          <?php } else {
            echo 'Theres No Biography';
          }
          ?>
        </div>
      </div>
      <hr>
      <p class="author-stats">
        User Posts Count: 
        <span class="posts-count">
          <?php echo count_user_posts(get_the_author_meta('ID')) ?>
        </span>
        User Profile Link: <?php the_author_posts_link() ?>
      </p>
    </div>
    <?php
    echo "<hr class='comment-separator'/>";
    echo '<div class="post-pagination">';
    if (get_previous_post_link()) {
      previous_post_link('%link', '<i class="fa fa-chevron-left fa-lg" aria-hidden="true"></i> New Article:  %title');
    } else {
      echo '<span class="previous-span">New Article: None</span>';
    }
    if (get_next_post_link()) {
      next_post_link('%link', 'Old Article:  %title <i class="fa fa-chevron-right fa-lg" aria-hidden="true"></i>');
    } else {
      echo '<span class="next-span">Old Article: None</span>';
    }
    echo '</div>';
    echo "<hr class='comment-separator'/>";
    comments_template();
  ?>
</div>
<?php get_footer() ?>