<?php get_header(); ?>


<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<article>
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <p><?php the_excerpt(); ?></p>
    <small><?php the_date(); ?> by <?php the_author(); ?></small>
</article>

<?php endwhile; ?>
<?php else : ?>
<p>No posts found.</p>
<?php endif; ?>

<?php get_footer(); ?>