<?php
/**
 * Post Template
 *
 * This is the default post template.  It is used when a more specific template can't be found to display
 * singular views of the 'post' post type.
 *
 * @package Hatch
 * @subpackage Template
 */

get_header(); // Loads the header.php template. ?>

	<?php do_atomic( 'before_content' ); // hatch_before_content ?>
	<div id="content cf">
		<?php do_atomic( 'open_content' ); // hatch_open_content ?>
		<div class="hfeed cf">
			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php do_atomic( 'before_entry' ); // hatch_before_entry ?>

					<div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">
					<?php $currentPost = get_the_ID();?>
						<?php do_atomic( 'open_entry' ); // hatch_open_entry ?>
						
						<div class="post-content">
							
							<?php 
								if ( current_theme_supports( 'get-the-image' ) ) {
									 $image_info = get_the_image( 
									 		array( 
									 			'meta_key' => 'Thumbnail', 
									 			'size' => 'full', 
									 			'link_to_post' => false, 
									 			'image_class' => false, 
									 			'attachment' => true 
									 		), 
									 		true 
									);

									list($width, $height) = getimagesize($image_info);
									
									if ($width >= $height) {
										$img_width = '80%';
									} else {
										$img_width = '50%';
									}
									
									$like_img = get_the_image( 
									 		array( 
									 			'meta_key' => 'Thumbnail', 
									 			'size' => 'small', 
									 			'link_to_post' => false, 
									 			'image_class' => false, 
									 			'attachment' => true 
									 		), 
									 		true 
									);
									

								} ?>
							
							<?php if ( current_theme_supports( 'get-the-image' ) ) : ?> 
							<a href="<?php echo  $image_info; ?>" style="float:left; display:block; width: <?php echo $img_width; ?>;" id = "#main-img">	
								<?php get_the_image( array( 'meta_key' => 'Thumbnail', 'size' => 'large', 'link_to_post' => false, 'image_class' => 'featured', 'attachment' => false, 'default_image' => get_template_directory_uri() . '/images/single_image_placeholder.png' ) ); ?>
								<br />
								Нажмите, чтобы просмотреть в полном размере
							</a>														
							<?php endif;?>
							<div class="post-aside">								
								<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title permalink="0"]' ); ?>
								<?php echo apply_atomic_shortcode( 'byline_date', '<div class="byline byline-date">' . __( '[entry-published before="Опубликовано: "]', 'hatch' ) . '</div>' ); ?>
								<?php //echo apply_atomic_shortcode( 'byline_author', '<div class="byline byline-author">' . __( '[entry-author before="Автор: "]', 'hatch' ) . '</div>' ); ?>
								<?php echo apply_atomic_shortcode( 'byline_category', '<div class="byline byline-ategory">' . __( 'Категория: [entry-terms taxonomy="category"]', 'hatch' ) . '</div>' ); ?>
								<?php //echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">' . __( '[entry-terms taxonomy="post_tag" before="Метки: "]', 'hatch' ) . '</div>' ); ?>
								<?php echo apply_atomic_shortcode( 'byline_edit', '<div class="byline byline-edit">' . __( '[entry-edit-link]', 'hatch' ) . '</div>' ); ?>
								<?php get_template_part( 'loop-nav' ); // Loads the loop-nav.php template. ?>
								<?php get_sidebar( 'after-singular' ); // Loads the sidebar-after-singular.php template. ?>
								<br />
								<?php echo the_tags();?>
							</div>
						
							<div class="entry-content">
							<?php $content = get_the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'hatch' ) );?>
								<?php if ($content != '***') {
									the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'hatch' ) );
								} ?>
								<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'hatch' ), 'after' => '</p>' ) ); ?>
							</div><!-- .entry-content -->

							<?php do_atomic( 'close_entry' ); // hatch_close_entry ?>
						
						</div><!-- .post-content -->

					</div><!-- .hentry -->

					<?php do_atomic( 'after_entry' ); // hatch_after_entry ?>
					<?php do_atomic( 'after_singular' ); // hatch_after_singular ?>

					<?php //comments_template( '/comments.php', true ); // Loads the comments.php template. ?>
				<?php endwhile; ?>
			<?php endif; ?>
		
			
		<?php $currentCat =  $wp_query->get('category_name');?>	
		
			
			
		</div><!-- .hfeed -->

		<?php do_atomic( 'close_content' ); // hatch_close_content ?>
		<div class="clear"></div>
		<div class="social">
			<div id="vk_like">
				<script type="text/javascript">
                    VK.Widgets.Like("vk_like", {type: "button", verb: 1, pageImage: "<?php echo $like_img; ?>"});
                </script>
                <br />
            </div>
            
            <div class="vk_share">
            	<!-- Put this script tag to the place, where the Share button will be -->
				<script type="text/javascript"><!--
				document.write(
						VK.Share.button(
								{
									type: "button", 
									text: "Сохранить",
									url: '<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>', 
									title: '<?php echo get_bloginfo('name');?>',
									image: '<?php echo $like_img; ?>',
									description: '',
									noparse: false
								}
						)
				);
				--></script>	
            </div>
            <div class="clear"></div>
					
            <!-- Put this div tag to the place, where the Comments block will be -->
            <div id="vk_comments"></div>
           	<script type="text/javascript">
				$(document).ready(function() {
           		VK.Widgets.Comments("vk_comments", {limit: 15, width: $('#main-img > img').width(), attach: "*"});
               	
				});
            </script>
			
		</div>
		<div class="clear"></div>
		<div class="recent-images">
			<?php $wp_query->init();?>
			<?php $wp_query->set('category_name', $currentCat); ?>
			<?php $wp_query->get_posts();?>
			
			<div class="title">Другие изображения в альбоме</div>
			
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