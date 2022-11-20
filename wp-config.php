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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'intro-cms' );

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
define( 'AUTH_KEY',         'GB{qEEpiCryY.u;g?]3o#gb!h&]HN<p1~zmak=|rhxS*NH0uCZORgUaYM$?I&:Zd' );
define( 'SECURE_AUTH_KEY',  'R`?RV-204Mr4F1>Y3o<[V}H=xwg;.cWV#!>(TC`4md$Ix1sADJ8N=NX`kIn)(|vk' );
define( 'LOGGED_IN_KEY',    's:7L#loY{_I>m|s@.*jv2wHC|XKblVNuU YB1[RSQeNkDoNmN/UBtWH+ZX7~UqE|' );
define( 'NONCE_KEY',        'vc%~mHZcr3+qOQ6=r$Q_!@w{dv2`f=K5&`vCS;vjT!P3j=Mal.-|,[;`,Z-5w2r,' );
define( 'AUTH_SALT',        'WPiFQ3lS4X,;Q?QIR&X&i1EQu|e+C*6=2MUh6/ZP-o-GYR7p+PBARfD]q:M@MO{;' );
define( 'SECURE_AUTH_SALT', 'F~DGwh_C@gX(Kw*zusP*=]_+bUu;g[+G7;H@z8WjqBptwKm?~]NL2zCT7rObD7T~' );
define( 'LOGGED_IN_SALT',   'g]+n$Ir@kfMq|;{:GUIt{`.h/U?hiTv+!UW,naHVhcZ4rHw<&MpU,oCb#/c0KVq,' );
define( 'NONCE_SALT',       '~Fy9M,_#4G-K:9v|4C*0P/0d|A,RA=S*PcO4j).q4|9pl|L4~<;t.SR/85gsy[#r' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
