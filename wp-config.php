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
define( 'DB_NAME', 'studiokitchen' );

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
define( 'AUTH_KEY',         '=r|G1mV~i<7X$Wqy)Z]o!KWmvITV-m-09f?!Cg%nEC1iT(tdSeK?qitcMT%bM~d7' );
define( 'SECURE_AUTH_KEY',  ';%RWHH!3BU8^`a^CSY_c~A  VtfQwx<3+:r<`M1 M7<1,lNKctxda!lp$zN2]vbQ' );
define( 'LOGGED_IN_KEY',    'i0,H]@eb<`-XW]fY=K3ujPC|)R$d4WT2E;`w}2EAG%o,_,clZx]C^2@~ G:U_rk9' );
define( 'NONCE_KEY',        'agM93f)j@X 3D@jNedLaIxU[MEOiQ(;^mFx-_U-5e5TS{hkubn`giC.]xrsg|PY,' );
define( 'AUTH_SALT',        'e(|3/F}$ *2QB~Y>x6`5t|9aE~W-o*rG5g9C2We2Qh/.:tS{/smE[= JHglQ)K`O' );
define( 'SECURE_AUTH_SALT', '!POmW.!M`-fICj5P?Y$]-BDH76$wKBcr1:%8bmFc#NlZ]O9)U}<j60!ozaTwO+eV' );
define( 'LOGGED_IN_SALT',   'a}U1B^Knb#36^dXdBk!~{_suWb,;FFBM!doj@yeN<S3Q[p@~w<B(G@m03w}0CC<O' );
define( 'NONCE_SALT',       'PO4HM:!lE=([gJ.-(?^8(Q`PT}>f75I_{fq2%M58(dM[{: 8aS#d&Gs!n(M2M`uq' );

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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
