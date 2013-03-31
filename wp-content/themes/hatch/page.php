<?php
/**
 * Page Template
 *
 * This is the default page template.  It is used when a more specific template can't be found to display 
 * singular views of pages.
 *
 * @package Hatch
 * @subpackage Template
 */

get_header(); // Loads the header.php template. ?>

	<?php do_atomic( 'before_content' ); // hatch_before_content ?>
	<div id="content">
		<?php do_atomic( 'open_content' ); // hatch_open_content ?>
		<div class="hfeed">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php do_atomic( 'before_entry' ); // hatch_before_entry ?>
					<div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">
						<?php do_atomic( 'open_entry' ); // hatch_open_entry ?>
						<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title permalink="0"]' ); ?>
						<div class="entry-content">
							<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'hatch' ) ); ?>
							<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'hatch' ), 'after' => '</p>' ) ); ?>
						</div><!-- .entry-content -->
						<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">[entry-edit-link]</div>' ); ?>
						<?php do_atomic( 'close_entry' ); // hatch_close_entry ?>
					</div><!-- .hentry -->
					<?php do_atomic( 'after_entry' ); // hatch_after_entry ?>
					<?php do_atomic( 'after_singular' ); // hatch_after_singular ?>
					<?php //comments_template( '/comments.php', true ); // Loads the comments.php template. ?>
				<?php endwhile; ?>
			<?php endif; ?>
		</div><!-- .hfeed -->
		<?php do_atomic( 'close_content' ); // hatch_close_content ?>
		
		<div class="clear"></div>
		<div class="recent-images">
			<?php $wp_query->init();?>
			<?php $wp_query->set('category_name', 'portfolio'); ?>
			<?php $wp_query->get_posts();?>
			
			<div class="title">Новые фотографии</div>
			
			<div class="dragable-wrapper">
			
			
				<?php if ( have_posts($wp_query) ) : ?>
					<div class="strip cf">
					<?php $count = 0;?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php if (get_the_ID() !== $currentPost) : ?>
							<?php do_atomic( 'before_entry' ); // hatch_before_entry ?>
							<div class="strip-item">
								<?php do_atomic( 'open_entry' ); // hatch_open_entry ?>
								<?php if ( current_theme_supports( 'get-the-image' ) ) {
									get_the_image( array( 'meta_key' => 'Thumbnail', 'size' => 'archive-thumbnail', 'image_class' => 'featured', 'width' => 220, 'height' => 150, 'default_image' => get_template_directory_uri() . '/images/archive_image_placeholder.png' ) );
								} ?>					
								<?php do_atomic( 'close_entry' ); // hatch_close_entry ?>							
							</div>
							<?php do_atomic( 'after_entry' ); // hatch_after_entry ?>
							<?php $count ++;?>
						<?php endif; ?>
					<?php endwhile; ?>
				</div>
				<?php endif; ?>
			
			</div>
			
			<div class="control-wrapper">
				<div class="bar"></div>
				<div class="slide" id="drag"></div>
			</div>
			
		</div>
		<script>
			
			function setStripWidth()
			{
				var items = $('.strip-item');
				$('.strip').css({'width' : 220 * items.length + 'px'});
				$('#drag').draggable({ 
						containment: "parent", 
						axis: "x",
						drag: function() {
							dragParser();
						} 
					});
			}

			function dragParser()
			{
				var maxPos = $('.bar').width() - $('#drag').width();
				var strip = $('.strip').width() - $('.dragable-wrapper').width();

				var dPos = parseInt($('#drag').css("left"));

				$('.strip').css({"left": strip/maxPos * (dPos * -1) + "px"});
				
			}	

			setStripWidth();
		</script>
	</div><!-- #content -->
	<?php do_atomic( 'after_content' ); // hatch_after_content ?>
<?php get_footer(); // Loads the footer.php template. ?>