<?php
/**
 * index.php
 *
 * Required WordPress fallback template. Shown when no other template
 * matches (e.g. blog posts, archives). The front page is served by
 * front-page.php when a static front page is configured.
 */

get_header();
?>

  <main class="section">
    <div class="container">
      <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div><?php the_excerpt(); ?></div>
          </article>
        <?php endwhile; ?>
        <?php the_posts_navigation(); ?>
      <?php else : ?>
        <p><?php esc_html_e( 'No content found.', 'aaron-forum' ); ?></p>
      <?php endif; ?>
    </div>
  </main>

<?php get_footer(); ?>
