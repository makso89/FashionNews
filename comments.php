<div id="comments" class="comments-area">
    <h5 class="text-uppercase">Comments</h5>

    <hr class="mt-3 mb-3 bg-grey">

    <?php

 $defaults = array(
        'walker'            => null,
        'max_depth'         => '',
        'style'             => 'ul',
        'callback'          => null,
        'end-callback'      => null,
        'type'              => 'all',
        'page'              => '',
        'per_page'          => '',
        'avatar_size'       => 32,
        'reverse_top_level' => null,
        'reverse_children'  => '',
        'format'            => current_theme_supports( 'html5', 'comment-list' ) ? 'html5' : 'xhtml',
        'short_ping'        => false,
        'echo'              => true,
    );


$comments_args = array(
        // Change the title of send button 
        'label_submit' => __( 'Send', 'fashionnews' ),
        // Change the title of the reply section
        'title_reply' => __( 'Write a Reply or Comment', 'fashionnews' ),
        // Remove "Text or HTML to be displayed after the set of comment fields".
        'comment_notes_after' => '',
        // Redefine your own textarea (the comment body).
        'comment_field' => '<p class="comment-form-comment"><label for="comment">' . esc_html( 'Comment', 'noun' ) . '</label><br /><textarea id="comment" name="comment" cols="45" rows="7" aria-required="true"></textarea></p>',
);
comment_form( $comments_args );

 ?>
    <ol class="commentlist">
        <?php wp_list_comments(); ?>
    </ol>
    <div class="navigation mb-5">
        <?php paginate_comments_links(); ?>
    </div>
</div>
