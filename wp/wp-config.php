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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
if (isset($_ENV['DATABASE'])) {
  define( 'DB_NAME', $_ENV['DATABASE'] );
}

/** Database username */
if (isset($_ENV['USERNAME'])) {
  define( 'DB_USER', $_ENV['USERNAME'] );
}

/** Database password */
if (isset($_ENV['PASSWORD'])) {
  define( 'DB_PASSWORD', $_ENV['PASSWORD'] );
}

/** Database hostname */
if (isset($_ENV['HOST'])) {
  define( 'DB_HOST', $_ENV['HOST'] );
}

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         '_8U/pXMkLThX}IU-|KT_@<Tn|H&,fOS*h|SYl]qPZ,QU&,j>B_[Y+,c> b[AA;jh');
define('SECURE_AUTH_KEY',  '?8(6/+HI+dn`>C?$zW&=~TzG+P%h%m/R2pPzuSf4,d:CjG9<R4#,B7`x/RK<rcSL');
define('LOGGED_IN_KEY',    '_hGV%R$%Oxu^=-4D]t4C%yv*|BhC7t@ylS}6puOyyA}80r?89uOcv]0azxX/21+>');
define('NONCE_KEY',        '!!Rf6/>!-GkY;[J2R&t,/]l0,^E%9C7V,oa@/^F?Cj^yn![=fVs:RX;K7-FZiL$p');
define('AUTH_SALT',        'O 9JSW1}}E;;9BE{J-|]+UzhxU{-nLp.TMr93AQbmV|8-hZ#kZdWKfl`u}YEa~5D');
define('SECURE_AUTH_SALT', 'J+5{]uV{RkAN/&~XE?aBV|waG6_f<8f/yh$FKo@nvM0tr>;R*{(-C!rA|F^2uk1B');
define('LOGGED_IN_SALT',   '+;qPk}a&ix8}[aVtiKKk,?L3N db7}A&}Nn.iQRo:y?&/lvs8 ,&yvNS~F:AQZ;2');
define('NONCE_SALT',       'pe`u!!yN@fCphtB9dxA6pk^+>Ti@*<ZnPW3j9u|ynGk%0[w[D8[R:?=kpl/I7usR');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = isset($_ENV['TABLE_PREFIX']) ? $_ENV['TABLE_PREFIX'] : 'wp_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */

define('MYSQL_CLIENT_FLAGS', MYSQLI_CLIENT_SSL );
$_SERVER['HTTPS'] = 'on';

// Değişiklikler kalıcı olmayacağından dosya değişikliğini devre dışı bırakın.
define('DISALLOW_FILE_EDIT', true );
define('DISALLOW_FILE_MODS', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
