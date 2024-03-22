<?php
/*
Template Name: Page (Hero Banner)
*/
get_header(); 
add_image_size( 'hero-banner-image', 1920, 700, true ); // Adjust width and height as needed

?>
<section class="hero-banner d-flex flex-column justify-content-center align-items-center min-vh-100">
<?php if ( has_post_thumbnail() ) : ?>
  <?php the_post_thumbnail('hero-banner-image', array('class' => 'img-fluid w-100')); ?>
<?php endif; ?>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-lg-6 mx-auto text-center">
        <h1><?php the_title(); ?></h1>
        <p><?php echo get_excerpt(); ?></p>
        <a href="#" class="btn btn-primary">Call to Action</a>
      </div>
    </div>
  </div>
</section>
<?php
the_post();
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'content' ); ?>>
	<h1 class="entry-title"><?php the_title(); ?></h1>
	<?php
		the_content();

		wp_link_pages(
			array(
				'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'wp-theme-adventure' ) . '">',
				'after'    => '</nav>',
				'pagelink' => esc_html__( 'Page %', 'wp-theme-adventure' ),
			)
		);
		edit_post_link(
			esc_attr__( 'Edit', 'wp-theme-adventure' ),
			'<span class="edit-link">',
			'</span>'
		);
	?>
</div><!-- /#post-<?php the_ID(); ?> -->
<?php
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}

get_footer();
