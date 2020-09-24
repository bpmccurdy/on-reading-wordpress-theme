<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package On_Reading
 */

get_header();
?>
<div class="container-fluid m-0 p-0">
<div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide show-neighbors" data-ride="carousel">

    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="item__third">
          <img src="//placehold.it/1920x1080/c69/f9c/?text=wow" class="d-block w-100" alt="">
          <div class="carousel-caption d-none d-md-block">
            <h5>First slide label WOW</h5>
            <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="item__third">
          <img src="//placehold.it/1920x1080/9c6/cf9/?text=2" class="d-block w-100" alt="">
          <div class="carousel-caption d-none d-md-block">
            <h5>Second slide label</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="item__third">
          <img src="//placehold.it/1920x1080/69c/9cf/?text=3" class="d-block w-100" alt="">
          <div class="carousel-caption d-none d-md-block">
            <h5>Third slide label</h5>
            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
          </div>
        </div>
      </div>
    </div>

    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>

  </div>
</div>
</div>

<div class="container-xl">

<div class="row">
	<div class="col-8">
		<div class="row">
			<div class="col-12">
				<main id="primary" class="site-main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'content', 'none' );

		endif;
		?>

	</main><!-- #main -->
			</div>
		</div>
	</div>
	<div class="col-4">
		<?php get_sidebar(); ?>
	</div>
</div>
</div>


<?php
get_footer();
?>
	
