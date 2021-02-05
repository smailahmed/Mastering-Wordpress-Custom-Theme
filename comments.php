<?php
  if (comments_open()) {  // Check If Comments Are Open ?>
    <h3 class="comments-count"><?php Comments_number('0 Comments', '1 Comment', '% Comments') ?></h3>
    <?php
    echo '<ul class="list-unstyled comments-list">';
    $comments_arguments = array( // Comments Arguments
      'max_depth'   => 3,        // Comments Level
      'type'        => 'comment',// Comments Type
      'avatar_size' => 64        // Avatar Size In Pixels
    );
    wp_list_comments($comments_arguments); // List All Comments
    echo '</ul>';
    echo "<hr class='comment-separator'/>";
    $commentform_arguments = array(
      'title_reply'           => 'Add Your Comment',
      'title_reply_to'        => 'Add A Reply To [%s]',
      'class_submit'          => 'btn btn-primary btn-md',
      'comment_notes_before'  => ''
    );
    comment_form($commentform_arguments);
  } else {
    echo 'Sorry Comments Are Disabled';
  }