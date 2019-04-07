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
define('DB_NAME', 'ibesvabd');

/** MySQL database username */
define('DB_USER', 'ibesvau');

/** MySQL database password */
define('DB_PASSWORD', 'ibesva*2019');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '(ZZD&<K:U6iaRl.;Z9O{glnW}L3oneQ>wxB*_aEIeHQ(][bIgjqK0/baQPCO/@YE');
define('SECURE_AUTH_KEY',  '1in7$p-FVSu)L, vvXLx1DGJK0pd;uksB/<$Cg:#R0?(!N;g1Y#:7yiH{%~cl>9 ');
define('LOGGED_IN_KEY',    '.C]`{b|a$ev<?>9)RA]l(!C9p$N.QT(Bp7^f%6k7!7AG?R($gjeQ::V}$hkp*T+E');
define('NONCE_KEY',        ')c:>lQgnm1X2b*#a[V5d%3>)y2`U<ht.hQwd|RnVIWbeI49r/}@@_j)Y9rGGJ)sa');
define('AUTH_SALT',        '.&q|%j:BFJ`rU9`=n0j#]TcFE#H1vwv}))B}Jx_p}(cuXy9ILh^MGqrmG_6&v4Su');
define('SECURE_AUTH_SALT', 'ovV-u^#g]pG/9dY`*Y|np8Xq%QR|)FdDKW=pdW|9*.$;AY2 CgjCq~o>N`&YYX|)');
define('LOGGED_IN_SALT',   'B;^v/ueaIv7l?Nd`-C[wJ+*WbJUU3+*0pu7+tzhxIa`1~_|9A0?+X| vKA,}FR$|');
define('NONCE_SALT',       'SG,XCtMn( Ud17nlmYpO65k,3o].ut_QD]}`D<c{;<:G|78F.]}uAWQlx#jzG*`V');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
