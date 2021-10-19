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
define( 'DB_NAME', 'myversitypathinfo' );

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
define( 'AUTH_KEY',         '}Ct~do>b32 ZN`[zuy2u$n,,%75us8Ug}gC27dVhjz3cpU+Aj,U<WA<]<_4~WS]y' );
define( 'SECURE_AUTH_KEY',  'i(g&2RA V*JX#3cxo-:-%{dFzU(dOYMOND]vi@yV1[1-Av^}L3~E40Zl;`<WfQJ7' );
define( 'LOGGED_IN_KEY',    '.l|iMAEm}OW&slogcM]K hA^UvZLPZ~yk(G/,1i:qIgoHwF|t[K[V}6dUh?{%Z3u' );
define( 'NONCE_KEY',        'T2ioA HhPfB51lR}QGKBL s_+J-&L*X@]*kpC[]pU(W3emgr.&w?hH:]r+CEs*(l' );
define( 'AUTH_SALT',        'vE-W|*hZo^2gBTsB=hS8zR.sk>:r6Uxd+.H S;}oh-fb{!Iu5+;#lcx8du&6j<x5' );
define( 'SECURE_AUTH_SALT', 'PsYJ+=e%t6_p,%/|y}nK4:ER{|9Ftp29#z9q_KxjPURzlCV396n{B`h5!?@4z3-x' );
define( 'LOGGED_IN_SALT',   'g1OApo(z5A+(5zU295tuu@[nb5D]k[/TQohr4m.Iix3;r,M=83U4xu<j5|oyz)$T' );
define( 'NONCE_SALT',       '/r~ulH5)h*J{Cl|N% a?Hc5p>G?/B8XLgm>?y)THT,t`T,E-(@HBD2sc?%Yf31 &' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = '_dummy_';

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
define( 'WP_DEBUG', true );


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
