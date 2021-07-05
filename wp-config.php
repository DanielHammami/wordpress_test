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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_test' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'JV8r`dCPw0Uh{Fipw6ug >v_4Cl;34g^koA@O+$N$1=P$GP|K!nM#I[Mvg! >g!y' );
define( 'SECURE_AUTH_KEY',  'fsf5UHm-b8*]=@a_ {@D3WTE8hhSwzl,7{!I>1B6koQdY8qJ3qq%H4&1NojPX]zr' );
define( 'LOGGED_IN_KEY',    '0N8Qz*G^q0Z`n7hU+}x;.<x@|x.zHN]S@[r+MU)I|2g;oF){:{2Qw56>2&5+g|J$' );
define( 'NONCE_KEY',        'eHI36ZR+^8gZG9!QpzK6<l{!9}|H|IUz:i6B=-zvyf1V[6&uWx1+<|Ha.0MmG:OV' );
define( 'AUTH_SALT',        'e#o{T0wUUuEu%(&;$m7|K>F[Hb~_hn93t<XO/!YFhb1|r.;twU2bAwIIM&7E@Ph]' );
define( 'SECURE_AUTH_SALT', '9JFkMFra^c Q@|}SP;2G&n!5%elc6rHt([k#8 iHd^RfEt4T$fN(PMe;py3VU/6!' );
define( 'LOGGED_IN_SALT',   'e!mtz^7H$ww<`e5HVI}L1kwBHY>-L!|iL[@PDh;f^<]Wt^oA:7Z<K%k0>zo)L4b@' );
define( 'NONCE_SALT',       'KO[R2y5:g#W1XL_PK:_P/;+g?UOVK,==uuN93;@L]1r!us gqmdcG;QCQ^3R3U(:' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
