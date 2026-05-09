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

      <?php
      if ( has_custom_logo() ) {
        the_custom_logo();
      } else {
        printf(
          '<a href="%s" class="logo"><img src="%s" alt="%s" class="logo-img" /></a>',
          esc_url( home_url( '/' ) ),
          esc_url( get_template_directory_uri() . '/assets/logo.jpg' ),
          esc_attr( get_bloginfo( 'name' ) )
        );
      }
      ?>

      <button class="nav-toggle" aria-expanded="false" aria-label="Open navigation" aria-controls="primary-nav">
        <!-- Hamburger icon (shown when menu is closed) -->
        <svg class="icon-hamburger" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" aria-hidden="true">
          <line x1="3" y1="6"  x2="21" y2="6"/>
          <line x1="3" y1="12" x2="21" y2="12"/>
          <line x1="3" y1="18" x2="21" y2="18"/>
        </svg>
        <!-- Close (X) icon (shown when menu is open) -->
        <svg class="icon-close" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" aria-hidden="true">
          <line x1="4" y1="4"  x2="20" y2="20"/>
          <line x1="20" y1="4" x2="4"  y2="20"/>
        </svg>
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
