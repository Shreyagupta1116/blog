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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'extrapow_restaur' );

/** MySQL database username */
define( 'DB_USER', 'extrapow_restaur' );

/** MySQL database password */
define( 'DB_PASSWORD', 'extrapow_restaur' );

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
define( 'AUTH_KEY',         ',~Pn)5:DK5`[M>[0XiQONHDe!DY|OT:Z.1uOZkwy6isHm8Xonq$Z8lT<c63VN5#Q' );
define( 'SECURE_AUTH_KEY',  'ao&YFlmaR~NAX2R)!!g2//F7{>`Zv,]S%C $2&>Zrdy? %2|dI1~^,%TAQFg=1%z' );
define( 'LOGGED_IN_KEY',    '!#|<|Q&J8HffI` ZLz5Us9)<7l7_SO)Gr(sMs9TZ!C$2wj2Fc bX~wIN@|UMNLF,' );
define( 'NONCE_KEY',        '8%r]f f%|SMu|ft,mRtOpjbG>Rn0xSh7BYh6TnJ:^S,:oQ4^PpUKRf):^y!qpI(6' );
define( 'AUTH_SALT',        'b`b}2D,-XF./fGuJ/yl?/.gSx>F[&t(y8s:b<}d(o?x{gDZjNuqToW7$/[l4@+<Q' );
define( 'SECURE_AUTH_SALT', '%p<u o}:Hhg.0tn1u)t<5]8r]L/(q^:dKWMXP<0R?1]eqt,u9i.Tr+/[np *fr,]' );
define( 'LOGGED_IN_SALT',   '#1NSPcU9Rt^V;fx?UBYwYp9W}6YA&~n0@|I7RO?`eN$ trf?%86KY$:-Bu3Kc0u`' );
define( 'NONCE_SALT',       'd7sgG=y{Wh@.]&?kvPAWr#~~ 5U5D5B*@c_gmn-e9]K=KStTghNh&0yXSK-d]5XJ' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'rest_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
