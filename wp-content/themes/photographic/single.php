<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


    <?php if(has_post_format( 'gallery' )) { //gallery ?>
      <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
        <h1><?php the_title(); ?></h1>
        <?php the_content('Read the rest of this entry &raquo;'); ?>
      </article>
    <?php } else { // normal post format ?>

      <article <?php post_class() ?> id="post-<?php the_ID(); ?>">

      <header>
        <h1><?php the_title(); ?></h1>
        <time><?php the_time(get_option('date_format')) ?></time>
      </header>

      <section>

      <?php the_content('Read the rest of this entry &raquo;'); ?>

      <hr class="clearfix" />

      <?php the_tags('<p class="post_tags"><mark>Tagged with:</mark> ', ' | ' ,  '</p>'); ?></p>
      <p class="post_categories"><mark>Categorised as:</mark> <?php the_category(' | '); ?> </p>
      <?php edit_post_link('Edit This Post', '<p class="postmetadata">', '</p>'); ?>
 
      <hr class="clearfix" />

      <?php wp_link_pages('before=<p class="pagination">&after=</p>&next_or_number=number&pagelink=page %'); ?>

      </section>

      </article>
      
    <?php } ?>
    
    <ul class="prevnext">
			<li><?php previous_post_link("%link") ?></li>
			<li><?php next_post_link("%link") ?></li>
		</ul>
		

		<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

	<?php endif; ?>

<?php get_footer(); ?>
