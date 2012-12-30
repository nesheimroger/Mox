<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'mox');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'lURVB_|2+|H`NyH[#jWeB!v[Gp`wh}A_,aJ~|oVzUC9o B*BF+wkUCF`bc7p[FZ8');
define('SECURE_AUTH_KEY',  'lm=+0Bb|USVM]k#(cS.VeMaV$]>T5)<Il1HN]%9n|}@01cskuc(?!WCJKfyaeWb~');
define('LOGGED_IN_KEY',    'rdm8M+gWM(eZYWbLVhEg&uv39ELGdem-Qk+U-:bK~84]oGY1rrE)b{0Rp!4*DtP$');
define('NONCE_KEY',        '[s gfIglUWAA55K#qW0qyLO2&qyCo?$L]v$434-TgHm@CHKLtA=$HX|)Td4%enXv');
define('AUTH_SALT',        'h>R2hBuh[`A%_v2eH+P:s(-|/(}-N#A_,8ai!M|<#sBKT!cq )CBziVtg#{2THbC');
define('SECURE_AUTH_SALT', '+Az_eA..D*|E-J_f-zSN-.Lg[^n%Xeo!=t{]V/;&Fd.|%JAreT`S+enO2!8#o(WY');
define('LOGGED_IN_SALT',   'YeQ,-LTb}YzU,Q%P&T)5D{|M+p}8ZkTMR2=bgl3TR{E|nop78$RN4DxigN}*Im5*');
define('NONCE_SALT',       '-Q|StlJ&dL`L|U;M;.sUbV`>9vx!E>Yt]1q|XAQZd8{:9$BiG^4iR/S>36cb[xWE');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
