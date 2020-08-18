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
define( 'DB_NAME', 'mysql' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '81 Pu{%y=jn~&IYQuW1ES9KONq42n,zF/!FBw0/.T$xJg/SDK:_+Ra:LucEvmP@b' );
define( 'SECURE_AUTH_KEY',  ':h9EP(yl<vNz^g.!lG_jLL,H)j~3MS@q;^?15@2qbV?&jrU|1LTfp(lYsXL;R.qs' );
define( 'LOGGED_IN_KEY',    't/zb<s%U=wB8APovOAAf!*%|`XSHqfU7isR^:+C;#]k*Z/<^h[::dm=fVbh<&Z9P' );
define( 'NONCE_KEY',        'o8ig9(XEJvFGqwKUoGqOK]QDF-<wss,U=R)36xR[l5eD,%{k^?xEz=Sc}8~}-D-}' );
define( 'AUTH_SALT',        '?62BE<8$69[~9L}:=N?@(D!{RU4^f}Bg/NLxv{WOG9Wm*-60n+ux53SyB3giL$VU' );
define( 'SECURE_AUTH_SALT', 'kSrk>W0tv2[} oEP7%RI7.T1%<lk<KrYAd6R5:L hmagP3 US~v2pFDl{ZyZ4rk:' );
define( 'LOGGED_IN_SALT',   'lc^Pkf^VGMO:vu1~6<_I[Hl,{QS<yAw%{.Bjzi<vsjSOykHML/V`fLvs0<p+($EG' );
define( 'NONCE_SALT',       'q79C^c}e4f;de:!QWD])F93ixd+h|iOqg~cg5DGn6L=U>VT:Fgg5:apTIR+K96@8' );

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
