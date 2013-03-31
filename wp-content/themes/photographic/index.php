<?php get_header(); ?>

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
		  
      <?php if(has_post_format( 'gallery' )) { //gallery ?>
        
        <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
          <a href="<?php the_permalink() ?>">
            <?php if ( has_post_thumbnail() ) { the_post_thumbnail('medium-square'); } else { ?>
              <img src="<?php echo get_template_directory_uri(); ?>/img/oops.png" width="200" height="200" />
            <?php } ?>
            <strong><?php the_title(); ?></strong>
          </a>
        </article>
        
        <?php } elseif(has_post_format( 'image' )) { //image ?>

          <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
            <a href="<?php the_permalink() ?>">
              <?php if ( has_post_thumbnail() ) { the_post_thumbnail('medium-square'); } else { ?>
                <img src="<?php echo get_template_directory_uri(); ?>/img/oops.png" width="200" height="200" />
              <?php } ?>
              <strong><?php the_title(); ?></strong>
            </a>
          </article>        
        
      <?php } else { // normal post format ?>

        <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
          <a href="<?php the_permalink() ?>">
            <?php if ( has_post_thumbnail() ) { the_post_thumbnail('medium-square'); } else { ?>
              <img src="<?php echo get_template_directory_uri(); ?>/img/news.png" width="200" height="200" />
            <?php } ?> 
            <strong><?php the_title(); ?></strong>
          </a>
        </article>

      <?php } ?>

		<?php endwhile; ?>

			<ul class="prevnext">
				<li><?php next_posts_link('&lt; Older Entries') ?></li>
				<li><?php previous_posts_link('Newer Entries &gt;') ?></li>
			</ul>

	<?php else : ?>

		<article class="noposts">
			<h2>404 - Content Not Found</h2>
			<p>We don't seem to be able to find the content you have requested - why not try a search below?</p>
			<?php get_search_form(); ?>
		</article>

	<?php endif; ?>

<?php get_footer(); ?>
