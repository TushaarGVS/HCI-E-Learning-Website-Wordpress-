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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'Ab2abxyZ');

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
define('AUTH_KEY',         'KjB-bPB:0N5c[[.VZbPi8RnDsT58ouY}Y!tDC7`:9w_k<mLJR(P-q 9U51P^e{ O');
define('SECURE_AUTH_KEY',  'RmGYgOA/gNQ+Yq_QC&-t)Xf >~=C%/}#<)!/0$q^r4_+Ai%8)1hB e%9%Tg)$P6g');
define('LOGGED_IN_KEY',    'bI|vj/CP3$T$bOAydBHUl-)GF4Y0nt$rWgVRY5i%jNm<ig[K-E!}1TGva4bWXPwB');
define('NONCE_KEY',        '323}uJHPqVg1]G:2nQ_Sg<}56OxmIBk3(NEf6se1E:4*YcpQR}8[HHCIX=jvHoSy');
define('AUTH_SALT',        'br2at KBA6]VZ)<-ITK~Z1=k|izipGt)WYX1CdR4S3iL^{C>0EjaJTlpa1_DnXuD');
define('SECURE_AUTH_SALT', 'zHj#LN0^Pwe2~J% Y4AWV&V%V8;e2V6C}6pdxiiLD UZ6_@l5=}[[3?B[mp|:fI)');
define('LOGGED_IN_SALT',   'X)O+W_v{o~w0w/RED#l[$<_>([[BFhfy!Te*Tunt*<pMD2v4A;~tXA,%eB42iAXF');
define('NONCE_SALT',       'MBs h8$O#[!M1Oa.cXw~fTf#RO4N;0}%%q@-0AO%Xhf,h_z$}t/1!?QR#PCLk;W`');

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
