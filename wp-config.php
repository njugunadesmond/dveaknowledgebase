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
define('DB_NAME', 'dvea');

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
define('AUTH_KEY',         'c%IQAqC4YcF&;VtO;Lb0cy/a%a*3Nu_1uC&lx5gZ<xx@NvAj,VH+J~cszl`kK6m.');
define('SECURE_AUTH_KEY',  '4gqx7$>j)ZrEJD-? &eAPxPlBrx7$_)@FaEhH,V[I%uWY:k0kSz.V>~dcg-[6Z|I');
define('LOGGED_IN_KEY',    'J-Aa0e-mLLHnewHs[~sWH90|HVX3&j9/@+%, DLii47vBwVA6%0n819${eEsmf!Y');
define('NONCE_KEY',        '>cyeK9qhH^?m(]Aobp8Fl?)P$O6w/g*lRIJ5}qgL}^#)%/p+*f+XIRE(BK4ab^z5');
define('AUTH_SALT',        '5AX-<2gW=hm[rF^gz,w!HjL*~?oX1:@!vP+kkR;YO~^nv`wuC}Ns|`YPPXNi 0_*');
define('SECURE_AUTH_SALT', 'a:4=<IDK}f+2{`ul<BLSuD$X_id@6n[)GH&PWfV#0]1D|BxwCW]A eYVM+{Jh5Cj');
define('LOGGED_IN_SALT',   '#sZ%RqGB;tDg(8ZzWFMcng.[!N=3eS~p[t|AS;:7NE<z8|SO9y[%I*.CE@P }~J#');
define('NONCE_SALT',       'L|e0o;i Y(>x6@/*l|bD|43:yzMCF{vNjT2_ALq@pc?P3 -~dMj&i#e|P{&x/QDf');

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
