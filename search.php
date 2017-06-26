<?php get_header(); ?>
<div class="page-frame page-content search-results">

	<form role="search" method="get" class="search-form" action="/">
		<div class="field-wrapper">
			<label>
				<input type="search" class="field-text" placeholder="Search..." value="<?php echo get_search_query(); ?>" name="s" title="Search...">
			</label>
			<button type="submit" class="btn dark">Search <i class="icon-search"></i></button>
		</div>
	</form>

	<div class="clearfix gallery">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>
		<?php else : ?>
			<p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
		<?php endif; ?>
	</div>

</div>
<?php get_footer(); ?>