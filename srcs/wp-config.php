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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'ujin' );

/** MySQL database password */
define( 'DB_PASSWORD', '1q2w3e4r!' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         ',`G5[<L5;LyJ<DVosB!lpu+D9xf.7VbKOVkk_#^D|].V~N|B<7?MPuoM0N.Z|<O9');
define('SECURE_AUTH_KEY',  '%ni38t=>P]eYvv,Q:u|%*&6y>!)Fpzodae6|l(.U-hgG|9k<M[+o4M0!u#nY/3dn');
define('LOGGED_IN_KEY',    '5&R8c*X>,kyh[j>RHm`Ye!jGwpLg4Vv?L>TSZz*FWGuXn~DFmYcQE3)8V*R&]y:a');
define('NONCE_KEY',        'vijzSPo;X%dOz80{D%~b|x(1wSgnpmmq^i@i7nlV<rI97?OA(MMq,=L-~xaMZg}q');
define('AUTH_SALT',        '[wfk ^P$2(^S+)1uK7|+a1IvD2;8$@7-W.{I=O;T+uv;SUme%|vbd:i7VF1<udX/');
define('SECURE_AUTH_SALT', ',+01|clt[h() yIB|H|Y[V|Po{-4iJOD(T,,Lkb:2_HuEl))a.J7Jq#G_R8uQr`O');
define('LOGGED_IN_SALT',   'H(h{-MGC]3LQ*DLpbBr8F+3GSSlUQ[>Y-KVL`-ttCCPL:GkT&dU;9-,nKPj|{aX]');
define('NONCE_SALT',       'V_ohuPR.Tr&<O<#pU`K]SG~IY1uYDf!j3Z`DGc-f/&`s3$.t;*ZDh[P&T<5FcHG ');

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
