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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'clima620_gestalt' );

/** Database username */
define( 'DB_USER', 'clima620_gestalt' );

/** Database password */
define( 'DB_PASSWORD', '@psico2023' );

/** Database hostname */
define( 'DB_HOST', '108.167.132.60' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '6.l[}ce.-ct0^, 3`K8bWUH]C1QENIlS%8~>f|D-/Hr<^Q?`}XepTaA>NOEb[1QD' );
define( 'SECURE_AUTH_KEY',  'Aek>=c!=4ub}?/>I_>R{naa@&X:9o]8_H}{5EuN!eP:ofJA;s{lK76:-8Mk%OeEF' );
define( 'LOGGED_IN_KEY',    '}@D6p5Sb;B C =|E-=BQk/)zS)~fx*~VJnZb7)YF]9}=0j0]W6S$af^i#]5n07va' );
define( 'NONCE_KEY',        '$EW-+@%pvP}qF5|E@Pqh/pQx%P.(:5kv>_Hx&^$R@[da~Nr[h7D5os?2biC,55aZ' );
define( 'AUTH_SALT',        'T~NUgvSp0q>RhWM0T^v^oX*6+Sm-]>z6a4YwYK@O~tdI8#Zh8yUdv9EtaJZdAq?u' );
define( 'SECURE_AUTH_SALT', '!tDT;T7ad:vD]Ss6Up=T_q+W3FD(+{Kl>o.Ft4&yA>`^lDY[Wl4N_w%EcD4Vs(px' );
define( 'LOGGED_IN_SALT',   'M:ip<z9~b}9IW :T:#02OL)PX^=g`)=mn5yr98f-JOR+Y#$fh1z<-g{N,s5ym8(7' );
define( 'NONCE_SALT',       '}#!%2Y9+bLQuRoRzZ4tjzUCu-<cA^SYq9kCE$qeem2_ZLCaEdcnP09a=s=sn!W/O' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_psico';

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
