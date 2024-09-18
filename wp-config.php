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
define( 'AUTH_KEY',          '/`H&aJ%3>y{?(RFBJ%B/p6^};kCXg|!~YYDy@~3DSZUcSN(^3 yak2:,S!<o1LBL' );
define( 'SECURE_AUTH_KEY',   '(Idz=[>D@5@jNQO`WxPQ@_yR!2=0cOc`dMXl&2~t<LX$zPq1.:*2pe`I?P4z+`c$' );
define( 'LOGGED_IN_KEY',     ']0^MU$G>l}g{?D&`u~]T9DZ( dC2+hd YKET>)ecnf?:7C&hK~V{&+ caq,$r/Xq' );
define( 'NONCE_KEY',         'Ro_f5}#ne9{m0oQX|H7}WXP$}[}-x0-]^@rG@ija3jKIoQ/ti?l||vtZt456sSc ' );
define( 'AUTH_SALT',         '>)<,(LPY?=ajAun21KI3|e#cooKuwjIR^n.&R7oyge5l!n5W7^XU&:1[RG%X0GUy' );
define( 'SECURE_AUTH_SALT',  'r[xMg,+YUP!CL:pc1yVX}WDY-0BKGha-$4u&uc),Tdh>t7IhkByfUJ4I%Am=xkvt' );
define( 'LOGGED_IN_SALT',    'K[zO6JNW>6S4B#Y[dRoyxmfbhH.S_6at cH111m621(a!v:Ye]JYMl>]_rL EGV~' );
define( 'NONCE_SALT',        'rr~f~{RNtf3quo6dIf%=KrtjOttnYG6;9(.u-<ni.[62?r8[Fa3s5MRoXW%uyDRB' );
define( 'WP_CACHE_KEY_SALT', 'Fdnh<2,BdG^erv%:YNJM;-1TFOi@7jy(1/BWpGa!D5I.0`3r=Ofv|0fB5-Wb kZ6' );


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
