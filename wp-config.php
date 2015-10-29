<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

/**
 * Load database info and local development parameters
 */
if ( file_exists( dirname( __FILE__ ) . '/local-config.php' ) ) {
  define( 'WP_LOCAL_DEV', true );
  include( dirname( __FILE__ ) . '/local-config.php' );
} else {
  define( 'WP_LOCAL_DEV', false );

  /** The name of the database for WordPress */
  define('DB_NAME', 'database_name_here');

  /** MySQL database username */
  define('DB_USER', 'username_here');

  /** MySQL database password */
  define('DB_PASSWORD', 'password_here');

  /** MySQL hostname */
  define('DB_HOST', 'localhost');
}

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**
 * Custom Content Directory
 */
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/content' );

define( 'WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/interner_blog/content' );

//define( 'WP_PLUGIN_DIR', 'http://' .  $_SERVER['HTTP_HOST'] . '/content/plugins' );

//develop mode url. 
//define( 'WP_CONTENT_URL', 'http://localhost:8080/interner_blog/content' );

//define('WP_HOME','http://localhost:8080/interner_blog');
//define('WP_SITEURL','http://localhost:8080/interner_blog/wordpress');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'd n^Qbynqvjq^|~-xk>N(=C`B:|.bxI3QXJ|Y8mMO@&UA+lw(%CwiT+:=SM=_h %');
define('SECURE_AUTH_KEY',  'kYZ,knd-5)B,nfUT./SEg+[I#0C69s$T@5~{s>]HQ9Y+YqxaBly;<$djh,X!X!7~');
define('LOGGED_IN_KEY',    'KU-?4M|^?%H^9[x^R|M!-Wf41w1vnFp@@$^[=:%2k0R*@J|^7]$lBYa?8l6?g%!z');
define('NONCE_KEY',        ',RL4Ggv7Gr<toeaEZTI]Q~AgrW!HhNk9us<VU+VS&|J{4L{T%l^Q|b.[F)St -?(');
define('AUTH_SALT',        '<tk$@ujP-K3Gg>+tb+sN`18z0piJo3NIAAso$5;A#.b{<L(@R81UV2hMvyrnr3od');
define('SECURE_AUTH_SALT', 'Z`CU,r|;j6NnQV$ZG&,(Axk4ldQwwv,Ywyw=b/*Td(>:]&|i{SC.v]ja!lV!0fs`');
define('LOGGED_IN_SALT',   'w|MtzT0]d??[.1VF368<-b3P_G8,+j@+<^UMV:5<R^0Zy{7T0-7BXc5+6M)8OiGh');
define('NONCE_SALT',       'sg:BO~Au!4O!99b)i-FVSEQa[azd<h|3-?,W$!-0o|V4)IWo1JSiV/bO-B02<yD-');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/wordpress/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');