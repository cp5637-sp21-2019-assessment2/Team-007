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
define( 'DB_NAME', 'jcucmsx1_wp51676' );

/** MySQL database username */
define( 'DB_USER', 'jcucmsx1_wp51676' );

/** MySQL database password */
define( 'DB_PASSWORD', '1]h0[6QSqp' );

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
define( 'AUTH_KEY',         'sadntdssslgoyiq67euck5aldpwd32nfgbvbde5qotkktvg2hueyvhoeofw78z3o' );
define( 'SECURE_AUTH_KEY',  'rlpdwd3oqmdauvfawcto0ynxznan57u5reytaenhv0z5lzrzpzbdtj5skm4fsm3r' );
define( 'LOGGED_IN_KEY',    '1eo4why5fjyks9zjz60t4x9k3mwhqkiqasv59od5zzqh8kwdypikgepgh8qsa0jf' );
define( 'NONCE_KEY',        'mhgn4w6ibns1wxuvujpwwr2gvpamebwjjfkh2uvsmbx8v1gdxpruq1s9vagflffs' );
define( 'AUTH_SALT',        'xahv3rhaqwkxcpsz3ba4b50k7mruhpzoiutwxkgktwiikpv1k3tppn0l5exlgov6' );
define( 'SECURE_AUTH_SALT', 'pa5ykfqzkbdhvzd3rah9bixmagjzds0alh7sgl3bhepvtrlhhp9aolcgvqi6ojzw' );
define( 'LOGGED_IN_SALT',   'yf8xktb8gaunrpm2d3yigs1s7tehlrandivnwtomhegqhugjlwzbqeapytzjvgup' );
define( 'NONCE_SALT',       'v4bhaosmjqygclbiz3bhhgczqunc3m8boccwnt26rxsznp7cewwpdz1gvusq7clg' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpfm_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );