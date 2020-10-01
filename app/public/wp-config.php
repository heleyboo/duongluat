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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'ouCNec6zwBdYpGR4g6Rm10nl9xFRyWsbcoc2JRauJcGeeH+hApgybG5reCehggyUtJH12V3byeJDEmP7U98N2Q==');
define('SECURE_AUTH_KEY',  'UiNMOqZ2aAFT4FmTAdNyF4u5R9zf0VMqZgme4WxK76QBxmCt44i3SZuGABe0BUdQ/6dSbZJrXokzjeWSOnEOXw==');
define('LOGGED_IN_KEY',    'cUhWM7pBD7szZ43JK+yB4v8C1N0dybzawGY8EEdnbsWotm51FOC3559nyLol5Rz8RnpCOoaMi665Bl+Mu2C++w==');
define('NONCE_KEY',        'Anh15esjwv/UTWgAK8+8JqSC4bKq4GfnEEIQYS1iMuhViKsgxEa7MjJDnvs8C/yjjkny6zMwZxOTnm5vXeJS2Q==');
define('AUTH_SALT',        'fFs2iK9IrtiO+HLZe9Q9L5Zxug0exmAhKZCmjS2wbhqSWiY9zl2A6IsoN3AZ5PmBGlzRIMscpqL8GtCp1BSKJw==');
define('SECURE_AUTH_SALT', '4huOguEfC0qvVYy0GxVxzF9NeTkkMuZc+zeCc5KQmg6NkgV5jiRCg6lgQtO7yamQ0Q+qtpLnxddEDYFXua70zg==');
define('LOGGED_IN_SALT',   'X9VB0czkl5su1vuTzu5zfPT1I2SK5EpWyrwiqrs88chnGs1rnQlpGajJmM0ncE9/MZ4gO/9DkAdwyZeJQ18v0w==');
define('NONCE_SALT',       'k7JG9dlw+VgBSB8syun1X40N4kLb/QEnKLVS/eT4nCUshwhkJPBxY9KNZq+ijvuBALls3kTus5BUMAr5bGg3Kg==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
