<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'gabShop' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'aisS i?O1b_7^KnLv%4%<8W<)^hH>-vcaLgs-SHTBAJ&PsW9$<vu~b0PVvTb)YKP' );
define( 'SECURE_AUTH_KEY',  'C,qJ2z]BwYh+7:Jk5}5mMSs!JN%mk6Zx g%RdSPbcl0&LSv?G-?6c9h|-Jr8a! 4' );
define( 'LOGGED_IN_KEY',    'w_ym{rP)-2`cBZf,^zb`IJ2:rVR>Ox2qilBnasM_R;Y4bk}{GW&LCulh3R~-iDsI' );
define( 'NONCE_KEY',        'f-)eyG+x[ZyL4<Lb32UC.0rH(TY8bs;rN`;,*!6Or~d] ]{*_;&y1G~+z{WPcRwY' );
define( 'AUTH_SALT',        ')_vS%V|58K/n_BhT2|xUKw&y[7QHbX.[_}$MccNdnGbzH 7?8ouAl!4rvGUY0Sqn' );
define( 'SECURE_AUTH_SALT', ')*Wl-p;D[UYV]*&CI#BZraM?!.?;+YZW]X68p&7<$pwDXb5NgNz8:F!;`FbtsgH(' );
define( 'LOGGED_IN_SALT',   '(.^lsq{!i HiGx)TBC6w*b-;_6)$U5L?|a:/)a7m<_++s57~/|GS}z6f]v:,*oA_' );
define( 'NONCE_SALT',       '`oRl[_m}fSU**.0ORa;Tqf`Jib`hQay ^Ig%}8Qy)9S1YrPEL@ BtHSL*viaY0S-' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
