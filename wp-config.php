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
define('DB_NAME', 'wfmovies');

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
define('AUTH_KEY',         'wLu/DFyMXP38nfYXDT-K5{ywd<eJgPiKVg^h5%T(CK/PlP_JjQL,7l-pncwchk/?');
define('SECURE_AUTH_KEY',  '#bzomMib+}7~SLsn mmMBOa,yu2p+#Ad~04`RF4][SPJ=ViB4[?Z!O|VS.]k$iND');
define('LOGGED_IN_KEY',    '||}I1pJ6#**L[w{y F],-B|yXw35?:r2lhIh:rQ6l9yW&8nnHCc?RKgdF4@A:=YE');
define('NONCE_KEY',        '4v)3$Fg0P(4YUs0v1wu}ih-< [$<:cr/m?46-78}tc .R0L_B]Kbt>NRz?oela$7');
define('AUTH_SALT',        't^~sl6R.+^7U&GBR%cVA~WRe$r5u&C<et%+c,yp+Ze!U=,:vJnV%LyB5w*9A/ZR`');
define('SECURE_AUTH_SALT', '|l1u^fS^kA3es!md`zekY8-;jNUc~`pXBSh0R(,uj]N=dD^6MA$&]]zP3$J(<Ut6');
define('LOGGED_IN_SALT',   '?Zu=sdtK9LWcGsa9F.C1Jyo>t(#y=RB_~]b:fs3bjVVjN%-:j;y6V/6~.1^+!B0i');
define('NONCE_SALT',       'pa+&TS?M>W}/kjUjAB$juc?k@$ZWoR0K_wddA)TCRLP{j/B`EDKfz.K(J-0kkN/P');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wfm_';

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


// n'accepter que les correctifs en mise à jour
define("WP_AUTO_UPDATE_CORE", "minor");

// eviter les modif de client interdessant installation d'extension et de thème
define("DISALLOW_FILE_MODS", true);
