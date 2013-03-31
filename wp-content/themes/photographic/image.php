<?php get_header(); ?>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h1><a href="<?php echo get_permalink($post->post_parent); ?>"><?php print_r(get_the_title($post->post_parent)); ?></a> &raquo; <?php the_title(); ?></h1>
			
			  <div class="big_image">
				  <?php echo wp_get_attachment_image( $post->ID, 'large' ); ?>
				  <p class="caption"><?php if ( !empty($post->post_excerpt) ) the_excerpt(); // this is the "caption" ?></p>
        </div>

				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
				
				<hr class="clearfix" />

				<div class="navigation">
					<div class="alignleft"><?php previous_image_link() ?></div>
					<div class="alignright"><?php next_image_link() ?></div>
  				<hr class="clearfix" />
				</div>


		</article>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Sorry, no attachments matched your criteria.</p>

<?php endif; ?>

<?php get_footer(); ?>
