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
define( 'DB_NAME', 'db_practical' );

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
define( 'AUTH_KEY',         'hy@U+L:/=vKdEhH6ciDt6HAArwg5bUE8#SC+r=g5XT6ZNJxcf5,&CPO^v_d7Iw.c' );
define( 'SECURE_AUTH_KEY',  '7i+/ep&&i#b;.O x@j)hG)1^jd-#=B3,pFQ` Ij%]rD`?|U&1|h}@&5JbOL~I]$~' );
define( 'LOGGED_IN_KEY',    '#7P>CXF[m;o[iOAnP8_-Um&H#R#!U<[R<3#FH?QbykQ/1.ple uV@wr]|I_cYUhk' );
define( 'NONCE_KEY',        ';^zErCZ 85{#WDu,n->YlzE(BnCPo]JY*J=8[2UO7>QIFB 03NP3E3}3 CDbMq<&' );
define( 'AUTH_SALT',        'ja@$Cc2s?}Ly2 RT<<6kxrXOXQicd/bmf[J3cq,i=`ex<@ZxEb9~37V8PHY?m}Kt' );
define( 'SECURE_AUTH_SALT', 'FjQfBwQyDQ6cW]MAo=K,n*tGo_BkaG1e>;an`NO1j4AmSozHMH hT%s@k=vm$7.Q' );
define( 'LOGGED_IN_SALT',   'a.rPV^0jd:]B0u8D[eL7T[a$>vw+So$>Ww-3JTS^/2h>K|OVbe-&Z c1IXD_{qeZ' );
define( 'NONCE_SALT',       '*pG3O|=21^KiSV@wJv]}9#NP6&Csgd)7CEl.4`crYB,^,ixI%bQ1r0^{F37Gwe8!' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'pt_';

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
