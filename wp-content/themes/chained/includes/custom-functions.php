<?php

/*-----------------------------------------------------------------------------------------------
	Custom Functions
------------------------------------------------------------------------------------------------- */
/**
 * Custom functions that act independently of the theme templates
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package chained
 */
/**
 * Adds custom classes to the array of body classes.
 *
 * @since chained 1.0.5
 * @param array $classes Classes for the body element.
 * @return array
 */
function chained_body_classes( $classes ) {
	global $wp_query;

	// Adds class to body when is no sticky header
	if ( true == get_theme_mod( 'chained_hide_sticky_header', false ) )
	{
		$classes[] = 'hide-sticky';
	}

	// Adds a class to body if the written by author for single post is hidden
	if ( get_theme_mod('chained_single_hide_written_by_author', false) ) {
		$classes[] = 'single-hide-written-by-author';
	}

	// Adds a class to body if the date for single post is hidden
	if ( get_theme_mod('chained_single_hide_post_date', false) ) {
		$classes[] = 'single-hide-publishing-info';
	}

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( ( is_single() || is_page() ) && is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'has_sidebar';
	}

	//add this class where we have the masonry layout
	if ( ! is_singular() ) {
		$classes[] = 'layout-grid';

		//add a.no-posts class when the loop is empty
		if ( ! $wp_query->posts ) {
			$classes[] = 'no-posts';
		}
	}

	if ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ) ) {
		$classes[] = 'infinite-scroll';
	}

	return $classes;
}

add_filter( 'body_class', 'chained_body_classes' );

/**
 * Extend the default WordPress post classes.
 *
 * @since chained 1.0
 *
 * @param array $classes A list of existing post class values.
 * @return array The filtered post class list.
 */
function chained_post_classes( $classes ) {

	if ( is_archive() || is_home() || is_search() ) {
		$classes[] = 'entry-card  js-masonry-item';
	}

	$classes[] = 'post-design-default';

	if ( has_post_thumbnail() ) {
		if ( 'standard' === get_post_format() ) {
			$classes[] = 'has-post-thumbnail';
		}
	}
	return $classes;
}
add_filter( 'post_class', 'chained_post_classes', 10, 1 );


/*-----------------------------------------------------------------------------------------------
	Chained Comments
	@package v1.0.0
------------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'chained_comment' ) ) :
	/**
	 * Display individual comment layout
	 *
	 * @since chained 1.0
	 */
	function chained_comment( $comment, $args, $depth ) {
		static $comment_number;

		if ( ! isset( $comment_number ) ) {
			$comment_number = $args['per_page'] * ( $args['page'] - 1 ) + 1;
		} else {
			$comment_number ++;
		}

		?>

	<li <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="comment-<?php comment_ID() ?>" class="comment-article  media">
			<span class="comment-number"><?php echo esc_html($comment_number); ?></span>

			<div class="media__body">
				<header class="comment__meta comment-author">
					<?php printf( '<span itemprop="creator" itemscope itemtype="http://schema.org/Person" class="comment__author-name">%s</span>', get_comment_author_link() ) ?>
					<time class="comment__time" itemprop="commentTime" datetime="<?php comment_time( 'c' ); ?>">
						<?php /* translators: %s: comment time */ ?>
						<a href="<?php echo esc_url( get_comment_link( get_comment_ID() ) ) ?>" class="comment__timestamp"><?php printf( esc_html__( 'on %1$s at %2$s', 'chained' ), esc_html(get_comment_date()), esc_html(get_comment_time())); ?> </a>
					</time>
					<div class="comment__links">
						<?php
						//we need some space before Edit
						edit_comment_link( esc_html_e( 'Edit', 'chained' ) );

						comment_reply_link( array_merge( $args, array(
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
						) ) );

						?>
					</div>
				</header>

				<!-- .comment-meta -->
				<?php if ( '0' == $comment->comment_approved ) : ?>
					<div class="alert info">
						<p><?php esc_html_e( 'Your comment is awaiting moderation.', 'chained' ) ?></p>
					</div>
					<?php echo 'test'; ?>
				<?php endif; ?>
				<section class="comment__content comment" itemprop="commentText">
					<?php comment_text() ?>
					<?php echo 'test'; ?>
				</section>
			</div>
		</article>
		<!-- </li> is added by WordPress automatically -->
	<?php
	} #function

endif;

/**
 * Filter comment_form_defaults to remove the notes after the comment form textarea.
 *
 * @since chained 1.0
 *
 * @param array $defaults
 * @return array
 */
function chained_comment_form_remove_notes_after( $defaults ) {
	$defaults['comment_notes_after'] = '';

	return $defaults;
}
add_filter( 'comment_form_defaults', 'chained_comment_form_remove_notes_after' );

/**
 * Filter wp_link_pages to wrap current page in span.
 *
 * @since chained 1.0
 *
 * @param string $link
 * @return string
 */
function chained_link_pages( $link ) {
	if ( is_numeric( $link ) ) {
		return '<span class="current">' . $link . '</span>';
	}

	return $link;
}
add_filter( 'wp_link_pages_link', 'chained_link_pages' );

/**
 * Wrap more link
 */
function chained_read_more_link( $link ) {
	return '<div class="more-link-wrapper">' . $link . '</div>';
}
add_filter( 'the_content_more_link', 'chained_read_more_link' );

/**
 * Constrain the excerpt length to 35 words - about a medium sized excerpt
 */
function chained_excerpt_length( $length ) {
	return 35;
}
add_filter( 'excerpt_length', 'chained_excerpt_length', 999 );

/**
 * Replace the suchainedit input with button in Search Form
 */
function chained_search_form( $form ) {
	$form = '<form role="search" method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
				<label>
					<span class="screen-reader-text">' . _x( 'Search for:', 'label' , 'chained' ) . '</span>
					<input type="search" class="search-field" placeholder="' . esc_attr_x( 'Type to start and press Enter to Search &hellip;', 'placeholder' , 'chained' ) . '" value="' . get_search_query() . '" name="s" title="' . esc_attr_x( 'Search for:', 'label' , 'chained' ) . '" />
				</label>
				<button class="search-offcanvas reset screen-reader-text">Submit</button>
			</form>';

	return $form;
}
add_filter( 'get_search_form', 'chained_search_form' );

/*
 * Due to the fact that we need a wrapper for center aligned images and for the ones with alignnone, we need to wrap the images without a caption
 * The images with captions already are wrapped by the figure tag
 */
function chained_wrap_images_in_figure( $content ) {
	$classes = array( 'aligncenter', 'alignnone' );

	foreach ( $classes as $class ) {

		//this regex basically tells this
		//match all the images that are not in captions and that have the X class
		//when an image is wrapped by an anchor tag, match that too
		$regex = '~\[caption[^\]]*\].*\[\/caption\]|((?:<a[^>]*>\s*)?<img.*class="[^"]*' . $class . '[^"]*[^>]*>(?:\s*<\/a>)?)~i';

		$callback = new chainedWrapImagesInFigureCallback( $class );

		// Replace the matches
		$content = preg_replace_callback(
			$regex,
			// in the callback function, if Group 1 is empty,
			// set the replacement to the whole match,
			// i.e. don't replace
			array( $callback, 'callback' ),
			$content );
	}

	return $content;
}
add_filter( 'the_content', 'chained_wrap_images_in_figure' );

//We need to use a class so we can pass the $class variable to the callback function
class chainedWrapImagesInFigureCallback {
	private $class;

	function __construct( $class ) {
		$this->class = $class;
	}

	public function callback( $match ) {
		if ( empty( $match[1] ) ) {
			return $match[0];
		}

		return '<span class="' . $this->class . '">' . $match[1] . '</span>';
	}
}

/**
 * This function was borrowed from CakePHP and adapted.
 * https://github.com/cakephp/cakephp/blob/53fdb18655119d4cca966d769b6c33f8eaaa8da0/src/Utility/Text.php
 *
 * Bellow is the copyright notice:
 *
 * ========================
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 *
 * ========================
 *
 * Truncates text.
 *
 * Cuts a string to the length of $length and replaces the last characters
 * with the ellipsis if the text is longer than length.
 *
 * ### Options:
 *
 * - `ellipsis` Will be used as ending and appended to the trimmed string
 * - `exact` If false, $text will not be cut mid-word
 * - `html` If true, HTML tags would be handled correctly
 *
 * @param string $text String to truncate.
 * @param int $length Length of returned string, including ellipsis.
 * @param array $options An array of HTML attributes and options.
 * @return string Trimmed string.
 * @link http://book.cakephp.org/3.0/en/core-libraries/string.html#truncating-text
 */
function chained_truncate($text, $length = 100, $options = array() ) {
	$default = array(
		'ellipsis' => apply_filters('chained_excerpt_more','\xe2\x80\xa6' ),
		'exact' => false,
		'html' => false,
	);

	if ( ! empty( $options['html'] ) && strtolower( mb_internal_encoding() ) === 'utf-8') {
		$default['ellipsis'] = "\xe2\x80\xa6";
	}
	$options = array_merge( $default, $options );
	extract($options);

	if ( true === $html ) {
		if ( mb_strlen( preg_replace( '/<.*?>/', '', $text ) ) <= $length) {
			return $text;
		}
		$totalLength = mb_strlen( strip_tags( $ellipsis ) );
		$openTags = array();
		$truncate = '';
		preg_match_all( '/(<\/?([\w+]+)[^>]*>)?([^<>]*)/', $text, $tags, PREG_SET_ORDER );
		foreach ( $tags as $tag ) {
			if ( ! preg_match( '/img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param/s', $tag[2] ) ) {
				if ( preg_match( '/<[\w]+[^>]*>/s', $tag[0] ) ) {
					array_unshift( $openTags, $tag[2] );
				} elseif ( preg_match( '/<\/([\w]+)[^>]*>/s', $tag[0], $closeTag ) ) {
					$pos = array_search( $closeTag[1], $openTags );
					if ( false !== $pos ) {
						array_splice( $openTags, $pos, 1 );
					}
				}
			}
			$truncate .= $tag[1];
			$contentLength = mb_strlen( preg_replace( '/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', ' ', $tag[3] ) );
			if ( $contentLength + $totalLength > $length ) {
				$left = $length - $totalLength;
				$entitiesLength = 0;
				if ( preg_match_all( '/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', $tag[3], $entities, PREG_OFFSET_CAPTURE ) ) {
					foreach ( $entities[0] as $entity ) {
						if ( $entity[1] + 1 - $entitiesLength <= $left ) {
							$left--;
							$entitiesLength += mb_strlen( $entity[0] );
						} else {
							break;
						}
					}
				}
				$truncate .= mb_substr( $tag[3], 0, $left + $entitiesLength );
				break;
			} else {
				$truncate .= $tag[3];
				$totalLength += $contentLength;
			}
			if ( $totalLength >= $length ) {
				break;
			}
		}
	} else {
		if ( mb_strlen( $text) <= $length ) {
			return $text;
		}
		$truncate = mb_substr( $text, 0, $length - mb_strlen( $ellipsis ) );
	}
	if ( false === $exact ) {
		$spacepos = mb_strrpos( $truncate, ' ' );
		if ( true === $html ) {
			$truncateCheck = mb_substr( $truncate, 0, $spacepos );
			$lastOpenTag = mb_strrpos( $truncateCheck, '<' );
			$lastCloseTag = mb_strrpos( $truncateCheck, '>' );
			if ( $lastOpenTag > $lastCloseTag ) {
				preg_match_all( '/<[\w]+[^>]*>/s', $truncate, $lastTagMatches );
				$lastTag = array_pop( $lastTagMatches[0] );
				$spacepos = mb_strrpos( $truncate, $lastTag ) + mb_strlen( $lastTag );
			}
			$bits = mb_substr( $truncate, $spacepos );
			preg_match_all( '/<\/([a-z]+)>/', $bits, $droppedTags, PREG_SET_ORDER );
			if ( ! empty( $droppedTags ) ) {
				if ( ! empty( $openTags ) ) {
					foreach ( $droppedTags as $closingTag ) {
						if ( ! in_array( $closingTag[1], $openTags ) ) {
							array_unshift( $openTags, $closingTag[1] );
						}
					}
				} else {
					foreach ( $droppedTags as $closingTag ) {
						$openTags[] = $closingTag[1];
					}
				}
			}
		}
		$truncate = mb_substr( $truncate, 0, $spacepos );
		// If truncate still empty, then we don't need to count ellipsis in the cut.
		if ( 0 === mb_strlen( $truncate ) ) {
			$truncate = mb_substr( $text, 0, $length );
		}
	}
	$truncate .= $ellipsis;
	if ( true === $html ) {
		foreach ( $openTags as $tag ) {
			$truncate .= '</' . $tag . '>';
		}
	}
	return $truncate;
}

/*-----------------------------------------------------------------------------------------------
	Add Classes to Linked Images
	@package v1.0.0
------------------------------------------------------------------------------------------------- */

function chained_add_classes_to_linked_images( $content ) {
	$classes = 'img-link'; // can do multiple classes, separate with space

	$patterns = array();
	$replacements = array();

	//first if it has class with single quotes
	$patterns[0] = '/<a([^>]*)class=\'([^\']*)\'([^>]*)>\s*<img([^>]*)>\s*<\/a>/'; // matches img tag wrapped in anchor tag where anchor has existing classes contained in single quotes
	$replacements[0] = '<a\1class="' . $classes . ' \2"\3><img\4></a>';

	//second if it has class with double quotes
	$patterns[1] = '/<a([^>]*)class="([^"]*)"([^>]*)>\s*<img([^>]*)>\s*<\/a>/'; // matches img tag wrapped in anchor tag where anchor has existing classes contained in double quotes
	$replacements[1] = '<a\1class="' . $classes . ' \2"\3><img\4></a>';

	//third no class attribute
	$patterns[2] = '/<a(?![^>]*class)([^>]*)>\s*<img([^>]*)>\s*<\/a>/'; // matches img tag wrapped in anchor tag where anchor tag where anchor has no existing classes
	$replacements[2] = '<a\1 class="' . $classes . '"><img\2></a>';

	//make sure that we respected the desired order of execution
	ksort($patterns);
	ksort($replacements);

	$content = preg_replace($patterns, $replacements, $content);

	return $content;
}
add_filter('the_content', 'chained_add_classes_to_linked_images', 99, 1);


/*-----------------------------------------------------------------------------------------------
	Post Loop Item Classes
	@package v1.0.0
------------------------------------------------------------------------------------------------- */

function chained_get_blog_class( $class = '' ) {

	$classes = array();

	$classes[] = 'masonry';

	// items per row
	$items_per_row = get_theme_mod( 'chained_masonry_num_of_cols', 4 );
	$items_per_row_at_desktop = min( max($items_per_row - 1, 1), 4);
	$items_per_row_at_tablet = min( max($items_per_row - 2, 1), 3);
	$items_per_row_class = "masonry--" . $items_per_row . "col-bighd  masonry--" . $items_per_row_at_desktop . "col-desktop  grid--" . $items_per_row_at_tablet . "col-tablet";

	$classes[] = $items_per_row_class;

	if ( ! empty( $class ) ) {
		if ( ! is_array( $class ) ) {
			$class = preg_split( '#\s+#', $class );
		}
		$classes = array_merge( $classes, $class );
	} else {
		// Ensure that we always coerce class to being an array.
		$class = array();
	}

	$classes = array_map( 'esc_attr', $classes );

	return join(' ', array_unique( $classes ) );
}

/**
 * Display the classes for the blog wrapper.
 *
 * @param string|array $class Optional. One or more classes to add to the class list.
 * @param string|array $location Optional. The place (template) where the classes are displayed. This is a hint for filters.
 */
function chained_blog_class( $class = '' ) {
	// Separates classes with a single space, collates classes
	echo 'class="' . esc_attr(chained_get_blog_class( $class )) . '"';
}


/**
 * Wrap embedded videos in a class, to fix responsive issues on issues
 */
function chained_wrap_embed_with_div($html, $url, $attr) {
	return '<div class="responsive-container">' . $html . '</div>';
}

add_filter('embed_oembed_html', 'chained_wrap_embed_with_div', 10, 3);

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $chained_content_width
 */
function chained_content_width() {
	$GLOBALS['chained_content_width'] = apply_filters( 'chained_content_width', 1600, 0 );
}
add_action( 'after_setup_theme', 'chained_content_width', 0 );

/*-----------------------------------------------------------------------------------------------
	Comment Layout
	@package v1.0.0
------------------------------------------------------------------------------------------------- */
function chained_comments($comment, $args, $depth) {
	static $comment_number;

	if (!isset($comment_number))
		$comment_number = $args['per_page'] * ($args['page'] - 1) + 1;
	else
		$comment_number++;
	?>
	<li <?php comment_class(); ?>>
	<article id="comment-<?php $comment->comment_ID; ?>" class="comment-article  media">
		<?php if ( false == get_theme_mod('chained_single_hide_comments_number', false) ): ?>
			<?php /* translators: comment number */ ?>
			<span class="comment-number"><?php echo esc_attr($comment_number); ?></span>
		<?php endif; ?>
		
		<div class="media__body">
			<header class="comment__meta comment-author">
				<?php if (get_theme_mod('chained_single_show_avatar', true) && get_comment_type($comment->comment_ID) == 'comment'): ?>
				<aside class="comment__avatar  media__img">
					<!-- custom gravatar call -->
					<?php
					$author_email = md5( strtolower( trim( get_comment_author_email() ) ) );

					if ( is_ssl() ) {
						$gravatar_url = 'https://secure.gravatar.com';
					} else {
						$gravatar_url = sprintf( "http://%d.gravatar.com", ( hexdec( $author_email[0] ) % 2 ) );
					}
					?>
					<img src="<?php echo esc_url($gravatar_url); ?>/avatar/<?php echo esc_attr($author_email); ?>?s=32" class="comment__avatar-image" height="32" width="32" />
				</aside>
				<?php endif; ?>
				<?php printf('<span class="comment__author-name">%s</span>', get_comment_author_link()) ?>
				<time class="comment__time" datetime="<?php comment_time('c'); ?>">
					<?php /* translators: %s: 1: Comment Date 2: Comment Time */ ?>
					<a href="<?php echo esc_attr( get_comment_link( $comment->comment_ID ) ) ?>" class="comment__timestamp"><?php printf(esc_html__('on %1$s at %2$s', 'chained'),esc_html(get_comment_date()),esc_html(get_comment_time())); ?> </a></time>
				<div class="comment__links">
					<?php
					edit_comment_link(esc_html__('Edit', 'chained'),'  ','');
					comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'])));
					?>
				</div>
			</header><!-- .comment-meta -->
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="alert info">
					<p><?php esc_html_e('Your comment is awaiting moderation.', 'chained') ?></p>
				</div>
			<?php endif; ?>
			<section class="comment__content comment">
				<?php comment_text() ?>
			</section>
		</div>
	</article>
	<!-- </li> is added by WordPress automatically -->
<?php
} 

/*-----------------------------------------------------------------------------------------------
	Posts Reading Time
	@package v1.0.0
------------------------------------------------------------------------------------------------- */
if (!function_exists('chained_count_content_words')) :
    /**
     * @param $content
     *
     * @return string
     */
    function chained_count_content_words($post_id)
    {
            $content = apply_filters('chained_the_content', get_post_field('post_content', $post_id));
            $read_words = 200;
            $decode_content = html_entity_decode($content);
            $filter_shortcode = do_shortcode($decode_content);
            $strip_tags = wp_strip_all_tags($filter_shortcode, true);
            $count = str_word_count($strip_tags);
            $word_per_min = (absint($count) / $read_words);
            $word_per_min = ceil($word_per_min);

           	if ( absint($word_per_min) > 0) {
                /* translators: reading estimate time  */
                $word_count_strings = sprintf(_n('%s minute  ', '%s minutes',number_format_i18n($word_per_min), 'chained'), number_format_i18n($word_per_min));
                if ('post' == get_post_type($post_id)):
                    echo '<span class="min-read">';
                    echo esc_html($word_count_strings);
                    echo '</span>';
                endif;
            }
            if ( absint($word_per_min) == Null) {
            	echo '<span class="min-read">';
                echo esc_html_e('0 min','chained');
                echo '</span>';
            }
    }
endif;


/*-----------------------------------------------------------------------------------------------
	Allowed HTML TAGS
	@package v1.0.1
------------------------------------------------------------------------------------------------- */

function chained_allowed_html() {

	$allowed_tags = array(
		'a' => array(
			'class' => array(),
			'href'  => array(),
			'rel'   => array(),
			'title' => array(),
		),
		'abbr' => array(
			'title' => array(),
		),
		'b' => array(),
		'blockquote' => array(
			'cite'  => array(),
		),
		'cite' => array(
			'title' => array(),
		),
		'code' => array(),
		'del' => array(
			'datetime' => array(),
			'title' => array(),
		),
		'dd' => array(),
		'div' => array(
			'class' => array(),
			'title' => array(),
			'style' => array(),
		),
		'dl' => array(),
		'dt' => array(),
		'em' => array(),
		'h1' => array(),
		'h2' => array(),
		'h3' => array(),
		'h4' => array(),
		'h5' => array(),
		'h6' => array(),
		'i' => array(),
		'img' => array(
			'alt'    => array(),
			'class'  => array(),
			'height' => array(),
			'src'    => array(),
			'width'  => array(),
		),
		'li' => array(
			'class' => array(),
		),
		'ol' => array(
			'class' => array(),
		),
		'p' => array(
			'class' => array(),
		),
		'q' => array(
			'cite' => array(),
			'title' => array(),
		),
		'span' => array(
			'class' => array(),
			'title' => array(),
			'style' => array(),
		),
		'strike' => array(),
		'strong' => array(),
		'ul' => array(
			'class' => array(),
		),
	);
	
	return $allowed_tags;
}