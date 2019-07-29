<?php
/** Enable W3 Total Cache */
 // Added by WP Hummingbird
  define('WP_CACHE', true);
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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'dbrisley_module_');

/** MySQL database username */
define('DB_USER', 'dbrisley_module_');

/** MySQL database password */
define('DB_PASSWORD', 'aUSyRPJ0');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'bG0SuFr3m6gY5BQW3WrKkOESeLdWFwtDy9nOF6WDKJN74ByKvwhU0stFEn4VznL1');
define('SECURE_AUTH_KEY', 'ghiUQl2ekzooI1cAFej3BRULFi2YGDec3Xrs4jFPzaw0LVqU9KOmj861Lphbnb8P');
define('LOGGED_IN_KEY', '3dBiprO34eXIZum0FHTn92XzI9aS9KMaWgfsZowArpJ1wZxYDZMAQBGDHpetwo3c');
define('NONCE_KEY', 'pJkR1ufPZLWL5IdOiYxYMoGGzAnykQdD0zANv8i9Gyk44cnUQwpozb6pCMYQtwSp');
define('AUTH_SALT', 'ymukjdNskO1QKIebDdtZqrJ1AuJbDxCdhjNzACtlC0mdZySN1rQDah8pfD2cVHre');
define('SECURE_AUTH_SALT', 'JhML8tv45doT7p9SvpYPgPGERfVyDY3zWwIBRxKnnpph2ItXxbSoYYJdt3HfjFVd');
define('LOGGED_IN_SALT', 'zTuB7tHNuAWBbMGvazjq2w7E2pprp1UPGIh5xOCMCBHjvJT23EOJ7XxP4iyYTMvG');
define('NONCE_SALT', 'k4wSJ1pLMfPpH2NzqYHtqcLW1ltbTUO3gv5SakiYiJwqRDIo844FwVVRSGx0ZGkA');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
