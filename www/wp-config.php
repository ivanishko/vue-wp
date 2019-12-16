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
define( 'DB_NAME', 'vagrant' );

/** MySQL database username */
define( 'DB_USER', 'vagrant' );

/** MySQL database password */
define( 'DB_PASSWORD', 'password' );

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
define( 'AUTH_KEY',         'xYt:~5*fm(Kk8Fn.fxAXNt,ZwX$fW.Mu;01 tg4KsTD>i?R<L-OC@P`_.@DFognf' );
define( 'SECURE_AUTH_KEY',  '}Aoc@!O?n]BkLLeSmKQYE+Z`4~~52M8.]EfX,Qc5o?|->I0X4|$fV1r,]-iG=eY@' );
define( 'LOGGED_IN_KEY',    '%R<Kv0p6*VFD}.5H>m~llU2E}>*+eA]glkrr&RvPG`bh!Y8gkF%}//mP9j{p!u3o' );
define( 'NONCE_KEY',        'ut$6<DSv+5)0|P^1Qk:r>joBH:>^4yt|k?.hp~*T,5,sOl9:Ff9(ET{!>pBJ>mxX' );
define( 'AUTH_SALT',        '1I~9=_!EMz26r1Mk[s?[Dxa?KST.Cd@iHP DX.s>o@mlJ;D4CamH6{AI9YTT AB:' );
define( 'SECURE_AUTH_SALT', 'E5JgZ{dg(L8vTaX_Lggi2*rrk0R_0k_Hg?3TKulic)ca1k~#{;Deo]MXcKAh/zf`' );
define( 'LOGGED_IN_SALT',   'B^#|qL=P_vQ)aB{NUft<AzFJNr37?K2=vIwj3s^p$=R;TH,K5:x2B}=umm/0BE7C' );
define( 'NONCE_SALT',       'r3gKg3XKHj4c?*%j(N2PH(z:%n$/>OGWUbg_]<F`igvHZztIS,G(bY&+z|8)I,v5' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
