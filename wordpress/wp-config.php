<?php
/** 
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information by
 * visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
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
define('DB_NAME', 'zzzzz');

/** MySQL database username */
define('DB_USER', 'leth4l');

/** MySQL database password */
define('DB_PASSWORD', 'trustno1');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',        'YLnwDz1[aF^9}!+n+81N`nTP}U^ fq`~YV8M>RH.T+[=HpAU3P3ZGb^[|Q@Yrw@G');
define('SECURE_AUTH_KEY', 'Mx:->+lU*)v58s|hNYM[Od33bJXC%@k0nv[/gbH{QR<N_SHk`-|y]>EsYoYd<x)+');
define('LOGGED_IN_KEY',   '5A<!Gruo*,<VoWM2Ub+:W7|<]23C_-OXYu$-7N2M`61USi]gXpEOx|inv!.~n37a');
define('NONCE_KEY',       'r`h|-%e@v=1f$?59)RcugH{%=$/Bq,}{(T_!bW6BnH;_CynNDz-Y+SL[D`UXn`q&');

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
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', '');


/* Multisite */
define('WP_ALLOW_MULTISITE', true);
define( 'MULTISITE', true );
define( 'SUBDOMAIN_INSTALL', true );
$base = '/';
define( 'DOMAIN_CURRENT_SITE', 'nizlog.spalanca.com' );
define( 'PATH_CURRENT_SITE', '/' );
define( 'SITE_ID_CURRENT_SITE', 1 );
define( 'BLOG_ID_CURRENT_SITE', 1 );
define( 'AUTH_SALT', '.OxkK21n1KMvAq+Gi9-p]Z+!=E!K@|#YL_UcG>1emEmYoH|J@fFG#1x/H|Zg|VA~' );
define( 'SECURE_AUTH_SALT', '?*GDr7&913JnGM.uI)xI#uzcK95YNZ(KoB12s{sP1&hwkkannx=GHl(KI3b_*ORG' );
define( 'LOGGED_IN_SALT', '66/%%~erH-b1.zM1]&ni4!SH^T5gX]!~8,M`(ecxWQd^X=1A8_)9Ht5>5INbGRbB' );
define( 'NONCE_SALT', 'TIePD`I!?,F2pXCAguKrn&r*pjD3FZ5IvQag[W3y`|s~zC,(5bd/j4|Se H kBja' );

/* That's all, stop editing! Happy blogging. */



/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
