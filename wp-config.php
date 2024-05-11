<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '7v:9P5Emu~ia}2OGb*@G@6/&^+7n|uE<^`^7<]}Ri6bh|C*W&!n+H[@*R^2H;7se' );
define( 'SECURE_AUTH_KEY',   'eXe@^vntQ?9m7s/|kv%^&@5/ckZp/&*E2.]38*!)GBU0mdjmw|<eqhDWr1b~zfRf' );
define( 'LOGGED_IN_KEY',     '`2T_:{TN5O78PYd ^o{t;kE[OQJPS])43)7JQ0Xdmczr9j,8LOHw#yWvx;+P%&>w' );
define( 'NONCE_KEY',         'T^hSIOLi3ELV>V4m8Y<~eZFn~cn=FUNrxT[tv`8#,X9um.u~M<_&DI)FIR$D{U-&' );
define( 'AUTH_SALT',         'UwakU(.Wlmqw$I)F_ 5?XV?wfPys=m#3*ZW/J=TM4sCGP07A CJ|ylq4WmScz`{P' );
define( 'SECURE_AUTH_SALT',  '^UlY$OZ.][BjxH9W]n:loYoQsxtnurpoZ0%J%f53fK[c,HPLiBJLq42VR)|H*AvE' );
define( 'LOGGED_IN_SALT',    'ye}0ckgh~Jz}m{h%%^!^.0p}BaHG|m[a]X2FmS2dy[@3|y-YI@M1XqnmcAh/BXZP' );
define( 'NONCE_SALT',        'F/{V?<,KwvIjw2bJ^O/3JE6:wOUH/QUs(A&6gvhX= DugP+,A@|erf<2o#rI<&cw' );
define( 'WP_CACHE_KEY_SALT', 'Q&yYA<a.$d^u,OSHJb//vP~VG5{;_&r-H<{,J!7]LnL6-u6X&n+}?Th],K52SA>T' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);

if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
