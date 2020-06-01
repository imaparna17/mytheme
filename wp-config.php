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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'IM4KsyoOr6I3x+9Hk4jjEMwlrLXbPwXK6uLp+2MLHsBOe/QANAT6a420SQ2ZxQQVVt6L6J5+IoTnQIGyrFtXvw==');
define('SECURE_AUTH_KEY', 'gFGUR3ooW/dIxXh1r+cLP2SJJIKmxJOqfhDSEAZBFoS5L5m54OjqQ0xNANSJcAIiH1SpItWrIkgyC9834yj8GQ==');
define('LOGGED_IN_KEY', 'lrY8cNKnng+IeAqPvUMt/Yk4/PWcunoYQNGDokGVTCg5VqrDK9HswRvzrxO/cv9Q2/K46Y//QOcjBa/CjJZv8A==');
define('NONCE_KEY', 'va/WnmX+TuTNwfW643UC7H/DI09FJppbmR8W17x3cNj99q/NIfh1G0FSz1JPj8/KMrUyrz9Th0WIFs63dSXsFA==');
define('AUTH_SALT', '2sLV+Us7Yf4hLVIzPq6KdA6/vHpsgOhDXd0dW2tABXZpYmiyaQpSnPLa7eGZkHQ3TEeZzxtccqwfLffASzWK8A==');
define('SECURE_AUTH_SALT', 'FWAEO8mgShN0XSdoIiCRl8uRZofJVz4E+bZEN7peQSgvTceU3UyK90H45cqDPUNvjkTMT7UG+MMbUvduHzUakA==');
define('LOGGED_IN_SALT', 'G4NTjTicfb7Tb5yV4fse4ioSG+dOH/iko2/kO/xgLbnlDYrWRkOGrXKdRMF+gcUztmdb3d/HomF67CcjTxbW2w==');
define('NONCE_SALT', 'L59H/VL232pBClHGhA0bgInXg2YD7IneiOGSfAVWWWqA5+GLtnlAYjhonAOBxGMAdNyyk/iSXueEwnzE3ihcHA==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
