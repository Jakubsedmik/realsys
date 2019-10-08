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
define( 'DB_NAME', 'realsys' );

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
define( 'AUTH_KEY',         '<H+A~Z3y:hEJKq^t?04I4]o7#?F6AX}dxiRFk`KAFT6n)nRs>R_kN/k:E;D=ga6b' );
define( 'SECURE_AUTH_KEY',  '>U,Y*WL@aT5Ls}Br]H!O{KfTl )+iqLHL|g<H$LlMB&4<jI;&4c}*QwbBDJf_V/a' );
define( 'LOGGED_IN_KEY',    '>8<1E%lKF;4d%Qi}AkLLV<%7)P1$(c/o),FX%5;x-pMF_k!aN%fR#Rs_k>%X=]q0' );
define( 'NONCE_KEY',        '|ZVibC5h(<>ur1gKvj~{n>3}v](HMxnIw44sV7h{YU.XAiIodAX%`|cr)])=rF9t' );
define( 'AUTH_SALT',        'M}yko8zx[2mLf$x{oc%4#Sc!}h3q|uE+UBtpoie2Qj8wP=Zy(F34kFTM>ucu6#0h' );
define( 'SECURE_AUTH_SALT', '#|zIkXC_jS}{)$r9n9Cd~PN88M/EH`p)={@AvVL)5prLG/3:Q&*Ez@Ef,t;7.g%>' );
define( 'LOGGED_IN_SALT',   ']6l1d (t}+Y8#4dcV8LEELAs,3@/~}k):Ljn<pZ4*}j-@t+=pVZ,-eMaPr`[o2-u' );
define( 'NONCE_SALT',       'N*M+-/f0 vCz$MI7gm0jDOZw9XNFmg#pcL~,1+N!U#O@Sj|`k1qBWC3;H df~bsL' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', true );
define ("WP_ADMIN_DEBUG", true);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
