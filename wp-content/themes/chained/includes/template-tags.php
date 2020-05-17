<?php

/*-----------------------------------------------------------------------------------------------
	Chained Custom template 
	@package v1.0.5
------------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'chained_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function chained_posted_on() {

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s<span class="entry-time"> %3$s</span></time>';
       if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
           $time_string = '<time class="entry-date published" itemprop="datePublished"  datetime="%1$s">%2$s<span class="entry-time">%3$s</span></time>
           <time class="updated" itemprop="dateModified" datetime="%4$s">'.esc_html('updated on ', 'chained').'%5$s</time>';
       }

       $date_format = ''; //use the format set in Settings > General

       if ( ! is_single() ) {
           //on home and archives, due to the layout, we need a shorter date format so it won't jump on a second line
           $date_format = 'M j, Y';
       }

       $time_string = sprintf( $time_string,
               esc_attr( get_the_date( 'c' ) ),
               esc_html( get_the_date( $date_format ) ),
               esc_html( get_the_time() ),
               esc_attr( get_the_modified_date( 'c' ) ),
               esc_html( get_the_modified_date() )
       );

       $author_name = get_the_author();
       
       $single_author = sprintf(
       		  /* translators: written by post author */
               esc_html_x( 'written by %s', 'post author', 'chained' ),
               '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( $author_name ) . '</a>'
       );

       if ( false == get_theme_mod('chained_single_hide_written_by_author', false) ) {
       	
       	echo '<span class="single-author" itemprop="author" itemscope itemtype="https://schema.org/Person"> ' . wp_kses_post($single_author) . '
       		</span>';
       }

       if ( false == get_theme_mod('chained_single_hide_post_date', false) ) {
       	echo '<span class="posted-on"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . wp_kses_post($time_string) . '</a></span>';
       }
	} #function

endif;


if ( ! function_exists( 'chained_get_author_first_name' ) ) :
	/**
	 * Retrieve the author first name of the current post.
	 *
	 * @uses $authordata The current author's DB object.
	 *
	 * @return string The author's first name or display name if not defined.
	 */
	function chained_get_author_first_name() {
		global $authordata;

		if ( is_object( $authordata ) ) {
			if ( ! empty( $authordata->first_name ) ) {
				return $authordata->first_name;
			} else {
				return apply_filters( 'chained_the_author', $authordata->display_name );
			}
		}

		return '';
	}

endif;

if ( ! function_exists( 'chained_get_cats_list' ) ) :
	/**
	 * Returns HTML with comma separated category links
	 *
	 * @param int|WP_Post $post_ID Optional. Post ID or post object.
	 *
	 * @return string
	 */
	function chained_get_cats_list( $post_ID = null ) {

		//use the current post ID is none given
		if ( empty( $post_ID ) ) {
			$post_ID = get_the_ID();
		}

		//obviously pages don't have categories
		if ( 'page' == get_post_type( $post_ID ) ) {
			return '';
		}

		$cats = '';
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( ' ', '', $post_ID );
		if ( $categories_list && chained_categorized_blog() ) {
			$cats = '<div class="category-links" itemprop="about">' . $categories_list . '</div>';
		}

		return $cats;

	} #function

endif;

if ( ! function_exists( 'chained_cats_list' ) ) :
	/**
	 * Prints HTML with comma separated category links
	 *
	 * @param int|WP_Post $post_ID Optional. Post ID or post object.
	 */
	function chained_cats_list( $post_ID = null ) {

		echo wp_kses_post(chained_get_cats_list( $post_ID ));

	} #function
endif;

if ( ! function_exists( 'chained_get_post_format_link' ) ) :
	/**
	 * Returns HTML with the post format link
	 *
	 * @param int|WP_Post $post_ID Optional. Post ID or post object.
	 *
	 * @return string
	 */
	function chained_get_post_format_link( $post_ID = null ) {

		//use the current post ID is none given
		if ( empty( $post_ID ) ) {
			$post_ID = get_the_ID();
		}

		$post_format = get_post_format( $post_ID );

		if ( empty( $post_format ) || 'standard' == $post_format ) {
			return '';
		}

		return '<span class="entry-format">
				<a href="' . esc_url( get_post_format_link( $post_format ) ) .'" title="' . esc_attr(
				/* translators: 1: All posts, 2: Post Format */
				sprintf( esc_html_e( 'All %s Posts', 'chained' ), get_post_format_string( $post_format ) ) ) . '">' .
					get_post_format_string( $post_format ) .
				'</a>
			</span>';

	} #function

endif;

if ( ! function_exists( 'chained_post_format_link' ) ) :
	/**
	 * Prints HTML with the post format link
	 *
	 * @param int|WP_Post $post_ID Optional. Post ID or post object.
	 */
	function chained_post_format_link( $post_ID = null ) {

		echo wp_kses_post(chained_get_post_format_link( $post_ID ));

	} #function

endif;

/**
 * Prints HTML with the category of a certain post, with the most posts in it
 * The most important category of a post
 *
 * @param int|WP_Post $post_ID Optional. Post ID or post object.
 * @return string
 */
function chained_first_category( $post_ID = null ) {
	global $wp_rewrite;

	//use the current post ID is none given
	if ( empty( $post_ID ) ) {
		$post_ID = get_the_ID();
	}

	//obviously pages don't have categories
	if ( 'page' == get_post_type( $post_ID ) ) {
		return null;
	}

	//first get all categories ordered by count
	$all_categories = get_categories( array(
		'orderby' => 'count',
		'order' => 'DESC',
	) );

	//get the post's categories
	$categories = get_the_category( $post_ID );
	if ( empty( $categories ) ) {
		//get the default category instead
		$categories = array( get_the_category_by_ID( get_option( 'default_category' ) ) );
	}

	//now intersect them so that we are left with e descending ordered array of the post's categories
	$categories = array_uintersect( $all_categories, $categories, 'chained_compare_categories' );

	if ( ! empty ( $categories ) ) {
		$category = array_shift( $categories );
		$rel = ( is_object( $wp_rewrite ) && $wp_rewrite->using_permalinks() ) ? 'rel="category tag" class="accent-color"' : 'rel="category"';

		return '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" ' . $rel . '>' . $category->name . '</a>';
	}

	return null;
} #function

/*-----------------------------------------------------------------------------------------------
	Chained Categories
	@package v1.0.0
------------------------------------------------------------------------------------------------- */

function chained_card_categories( $post_id = NULL ) {
	$meta = array();

	$meta['category'] = chained_first_category();
	$meta['categories'] = chained_get_cats_list();

	$blog_items_category_on_listing_first 		= get_theme_mod( 'chained_masonry_blog_category_visibility_first', true);
	$blog_items_category_on_listing_all 		= get_theme_mod( 'chained_masonry_blog_category_visibility_all', false);

	if ( !empty($meta['category']) && $blog_items_category_on_listing_first == true && $blog_items_category_on_listing_all == false )  {
		echo '<div class="category-links"><span itemprop="about">' . wp_kses_post($meta[ 'category' ]) . '</span></div>';
	}

	if ( $blog_items_category_on_listing_all == true )  {
		echo wp_kses_post($meta['categories']);
	}
}

/*-----------------------------------------------------------------------------------------------
	Chained Meta Info
	@package v1.0.0
------------------------------------------------------------------------------------------------- */
function chained_card_meta ( $post_id = NULL ) {
	$meta = array();
	$meta['author'] = get_the_author();
	$meta['date'] = get_the_time( 'j F' );

	$comments_number = get_comments_number(); // get_comments_number() returns only a numeric value

	if ( comments_open() ) {
		if ( $comments_number == 0 ) {
			$comments = esc_html__( 'No Comments', 'chained' );
		} else {
			/* translators: 1: Comment, 2: Comments */
			$comments = sprintf( _n( '%d Comment', '%d Comments', $comments_number, 'chained' ), $comments_number );
		}
		$meta['comments'] = '<a href="' . esc_url( get_comments_link() ) .'">' . esc_html( $comments ) . '</a>';
	} else {
		$meta['comments'] = '';
	}

	$blog_items_author_visibility 				= get_theme_mod( 'chained_masonry_blog_author_visibility', true);
	$blog_items_date_visibility 				= get_theme_mod( 'chained_masonry_blog_date_visibility', true);
	$blog_items_comments_visibility 			= get_theme_mod( 'chained_masonry_blog_comments', true);

	echo '<div class="meta-information">';

	if ( $blog_items_author_visibility == true) {
		 echo '<span class="author">';
		echo wp_kses(get_template_part('assets/images/svg/author'), 'svg');
		echo esc_html($meta['author']);
		echo '</span>';
	}

	if ( $blog_items_date_visibility == true) {
		echo '<span class="date" itemprop="datePublished">';
		echo wp_kses(get_template_part('assets/images/svg/calendar'), 'svg');
		echo esc_html($meta['date']);
		echo '</span>';
	}

	if ( $blog_items_comments_visibility == true && comments_open() ) {
		echo '<span class="comments">';
		echo wp_kses(get_template_part('assets/images/svg/comments'), 'svg');
		echo wp_kses_post($meta['comments']);
		echo '</span>';
	}

	echo '</div>';

}

/*-----------------------------------------------------------------------------------------------
	Chained Compare Categories 
	@package v1.0.0
------------------------------------------------------------------------------------------------- */
function chained_compare_categories( $a1, $a2 ) {
	if ( $a1->term_id == $a2->term_id ) {
		return 0; //we are only interested by equality but PHP wants the whole thing
	}

	if ( $a1->term_id > $a2->term_id ) {
		return 1;
	}
	return -1;
}

/*-----------------------------------------------------------------------------------------------
	Entry Footer Edit Link
	@package v1.0.0
------------------------------------------------------------------------------------------------- */
if ( ! function_exists( 'chained_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for posts on archives.
	 */
	function chained_entry_footer() {
		edit_post_link( esc_html__( 'Edit', 'chained' ), '<span class="edit-link">', '</span>' );
	}
endif;

/*-----------------------------------------------------------------------------------------------
	Chained Single Entry Footer Edit Link 
	@package v1.0.0
------------------------------------------------------------------------------------------------- */
if ( ! function_exists( 'chained_single_entry_footer' ) ) :
	
	/**
	 * Prints HTML with meta information for the categories, tags, Jetpack likes, shares, related, and comments.
	 */
	function chained_single_entry_footer() {
		//only show tags and author bio for posts, not pages and what have you
		if ( 'post' == get_post_type() ) {

			$tags_list = get_the_tag_list( '', ' ' );
			if ( $tags_list ) {
				/* translators: There is a space at the end */
				echo '<span class="screen-reader-text">' . esc_html__( 'Tagged with: ', 'chained' ) . '</span><span class="tags-links" itemprop="about">' . 
				wp_kses_post($tags_list) . '</span>';
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( esc_html__( 'Leave a comment', 'chained' ), esc_html__( '1 Comment', 'chained' ), esc_html__( '% Comments', 'chained' ) );
			echo '</span>';
		}

		edit_post_link( esc_html__( 'Edit', 'chained' ), '<span class="edit-link">', '</span>' );
	} #function

endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function chained_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'chained_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );
		set_transient( 'chained_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so chained_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so chained_categorized_blog should return false.
		return false;
	}
} #function

/**
 * Flush out the transients used in chained_categorized_blog.
 */
function chained_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'chained_categories' );
}
add_action( 'edit_category', 'chained_category_transient_flusher' );
add_action( 'save_post',     'chained_category_transient_flusher' );

/**
 * Display the classes for the post title div.
 *
 * @param string|array $class One or more classes to add to the class list.
 * @param int|WP_Post $post_id Optional. Post ID or post object.
 */
function chained_post_title_class( $class = '', $post_id = null ) {
	// Separates classes with a single space, collates classes for post title
	echo 'class="' . esc_attr(chained_get_post_title_class( $class, $post_id )) . '"';
}

if ( ! function_exists( 'chained_get_post_title_class' ) ) :
	/**
	 * Retrieve the classes for the post title,
	 * depending on the length of the title
	 *
	 * @param string|array $class One or more classes to add to the class list.
	 * @return array Array of classes.
	 */
	function chained_get_post_title_class( $class = '', $post_id = null ) {

		$post = get_post( $post_id );

		$classes = array();

		if ( empty( $post ) ) {
			return $classes;
		}

		$classes[] = 'entry-header';

		// .entry-header--[short|medium|long] depending on the title length
		// 0-29 chars = short
		// 30-59 = medium
		// 60+ = long
		$title_length = mb_strlen( get_the_title( $post ) );

		if ( $title_length < 30 ) {
			$classes[] = 'entry-header--short';
		} elseif ( $title_length < 60 ) {
			$classes[] = 'entry-header--medium';
		} else {
			$classes[] = 'entry-header--long';
		}

		if ( ! empty($class) ) {
			if ( ! is_array( $class ) ) {
				$class = preg_split( '#\s+#', $class );
			}

			$classes = array_merge( $classes, $class );
		}

		$classes = array_map( 'esc_attr', $classes );

		/**
		 * Filter the list of CSS classes for the current post title.
		 *
		 * @param array  $classes An array of post classes.
		 * @param string $class   A comma-separated list of additional classes added to the post.
		 * @param int    $post_id The post ID.
		 */
		$classes = apply_filters( 'chained_post_title_class', $classes, $class, $post->ID );

		return  join( ' ', array_unique( $classes ) );
	} #function

endif;

/**
 * Display the classes for the post excerpt div.
 *
 * @param string|array $class One or more classes to add to the class list.
 * @param int|WP_Post $post_id Optional. Post ID or post object.
 */
function chained_post_excerpt_class( $class = '', $post_id = null ) {
	// Separates classes with a single space, collates classes for the post excerpt div
	echo 'class="' . esc_attr(chained_get_post_excerpt_class( $class, $post_id )) . '"';
}

if ( ! function_exists( 'chained_get_post_excerpt_class' ) ) :

	/**
	 * Retrieve the classes for the post excerpt,
	 * depending on the length of the excerpt
	 *
	 * @param string|array $class One or more classes to add to the class list.
	 * @return array Array of classes.
	 */
	function chained_get_post_excerpt_class( $class = '', $post_id = null ) {

		$post = get_post( $post_id );

		$classes = array();

		if ( empty( $post ) ) {
			return $classes;
		}

		$classes[] = 'entry-content';

		// .entry-title--[short|medium|long] depending on the title length
		// 0-99 chars = short
		// 100-199 = medium
		// 200+ = long
		$excerpt_length = mb_strlen( chained_get_post_excerpt( $post ) );

		if ( $excerpt_length < 99 ) {
			$classes[] = 'entry-content--short';
		} elseif ( $excerpt_length < 199 ) {
			$classes[] = 'entry-content--medium';
		} else {
			$classes[] = 'entry-content--long';
		}

		if ( ! empty( $class ) ) {
			if ( ! is_array( $class ) ) {
				$class = preg_split( '#\s+#', $class );
			}

			$classes = array_merge( $classes, $class );
		}

		$classes = array_map( 'esc_attr', $classes );

		/**
		 * Filter the list of CSS classes for the current post excerpt.
		 *
		 * @param array  $classes An array of post classes.
		 * @param string $class   A comma-separated list of additional classes added to the post.
		 * @param int    $post_id The post ID.
		 */
		$classes = apply_filters( 'chained_post_excerpt_class', $classes, $class, $post->ID );

		return join( ' ',array_unique( $classes ) );
	} #function

endif;

if ( ! function_exists( 'chained_get_custom_excerpt' ) ) :
	/**
	 * Generate a custom post excerpt suited to both latin alphabet languages and multibyte ones, like Chinese of Japanese
	 */
	function chained_get_custom_excerpt( $post_id = null ) {
		$post = get_post( $post_id );

		if ( empty( $post ) ) {
			return '';
		}
		//so we need to generate a custom excerpt
		//
		//the problem arises when we are dealing with multibyte characters
		//in this case we need to do a multibyte character length excerpt not the regular, number of words excerpt
		//but first we need to detect such a case

		//the excerpt returned by WordPress
		$excerpt = get_the_excerpt();
		//now we try to truncate the default excerpt with the length = number of words * 6 - the average word length in English
		$mb_excerpt = chained_truncate( $excerpt, ( apply_filters( 'chained_excerpt_length', 55 ) * 6 ) );

		//if the multibyte excerpt's length is smaller then the regular excerpt's length divided by 1.8 (this is a conservative number)
		//then it's quite clear that the default one is no good
		//else leave things like they used to work
		if ( mb_strlen( $mb_excerpt ) < mb_strlen( $excerpt ) / 1.8 ) {
			$excerpt = $mb_excerpt;
		}
		return $excerpt;
	}
endif;

if ( ! function_exists( 'chained_post_excerpt' ) ) :
	/**
	 * Display the post excerpt, either with the <!--more--> tag or regular excerpt
	 *
	 * @param int|WP_Post $id Optional. Post ID or post object.
	 * @return string The custom excerpt
	 */
	function chained_post_excerpt( $post_id = null ) {
		$post = get_post( $post_id );

		if ( empty( $post ) ) {
			return '';
		}

		// Check the content for the more text
		$has_more = strpos( $post->post_content, '<!--more' );

		//when we encounter a read more tag, we respect that and forget about doing anything automatic
		if ( $has_more ) {
			the_content( sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Continue reading %s', 'chained' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );
		} elseif ( has_excerpt( $post ) ) {
			//in case of a manual excerpt we will go forth as planned - no processing
			the_excerpt();
		} else {
			//need custom generated excerpt
			echo esc_html(apply_filters('chained_excerpt_length', chained_get_custom_excerpt( $post )) );
		}
	} #function
endif;

/**
 * Get the post excerpt, either with the <!--more--> tag or regular excerpt
 *
 * @param int|WP_Post $post_id Optional. Post ID or post object.
 * @return string The post excerpt.
 */
function chained_get_post_excerpt( $post_id = null ) {
	$post = get_post( $post_id );

	$excerpt = '';

	if ( empty( $post ) ) {
		return $excerpt;
	}
	// Check the content for the more text
	$has_more = strpos( $post->post_content, '<!--more' );

	if ( $has_more ) {
		$excerpt = get_the_content( sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Continue reading %s', 'chained' ),
			the_title( '<span class="screen-reader-text">', '</span>', false )
		) );
	} else {
		$excerpt = chained_get_custom_excerpt( $post );
	}

	return $excerpt;
} #function


if ( ! function_exists( 'chained_secondary_page_title' ) ) :
	/**
	 * Display the markup for the archive or search pages title.
	 */
	function chained_the_secondary_page_title() {

		if ( is_archive() || is_search() ) { ?>

			<div class="masonry-panel">
				<?php if ( is_archive() ) : ?>
					<div class="page-header entry-card">
						<header class="entry-header">
						<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>

						<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
						</header>
					</div><!-- .page-header -->
				<?php elseif ( is_search() ) : ?>
					<header class="page-header entry-card">
						<h1 class="page-title"><?php printf( 
							/* translators: Search Results */
							esc_html__( 'Search Results for: %s', 'chained' ), get_search_query() ); ?></h1>
					</header><!-- .page-header -->
				<?php endif; ?>
			</div><!-- .grid__item -->
		<?php }
	} #function
endif;

/*-----------------------------------------------------------------------------------------------
	Get Post First Link - For link post format
	@package v1.0.0
------------------------------------------------------------------------------------------------- */
if ( ! function_exists( 'chained_get_post_first_link' ) ) :

	/**
	 * Returns the URL to use for the link post format.
	 * First it tries to get the first URL in the content; if not found it uses the permalink instead
	 *
	 * @return string URL
	 */
	function chained_get_post_first_link() {
		$has_url = get_url_in_content( get_the_content() );

		return ( $has_url ) ? $has_url : apply_filters( 'chained_the_permalink', get_permalink() );
	}

endif;

if ( ! function_exists( 'chained_paging_nav' ) ) :
	/**
	 * Display navigation to next/previous set of posts when applicable.
	 */
	function chained_paging_nav() {
		global $wp_query, $wp_rewrite;
		// Don't print empty markup if there's only one page.
		if ( $wp_query->max_num_pages < 2 ) {
			return;
		}
		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );

		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}
		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

		$format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%'; ?>

		<nav class="pagination" role="navigation">
			<h1 class="screen-reader-text"><?php esc_html__( 'Posts navigation', 'chained' ); ?></h1>

			<div class="nav-links">

				<?php
				//output a disabled previous "link" if on the fist page
				if ( 1 == $paged ) {
					echo '<span class="prev page-numbers disabled">' . esc_html__( 'Previous', 'chained' ) . '</span>';
				}

				//output the numbered page links
				echo wp_kses_post(paginate_links( array(
					'base'      => $pagenum_link,
					'format'    => $format,
					'total'     => $wp_query->max_num_pages,
					'current'   => $paged,
					'prev_next' => true,
					'prev_text' => __( 'Previous', 'chained' ),
					'next_text' => __( 'Next', 'chained' ),
					'add_args'  => array_map( 'urlencode', $query_args ),
				) ));

				//output a disabled next "link" if on the last page
				if ( $paged == $wp_query->max_num_pages ) {
					echo '<span class="next page-numbers disabled">' . esc_html_e( 'Next', 'chained' ) . '</span>';
				} ?>

			</div><!-- .nav-links -->

		</nav><!-- .navigation -->
	<?php
	} #function

endif;

/**
 * Handles the output of the media for audio attachment posts. This should be used within The Loop.
 *
 * @return string
 */
function chained_audio_attachment() {
	return hybrid_media_grabber( array( 'type' => 'audio', 'split_media' => true ) );
}
/**
 * Handles the output of the media for video attachment posts. This should be used within The Loop.
 *
 * @return string
 */
function chained_video_attachment() {
	return hybrid_media_grabber( array( 'type' => 'video', 'split_media' => true ) );
}

if ( ! function_exists( 'chained_footer_the_copyright' ) ) {
	/**
	 * Display the footer copyright.
	 */
	function chained_footer_the_copyright() {
		$copyright_text = chained_footer_get_copyright_content();
		$output         = '';
		$output        .= '<div class="site-info c-footer__copyright-text">' . PHP_EOL;
		$output        .= '<span class="copyright-message">' .$copyright_text .'</span>' . PHP_EOL;
		$credit_by 	    =  esc_html('Theme Chained by', 'chained');
		$credit_name    =  esc_html('AncientCoders', 'chained'); 
		$credit_by_link =  esc_html('https://ancientcoders.com/chained-lite', 'chained'); 
		
		$output .= '<span class="c-footer__credits">';
		$output .= $credit_by;
		$output .= '<a target="_blank" href=" ' .$credit_by_link.' ">';
		$output .= ' ' . $credit_name;
		$output .= '</a>';
		
		$output .= '</div>';
		
		echo wp_kses_post(apply_filters( 'chained_footer_the_copyright', $output ));
	}
}

if ( ! function_exists( 'chained_footer_get_copyright_content' ) ) {
	/**
	 *
	 * @return bool|string
	 */
	function chained_footer_get_copyright_content() {
		$copyright_text = get_theme_mod( 'chained_footer_copyright', esc_html__( '&copy; 2020 All rights reserved.', 'chained' ) );

		return $copyright_text;
	}
}