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
define('DB_NAME', 'eshop');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'dP$PpqJ_|W*Lr@>OWHyn?D2S>bXYPS &}m[q?Dz8s/*8BAXn*A+W+?CO8b-FrBDd');
define('SECURE_AUTH_KEY',  'E((a,Svl{P3nf-3p /*Ad{d2Mxse<WL)d(V@SKS4QO:C!8Il{>xk`+K-Mk6&jw]X');
define('LOGGED_IN_KEY',    '!IO6f[dc0zy,,IAZksSdr.Y6k/zb]$-nhWq@z,BiSfsy2q~_=1Lx!--{?(X}JOL&');
define('NONCE_KEY',        'BA1Du1)^pP]]/Hv8[p# sId~hh~hb<B<4n_@CU(P1=]sujP0V`GA+(gKmA2CHkp_');
define('AUTH_SALT',        '}n;}aDz8s!X$i4%7E}tW%XgVZ6#iwK//W[d(z^F*HdjqHxzF5k`A&->BJftMi8QE');
define('SECURE_AUTH_SALT', '&w^]9AHuL)U>JPySGLuFrX4FbB=|658|g(D@}G(HNmOK2)Seo6)~xC4~2Z~g/N8k');
define('LOGGED_IN_SALT',   'g#]/#uVz1u3g?Gjp#lny,auL.H#&F5w&0^#FsYrQFH?,l;pnh!cRsTa*31bdLAYJ');
define('NONCE_SALT',       'tr ,Xpr.tSlC<#bXugzMs@/%4;h49j:m4&&]kwEoNY`~5Gv~c3<b9B90,Mrx/ljO');

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
