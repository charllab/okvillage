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
 * @link    https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// Project root path
$root = dirname(__DIR__);

// Composer autoloader
require_once $root.'/../vendor/autoload.php';

// dotenv
$dotenv = new Dotenv\Dotenv($root.'/../');
$dotenv->load();

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', getenv('DB_DATABASE'));

/** MySQL database username */
define('DB_USER', getenv('DB_USER'));

/** MySQL database password */
define('DB_PASSWORD', getenv('DB_PASSWORD'));

/** MySQL hostname */
define('DB_HOST', getenv('DB_SERVER'));

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WP_HOME', getenv('SITE_URL'));
define('WP_SITEURL', getenv('SITE_URL').'/wordpress');

define('DISALLOW_FILE_EDIT', true);

define('WP_AUTO_UPDATE_CORE', true);

define('DISABLE_WP_CRON', true);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'DB~suaQY2?`@m;h%A/l7,Jh<;+{-9$M??I1fe2U<tJ*XErcn1zS#i]ZC.e@`etxc');
define('SECURE_AUTH_KEY',  '~B{ak(yXjfG=~o?[-$SY#!IG-@6[-^GE@.BGy6p(377(|9)xpao0~}xmP+1A+FB%');
define('LOGGED_IN_KEY',    'U_lj 67|r.i@X.k,fT1Hnr)%%E+Ob.W6Vqj+A<:mkXq~yE:;hYY.UXtMB!_k ?y:');
define('NONCE_KEY',        'LEDhhTY.#-v7ZYDUUr6$4llSgO:-*WiS|8PI%J:@|xsfb7ICo&M(_v$M|=+_[2.9');
define('AUTH_SALT',        'pw$(kJ]~zLKL$}bM6@L#Er^n#MPv<m(MfTgc$7*Kd^cWIU;oavq(y(,Xa,ij7}fm');
define('SECURE_AUTH_SALT', 'A3)L$z:qOVv|,&7/mFRcS{htm(PWr|w.`Fs<+q>6Jx|Z=bKI![+!p;O8GuU&5EqR');
define('LOGGED_IN_SALT',   '}2Qr?2jVVBi?pM>a#QYG|l m7tR<|tIE+5;v1CrI+]s%^=y[d|CPLAnVT<+e+|`.');
define('NONCE_SALT',       '%.d_kV[2z|5Aphst`=7ZtI5 Z3uF2-vx2d:x](5: 7RS~|T)}2;a#5cww_HhEPk/');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = getenv('DB_TABLE_PREFIX');

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
define('WP_DEBUG', filter_var(getenv('DEV_MODE'), FILTER_VALIDATE_BOOLEAN));

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__).'/');
}

/** Sets up WordPress vars and included files. */
require_once(ABSPATH.'wp-settings.php');
