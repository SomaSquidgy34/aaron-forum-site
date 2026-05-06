<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

  <!-- NAV -->
  <header class="site-header">
    <div class="container header-inner">

      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
        <?php
        if ( has_custom_logo() ) {
          the_custom_logo();
        } else {
          printf(
            '<img src="%s" alt="%s" class="logo-img" />',
            esc_url( get_template_directory_uri() . '/assets/logo.jpg' ),
            esc_attr( get_bloginfo( 'name' ) )
          );
        }
        ?>
      </a>

      <button class="nav-toggle" aria-expanded="false" aria-label="Open navigation" aria-controls="primary-nav">
        <span class="hamburger-bar"></span>
        <span class="hamburger-bar"></span>
        <span class="hamburger-bar"></span>
      </button>

      <nav id="primary-nav" aria-label="<?php esc_attr_e( 'Primary navigation', 'aaron-forum' ); ?>">
        <?php
        wp_nav_menu( array(
          'theme_location' => 'primary',
          'menu_class'     => 'nav-list',
          'container'      => false,
          'fallback_cb'    => 'aaron_forum_fallback_nav',
        ) );
        ?>
      </nav>

    </div>
  </header>

<?php
/**
 * Fallback navigation shown when no menu has been assigned to the
 * "Primary Navigation" location in Appearance → Menus.
 */
function aaron_forum_fallback_nav() {
  echo '<ul class="nav-list">';
  echo '<li><a href="#services">Services</a></li>';
  echo '<li><a href="#about">About</a></li>';
  echo '<li><a href="#contact" class="btn btn-sm">Contact</a></li>';
  echo '</ul>';
}
