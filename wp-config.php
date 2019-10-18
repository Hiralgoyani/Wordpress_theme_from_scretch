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
define( 'DB_NAME', 'gymdemo' );

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
define( 'AUTH_KEY',         '`Vw9Gp/02*/&{Ej=EI}Ex-:LWoK#D{Ga9j{2,Hf0=LlTT|%:/L]tVIl_{zW}5*f>' );
define( 'SECURE_AUTH_KEY',  'ba,xo9-+GM2T`lyj,piwpKPS/W!<^&k6Q8b55Bq,cov0~;5&=qllnB|]w;,Yr~Kt' );
define( 'LOGGED_IN_KEY',    '+r~9=1/gLWRsQz=GoVVOfd)5~&$JTsjC|8lNg_[e}+,vgN]dLi}Z7(WO)<jr_`{=' );
define( 'NONCE_KEY',        ';#6n@EEo:=cK`C}wvF~ZSIvzDSY p(To07Le?&ruSJL`ZxAT_^B.ROvgpm}$Q`|p' );
define( 'AUTH_SALT',        'MNKeMyq%GLz okgVq|@?&6M}.[JV3d=a#a@3]Hz,:SQT{u^hTfx|;=rg8e[f3Xe_' );
define( 'SECURE_AUTH_SALT', 'Js,bA`}r~P(s@] neG)j3*W&BxFMW!n5KC*BvFPk**J.2yq:>;GK;Qj#<hB$+Si4' );
define( 'LOGGED_IN_SALT',   'qje&N75YEYYvb2WT_l35T2r$tf9M{-u.x~~@=b.xH?x>MPZaT2z5`J,`5fphk:tx' );
define( 'NONCE_SALT',       ';-vmz1y(/@*3#[/PSvCoZzPN(_0l[jBjgZ]erxCk)JwYBv.9JmoD_;(o!.)F({S7' );

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
