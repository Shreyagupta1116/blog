<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to chained_comment() which is
 * located in the functions.php file.
 *
 * @package chained
 * @since Chained 1.0.5
 */
?>

<?php
    /*
     * If the current post is protected by a password and
     * the visitor has not yet entered the password we will
     * return early without loading the comments.
     */
    if (post_password_required()) return;
?>

    <div id="comments"  itemscope itemtype="http://schema.org/UserComments" class="comments-area  <?php  if ( !have_comments() ) echo 'no-comments'; ?>">
        <?php if ( false == get_theme_mod('chained_single_hide_comments_number', false) ): ?>
            <div class="comments-area-title">
                <h3>
                    <?php
                     $comments_number = get_comments_number();
                     if ( '1' === $comments_number ) {
                       /* translators: %s: post title */
                       printf( esc_html_x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'chained' ), esc_html(get_the_title()) );
                     } else {
                       printf(
                        esc_html(
                             /* translators: 1: number of comments, 2: post title */
                             _nx(
                               '%1$s Reply to &ldquo;%2$s&rdquo;',
                               '%1$s Replies to &ldquo;%2$s&rdquo;',
                               $comments_number,
                               'comments title',
                               'chained'
                             )
                         ),
                         esc_html(number_format_i18n( $comments_number )),
                         esc_html(get_the_title())
                       );
                     }
                    ?>
                </h3>
            </div>
     <?php endif; ?>

        <?php // You can start editing here -- including this comment! ?>

        <?php if ( have_comments() ) : ?>

            <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
            <nav role="navigation" id="comment-nav-above" class="site-navigation comment-navigation">
                <h3 class="assistive-text"><?php esc_html_e( 'Comment navigation', 'chained' ); ?></h3>
                <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'chained' ) ); ?></div>
                <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'chained' ) ); ?></div>
            </nav><!-- #comment-nav-before .site-navigation .comment-navigation -->
            <?php endif; // check for comment navigation ?>

            <ol class="commentlist">
                <?php
                    /* Loop through and list the comments. Tell wp_list_comments()
                     * to use chained_comment() to format the comments.
                     * If you want to overload this in a child theme then you can
                     * define chained_comment() and that will be used instead.
                     */
                    wp_list_comments( array( 'callback' => 'chained_comments','short_ping'  => true ) );
                ?>
            </ol><!-- .commentlist -->

            <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
            <nav role="navigation" id="comment-nav-below" class="site-navigation comment-navigation">
                <h3 class="assistive-text"><?php esc_html_e( 'Comment navigation', 'chained' ); ?></h3>
                <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'chained' ) ); ?></div>
                <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'chained' ) ); ?></div>
            </nav><!-- #comment-nav-below .site-navigation .comment-navigation -->
            <?php endif; // check for comment navigation ?>
        

        <?php endif; // have_comments() ?>

    </div><!-- #comments .comments-area -->
    <?php
        // If comments are closed and there are comments, let's leave a little note, shall we?
        if ( ! comments_open() && post_type_supports( get_post_type(), 'comments' ) && !is_page() ) :
    ?>
        <p class="nocomments"><?php esc_html_e( 'Comments are closed.', 'chained' ); ?></p>
    <?php endif;

    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );

    if (is_user_logged_in()) {
        $cur_user = wp_get_current_user();
        $comments_args = array(
            // change the title of send button=
            'title_reply'=> __('<span class="comment-number total">+</span> Leave a Comment', 'chained'),
            // remove "Text or HTML to be displayed after the set of comment fields"
            'comment_notes_before' => '',
            'comment_notes_after' => '',
            'fields' => apply_filters( 'chained_comment_form_default_fields', array(
                'author' => '<p class="comment-form-author" itemprop="name"><label for="author" class="show-on-ie8">'.__('Name', 'chained').'</label><input id="author" name="author" value="' . esc_attr( $commenter['comment_author'] ) . '" type="text" placeholder="'.esc_attr__('Name', 'chained').'..." size="30" ' .  $aria_req . ' /></p>',
                'email' => '<p class="comment-form-email"><label for="email" class="show-on-ie8">'.__('Email', 'chained').'</label><input id="email" name="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" type="text" placeholder="'.esc_attr__('your@email.com', 'chained').'..." '. $aria_req .' /></p>' ) ),
            'id_submit' => 'comment-submit',
            'label_submit' => __('Submit', 'chained'),
            // redefine your own textarea (the comment body)
            'comment_field' => '<p class="comment-form-comment"><label for="comment" class="show-on-ie8">'.__('Comment', 'chained').'</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="' . esc_attr__( 'Your thoughts..', 'chained' ) . '"></textarea></p>');
    } else {
        $comments_args = array(
        // change the title of send button
        'title_reply'=> __('<span class="comment-number total">+</span> Leave a Comment', 'chained'),
        // remove "Text or HTML to be displayed after the set of comment fields"
        'comment_notes_before' => '',
        'comment_notes_after' => '',
        'fields' => apply_filters( 'chained_comment_form_default_fields', array(
                'author' => '<p class="comment-form-author"><label for="author" class="show-on-ie8">'.__('Name', 'chained').'</label><input id="author" name="author" value="' . esc_attr( $commenter['comment_author'] ) . '" type="text" placeholder="'.esc_attr__('Name', 'chained').'..." size="30" ' .  $aria_req . ' /></p><!--',
                'email' => '--><p class="comment-form-email"><label for="name" class="show-on-ie8">'.__('Email', 'chained').'</label><input id="email" name="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" type="text" placeholder="'.esc_attr__('your@email.com', 'chained').'..." '. $aria_req .' /></p><!--',
                'url' => '--><p class="comment-form-url" itemprop="url"><label for="url" class="show-on-ie8">'.__('Url', 'chained').'</label><input id="url" name="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" placeholder="'.esc_attr__('Website', 'chained').'..." type="text"></p>') ),
        'id_submit' => 'comment-submit',
        'label_submit' => __('Submit', 'chained'),
        // redefine your own textarea (the comment body)
        'comment_field' => '<p class="comment-form-comment"><label for="comment" class="show-on-ie8">'.__('Comment', 'chained').'</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="' . esc_attr__( 'Type your first comment here...', 'chained' ) . '"></textarea></p>');
    }
    
    //if we have no comments than we don't a second title, one is enough
    if ( !have_comments() ){
        $comments_args['title_reply'] = '';
    }
    
    comment_form($comments_args); ?>