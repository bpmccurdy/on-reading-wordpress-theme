<?php
/**
 * On Reading functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package On_Reading
 */




add_action('customize_register','my_customize_register');
function my_customize_register( $wp_customize ) {
$wp_customize->add_setting( 'accent_color', array(
  'default' => '#f72525',
  'sanitize_callback' => 'sanitize_hex_color',
) );
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize, // WP_Customize_Manager
    'accent_color', // Setting id
    array( // Args, including any custom ones.
      'label' => __( 'Accent Color' ),
      'section' => 'colors',
    )
  )
);
}

if ( ! defined( 'ON_READING_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'ON_READING_VERSION', '1.0.0' );
}

if ( ! function_exists( 'on_reading_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function on_reading_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on On Reading, use a find and replace
		 * to change 'on-reading' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'on-reading', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'on-reading' ),
				'secondary' => esc_html__( 'Secondary', 'on-reading' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'on_reading_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);
		
		add_theme_support(
			'custom-header',
			array(
    			'default-image'          => '',
				'default-text-color'     => '000000',
				'random-default'         => false,
				'width'                  => 100,
				'height'                 => 100,
				'flex-height'            => true,
				'flex-width'             => true,
				'header-text'            => true,
				'uploads'                => true,
				'wp-head-callback'       => '',
				'admin-head-callback'    => '',
				'admin-preview-callback' => '',
				'video'                  => false,
				'video-active-callback'  => 'is_front_page',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
		
		
		
		
	}
endif;
add_action( 'after_setup_theme', 'on_reading_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function on_reading_content_width() {
// 	$GLOBALS['content_width'] = apply_filters( 'on_reading_content_width', 640 );
}
add_action( 'after_setup_theme', 'on_reading_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function on_reading_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'on-reading' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'on-reading' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'on_reading_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function on_reading_scripts() {
// 	wp_enqueue_style ('on-reading-theme-fonts', 'https://fonts.googleapis.com/css2?family=Alegreya+SC&family=Norican&display=swap', array(), ON_READING_VERSION);
	
	wp_enqueue_style( 'bootstrap-style', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css', array(), ON_READING_VERSION);
	
	wp_enqueue_script( 'bootstrap-script', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js', array('jquery'), ON_READING_VERSION, true);
	
	wp_enqueue_style( 'on-reading-style', get_stylesheet_uri(), array(), ON_READING_VERSION );
	
	
	
	wp_style_add_data( 'on-reading-style', 'rtl', 'replace' );

	wp_enqueue_script( 'on-reading-navigation', get_template_directory_uri() . '/script.js', array('bootstrap-script'), ON_READING_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'on_reading_scripts' );



/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package On_Reading
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function on_reading_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'on_reading_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function on_reading_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'on_reading_pingback_header' );









/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package On_Reading
 */

if ( ! function_exists( 'on_reading_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function on_reading_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'on-reading' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'on_reading_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function on_reading_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'on-reading' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'on_reading_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function on_reading_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'on-reading' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'on-reading' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'on-reading' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'on-reading' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'on-reading' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'on-reading' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'on_reading_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function on_reading_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid w-100', 'title' => 'Feature image']); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid w-100', 'title' => 'Feature image']); ?>
				<?php
// 					the_post_thumbnail(
// 						'post-thumbnail',
// 						array(
// 							'alt' => the_title_attribute(
// 								array(
// 									'echo' => false,
// 								)
// 							),
// 						)
// 					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

















if ( ! class_exists( 'WP_Bootstrap_Navwalker' ) ) :
	/**
	 * WP_Bootstrap_Navwalker class.
	 */
	class WP_Bootstrap_Navwalker extends Walker_Nav_Menu {

		/**
		 * Whether the items_wrap contains schema microdata or not.
		 *
		 * @since 4.2.0
		 * @var boolean
		 */
		private $has_schema = false;

		/**
		 * Ensure the items_wrap argument contains microdata.
		 *
		 * @since 4.2.0
		 */
		public function __construct() {
			if ( ! has_filter( 'wp_nav_menu_args', array( $this, 'add_schema_to_navbar_ul' ) ) ) {
				add_filter( 'wp_nav_menu_args', array( $this, 'add_schema_to_navbar_ul' ) );
			}
		}

		/**
		 * Starts the list before the elements are added.
		 *
		 * @since WP 3.0.0
		 *
		 * @see Walker_Nav_Menu::start_lvl()
		 *
		 * @param string           $output Used to append additional content (passed by reference).
		 * @param int              $depth  Depth of menu item. Used for padding.
		 * @param WP_Nav_Menu_Args $args   An object of wp_nav_menu() arguments.
		 */
		public function start_lvl( &$output, $depth = 0, $args = null ) {
			if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
				$t = '';
				$n = '';
			} else {
				$t = "\t";
				$n = "\n";
			}
			$indent = str_repeat( $t, $depth );
			// Default class to add to the file.
			$classes = array( 'dropdown-menu' );
			/**
			 * Filters the CSS class(es) applied to a menu list element.
			 *
			 * @since WP 4.8.0
			 *
			 * @param array    $classes The CSS classes that are applied to the menu `<ul>` element.
			 * @param stdClass $args    An object of `wp_nav_menu()` arguments.
			 * @param int      $depth   Depth of menu item. Used for padding.
			 */
			$class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			/*
			 * The `.dropdown-menu` container needs to have a labelledby
			 * attribute which points to it's trigger link.
			 *
			 * Form a string for the labelledby attribute from the the latest
			 * link with an id that was added to the $output.
			 */
			$labelledby = '';
			// Find all links with an id in the output.
			preg_match_all( '/(<a.*?id=\"|\')(.*?)\"|\'.*?>/im', $output, $matches );
			// With pointer at end of array check if we got an ID match.
			if ( end( $matches[2] ) ) {
				// Build a string to use as aria-labelledby.
				$labelledby = 'aria-labelledby="' . esc_attr( end( $matches[2] ) ) . '"';
			}
			$output .= "{$n}{$indent}<ul$class_names $labelledby>{$n}";
		}

		/**
		 * Starts the element output.
		 *
		 * @since WP 3.0.0
		 * @since WP 4.4.0 The {@see 'nav_menu_item_args'} filter was added.
		 *
		 * @see Walker_Nav_Menu::start_el()
		 *
		 * @param string           $output Used to append additional content (passed by reference).
		 * @param WP_Nav_Menu_Item $item   Menu item data object.
		 * @param int              $depth  Depth of menu item. Used for padding.
		 * @param WP_Nav_Menu_Args $args   An object of wp_nav_menu() arguments.
		 * @param int              $id     Current item ID.
		 */
		public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
			if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
				$t = '';
				$n = '';
			} else {
				$t = "\t";
				$n = "\n";
			}
			$indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

			if ( false !== strpos( $args->items_wrap, 'itemscope' ) && false === $this->has_schema ) {
				$this->has_schema  = true;
				$args->link_before = '<span itemprop="name">' . $args->link_before;
				$args->link_after .= '</span>';
			}

			$classes = empty( $item->classes ) ? array() : (array) $item->classes;

			// Updating the CSS classes of a menu item in the WordPress Customizer preview results in all classes defined
			// in that particular input box to come in as one big class string.
			$split_on_spaces = function ( $class ) {
				return preg_split( '/\s+/', $class );
			};
			$classes         = $this->flatten( array_map( $split_on_spaces, $classes ) );

			/*
			 * Initialize some holder variables to store specially handled item
			 * wrappers and icons.
			 */
			$linkmod_classes = array();
			$icon_classes    = array();

			/*
			 * Get an updated $classes array without linkmod or icon classes.
			 *
			 * NOTE: linkmod and icon class arrays are passed by reference and
			 * are maybe modified before being used later in this function.
			 */
			$classes = self::separate_linkmods_and_icons_from_classes( $classes, $linkmod_classes, $icon_classes, $depth );

			// Join any icon classes plucked from $classes into a string.
			$icon_class_string = join( ' ', $icon_classes );

			/**
			 * Filters the arguments for a single nav menu item.
			 *
			 * @since WP 4.4.0
			 *
			 * @param WP_Nav_Menu_Args $args  An object of wp_nav_menu() arguments.
			 * @param WP_Nav_Menu_Item $item  Menu item data object.
			 * @param int              $depth Depth of menu item. Used for padding.
			 *
			 * @var WP_Nav_Menu_Args
			 */
			$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

			// Add .dropdown or .active classes where they are needed.
			if ( $this->has_children ) {
				$classes[] = 'dropdown';
			}
			if ( in_array( 'current-menu-item', $classes, true ) || in_array( 'current-menu-parent', $classes, true ) ) {
				$classes[] = 'active';
			}

			// Add some additional default classes to the item.
			$classes[] = 'menu-item-' . $item->ID;
			$classes[] = 'nav-item';

			// Allow filtering the classes.
			$classes = apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth );

			// Form a string of classes in format: class="class_names".
			$class_names = join( ' ', $classes );
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			/**
			 * Filters the ID applied to a menu item's list item element.
			 *
			 * @since WP 3.0.1
			 * @since WP 4.1.0 The `$depth` parameter was added.
			 *
			 * @param string           $menu_id The ID that is applied to the menu item's `<li>` element.
			 * @param WP_Nav_Menu_Item $item    The current menu item.
			 * @param WP_Nav_Menu_Args $args    An object of wp_nav_menu() arguments.
			 * @param int              $depth   Depth of menu item. Used for padding.
			 */
			$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

			$output .= $indent . '<li ' . $id . $class_names . '>';

			// Initialize array for holding the $atts for the link item.
			$atts           = array();
			$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
			$atts['target'] = ! empty( $item->target ) ? $item->target : '';
			if ( '_blank' === $item->target && empty( $item->xfn ) ) {
				$atts['rel'] = 'noopener noreferrer';
			} else {
				$atts['rel'] = ! empty( $item->xfn ) ? $item->xfn : '';
			}

			// If the item has_children add atts to <a>.
			if ( $this->has_children && 0 === $depth ) {
				$atts['href']          = '#';
				$atts['data-toggle']   = 'dropdown';
				$atts['aria-haspopup'] = 'true';
				$atts['aria-expanded'] = 'false';
				$atts['class']         = 'dropdown-toggle nav-link';
				$atts['id']            = 'menu-item-dropdown-' . $item->ID;
			} else {
				if ( true === $this->has_schema ) {
					$atts['itemprop'] = 'url';
				}

				$atts['href'] = ! empty( $item->url ) ? $item->url : '#';
				// For items in dropdowns use .dropdown-item instead of .nav-link.
				if ( $depth > 0 ) {
					$atts['class'] = 'dropdown-item';
				} else {
					$atts['class'] = 'nav-link';
				}
			}

			$atts['aria-current'] = $item->current ? 'page' : '';

			// Update atts of this item based on any custom linkmod classes.
			$atts = self::update_atts_for_linkmod_type( $atts, $linkmod_classes );

			// Allow filtering of the $atts array before using it.
			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

			// Build a string of html containing all the atts for the item.
			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}

			// Set a typeflag to easily test if this is a linkmod or not.
			$linkmod_type = self::get_linkmod_type( $linkmod_classes );

			// START appending the internal item contents to the output.
			$item_output = isset( $args->before ) ? $args->before : '';

			/*
			 * This is the start of the internal nav item. Depending on what
			 * kind of linkmod we have we may need different wrapper elements.
			 */
			if ( '' !== $linkmod_type ) {
				// Is linkmod, output the required element opener.
				$item_output .= self::linkmod_element_open( $linkmod_type, $attributes );
			} else {
				// With no link mod type set this must be a standard <a> tag.
				$item_output .= '<a' . $attributes . '>';
			}

			/*
			 * Initiate empty icon var, then if we have a string containing any
			 * icon classes form the icon markup with an <i> element. This is
			 * output inside of the item before the $title (the link text).
			 */
			$icon_html = '';
			if ( ! empty( $icon_class_string ) ) {
				// Append an <i> with the icon classes to what is output before links.
				$icon_html = '<i class="' . esc_attr( $icon_class_string ) . '" aria-hidden="true"></i> ';
			}

			/** This filter is documented in wp-includes/post-template.php */
			$title = apply_filters( 'the_title', $item->title, $item->ID );

			/**
			 * Filters a menu item's title.
			 *
			 * @since WP 4.4.0
			 *
			 * @param string           $title The menu item's title.
			 * @param WP_Nav_Menu_Item $item  The current menu item.
			 * @param WP_Nav_Menu_Args $args  An object of wp_nav_menu() arguments.
			 * @param int              $depth Depth of menu item. Used for padding.
			 */
			$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

			// If the .sr-only class was set apply to the nav items text only.
			if ( in_array( 'sr-only', $linkmod_classes, true ) ) {
				$title         = self::wrap_for_screen_reader( $title );
				$keys_to_unset = array_keys( $linkmod_classes, 'sr-only', true );
				foreach ( $keys_to_unset as $k ) {
					unset( $linkmod_classes[ $k ] );
				}
			}

			// Put the item contents into $output.
			$item_output .= isset( $args->link_before ) ? $args->link_before . $icon_html . $title . $args->link_after : '';

			/*
			 * This is the end of the internal nav item. We need to close the
			 * correct element depending on the type of link or link mod.
			 */
			if ( '' !== $linkmod_type ) {
				// Is linkmod, output the required closing element.
				$item_output .= self::linkmod_element_close( $linkmod_type );
			} else {
				// With no link mod type set this must be a standard <a> tag.
				$item_output .= '</a>';
			}

			$item_output .= isset( $args->after ) ? $args->after : '';

			// END appending the internal item contents to the output.
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}

		/**
		 * Menu fallback.
		 *
		 * If this function is assigned to the wp_nav_menu's fallback_cb variable
		 * and a menu has not been assigned to the theme location in the WordPress
		 * menu manager the function will display nothing to a non-logged in user,
		 * and will add a link to the WordPress menu manager if logged in as an admin.
		 *
		 * @param array $args passed from the wp_nav_menu function.
		 * @return string|void String when echo is false.
		 */
		public static function fallback( $args ) {
			if ( ! current_user_can( 'edit_theme_options' ) ) {
				return;
			}

			// Initialize var to store fallback html.
			$fallback_output = '';

			// Menu container opening tag.
			$show_container = false;
			if ( $args['container'] ) {
				/**
				 * Filters the list of HTML tags that are valid for use as menu containers.
				 *
				 * @since WP 3.0.0
				 *
				 * @param array $tags The acceptable HTML tags for use as menu containers.
				 *                    Default is array containing 'div' and 'nav'.
				 */
				$allowed_tags = apply_filters( 'wp_nav_menu_container_allowedtags', array( 'div', 'nav' ) );
				if ( is_string( $args['container'] ) && in_array( $args['container'], $allowed_tags, true ) ) {
					$show_container   = true;
					$class            = $args['container_class'] ? ' class="menu-fallback-container ' . esc_attr( $args['container_class'] ) . '"' : ' class="menu-fallback-container"';
					$id               = $args['container_id'] ? ' id="' . esc_attr( $args['container_id'] ) . '"' : '';
					$fallback_output .= '<' . $args['container'] . $id . $class . '>';
				}
			}

			// The fallback menu.
			$class            = $args['menu_class'] ? ' class="menu-fallback-menu ' . esc_attr( $args['menu_class'] ) . '"' : ' class="menu-fallback-menu"';
			$id               = $args['menu_id'] ? ' id="' . esc_attr( $args['menu_id'] ) . '"' : '';
			$fallback_output .= '<ul' . $id . $class . '>';
			$fallback_output .= '<li class="nav-item"><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '" class="nav-link" title="' . esc_attr__( 'Add a menu', 'wp-bootstrap-navwalker' ) . '">' . esc_html__( 'Add a menu', 'wp-bootstrap-navwalker' ) . '</a></li>';
			$fallback_output .= '</ul>';

			// Menu container closing tag.
			if ( $show_container ) {
				$fallback_output .= '</' . $args['container'] . '>';
			}

			// if $args has 'echo' key and it's true echo, otherwise return.
			if ( array_key_exists( 'echo', $args ) && $args['echo'] ) {
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $fallback_output;
			} else {
				return $fallback_output;
			}
		}

		/**
		 * Filter to ensure the items_Wrap argument contains microdata.
		 *
		 * @since 4.2.0
		 *
		 * @param  array $args The nav instance arguments.
		 * @return array $args The altered nav instance arguments.
		 */
		public function add_schema_to_navbar_ul( $args ) {
			$wrap = $args['items_wrap'];
			if ( strpos( $wrap, 'SiteNavigationElement' ) === false ) {
				$args['items_wrap'] = preg_replace( '/(>).*>?\%3\$s/', ' itemscope itemtype="http://www.schema.org/SiteNavigationElement"$0', $wrap );
			}

			return $args;
		}

		/**
		 * Find any custom linkmod or icon classes and store in their holder
		 * arrays then remove them from the main classes array.
		 *
		 * Supported linkmods: .disabled, .dropdown-header, .dropdown-divider, .sr-only
		 * Supported iconsets: Font Awesome 4/5, Glypicons
		 *
		 * NOTE: This accepts the linkmod and icon arrays by reference.
		 *
		 * @since 4.0.0
		 *
		 * @param array   $classes         an array of classes currently assigned to the item.
		 * @param array   $linkmod_classes an array to hold linkmod classes.
		 * @param array   $icon_classes    an array to hold icon classes.
		 * @param integer $depth           an integer holding current depth level.
		 *
		 * @return array  $classes         a maybe modified array of classnames.
		 */
		private function separate_linkmods_and_icons_from_classes( $classes, &$linkmod_classes, &$icon_classes, $depth ) {
			// Loop through $classes array to find linkmod or icon classes.
			foreach ( $classes as $key => $class ) {
				/*
				 * If any special classes are found, store the class in it's
				 * holder array and and unset the item from $classes.
				 */
				if ( preg_match( '/^disabled|^sr-only/i', $class ) ) {
					// Test for .disabled or .sr-only classes.
					$linkmod_classes[] = $class;
					unset( $classes[ $key ] );
				} elseif ( preg_match( '/^dropdown-header|^dropdown-divider|^dropdown-item-text/i', $class ) && $depth > 0 ) {
					/*
					 * Test for .dropdown-header or .dropdown-divider and a
					 * depth greater than 0 - IE inside a dropdown.
					 */
					$linkmod_classes[] = $class;
					unset( $classes[ $key ] );
				} elseif ( preg_match( '/^fa-(\S*)?|^fa(s|r|l|b)?(\s?)?$/i', $class ) ) {
					// Font Awesome.
					$icon_classes[] = $class;
					unset( $classes[ $key ] );
				} elseif ( preg_match( '/^glyphicon-(\S*)?|^glyphicon(\s?)$/i', $class ) ) {
					// Glyphicons.
					$icon_classes[] = $class;
					unset( $classes[ $key ] );
				}
			}

			return $classes;
		}

		/**
		 * Return a string containing a linkmod type and update $atts array
		 * accordingly depending on the decided.
		 *
		 * @since 4.0.0
		 *
		 * @param array $linkmod_classes array of any link modifier classes.
		 *
		 * @return string                empty for default, a linkmod type string otherwise.
		 */
		private function get_linkmod_type( $linkmod_classes = array() ) {
			$linkmod_type = '';
			// Loop through array of linkmod classes to handle their $atts.
			if ( ! empty( $linkmod_classes ) ) {
				foreach ( $linkmod_classes as $link_class ) {
					if ( ! empty( $link_class ) ) {

						// Check for special class types and set a flag for them.
						if ( 'dropdown-header' === $link_class ) {
							$linkmod_type = 'dropdown-header';
						} elseif ( 'dropdown-divider' === $link_class ) {
							$linkmod_type = 'dropdown-divider';
						} elseif ( 'dropdown-item-text' === $link_class ) {
							$linkmod_type = 'dropdown-item-text';
						}
					}
				}
			}
			return $linkmod_type;
		}

		/**
		 * Update the attributes of a nav item depending on the limkmod classes.
		 *
		 * @since 4.0.0
		 *
		 * @param array $atts            array of atts for the current link in nav item.
		 * @param array $linkmod_classes an array of classes that modify link or nav item behaviors or displays.
		 *
		 * @return array                 maybe updated array of attributes for item.
		 */
		private function update_atts_for_linkmod_type( $atts = array(), $linkmod_classes = array() ) {
			if ( ! empty( $linkmod_classes ) ) {
				foreach ( $linkmod_classes as $link_class ) {
					if ( ! empty( $link_class ) ) {
						/*
						 * Update $atts with a space and the extra classname
						 * so long as it's not a sr-only class.
						 */
						if ( 'sr-only' !== $link_class ) {
							$atts['class'] .= ' ' . esc_attr( $link_class );
						}
						// Check for special class types we need additional handling for.
						if ( 'disabled' === $link_class ) {
							// Convert link to '#' and unset open targets.
							$atts['href'] = '#';
							unset( $atts['target'] );
						} elseif ( 'dropdown-header' === $link_class || 'dropdown-divider' === $link_class || 'dropdown-item-text' === $link_class ) {
							// Store a type flag and unset href and target.
							unset( $atts['href'] );
							unset( $atts['target'] );
						}
					}
				}
			}
			return $atts;
		}

		/**
		 * Wraps the passed text in a screen reader only class.
		 *
		 * @since 4.0.0
		 *
		 * @param string $text the string of text to be wrapped in a screen reader class.
		 * @return string      the string wrapped in a span with the class.
		 */
		private function wrap_for_screen_reader( $text = '' ) {
			if ( $text ) {
				$text = '<span class="sr-only">' . $text . '</span>';
			}
			return $text;
		}

		/**
		 * Returns the correct opening element and attributes for a linkmod.
		 *
		 * @since 4.0.0
		 *
		 * @param string $linkmod_type a sting containing a linkmod type flag.
		 * @param string $attributes   a string of attributes to add to the element.
		 *
		 * @return string              a string with the openign tag for the element with attribibutes added.
		 */
		private function linkmod_element_open( $linkmod_type, $attributes = '' ) {
			$output = '';
			if ( 'dropdown-item-text' === $linkmod_type ) {
				$output .= '<span class="dropdown-item-text"' . $attributes . '>';
			} elseif ( 'dropdown-header' === $linkmod_type ) {
				/*
				 * For a header use a span with the .h6 class instead of a real
				 * header tag so that it doesn't confuse screen readers.
				 */
				$output .= '<span class="dropdown-header h6"' . $attributes . '>';
			} elseif ( 'dropdown-divider' === $linkmod_type ) {
				// This is a divider.
				$output .= '<div class="dropdown-divider"' . $attributes . '>';
			}
			return $output;
		}

		/**
		 * Return the correct closing tag for the linkmod element.
		 *
		 * @since 4.0.0
		 *
		 * @param string $linkmod_type a string containing a special linkmod type.
		 *
		 * @return string              a string with the closing tag for this linkmod type.
		 */
		private function linkmod_element_close( $linkmod_type ) {
			$output = '';
			if ( 'dropdown-header' === $linkmod_type || 'dropdown-item-text' === $linkmod_type ) {
				/*
				 * For a header use a span with the .h6 class instead of a real
				 * header tag so that it doesn't confuse screen readers.
				 */
				$output .= '</span>';
			} elseif ( 'dropdown-divider' === $linkmod_type ) {
				// This is a divider.
				$output .= '</div>';
			}
			return $output;
		}

		/**
		 * Flattens a multidimensional array to a simple array.
		 *
		 * @param array $array a multidimensional array.
		 *
		 * @return array a simple array
		 */
		public function flatten( $array ) {
			$result = array();
			foreach ( $array as $element ) {
				if ( is_array( $element ) ) {
					array_push( $result, ...$this->flatten( $element ) );
				} else {
					$result[] = $element;
				}
			}
			return $result;
		}

	}

endif;



/**
 * Customizer additions.
 */
require get_template_directory() . '/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/jetpack.php';
}
