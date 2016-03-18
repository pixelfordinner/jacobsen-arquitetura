<?php

/*----------------------------------------------------*/
// Database
/*----------------------------------------------------*/
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
$table_prefix = getenv('DB_PREFIX') ? getenv('DB_PREFIX') : 'wp_';

/*----------------------------------------------------*/
// Authentication unique keys and salts
/*----------------------------------------------------*/
/**
 * @link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service
 */
define('AUTH_KEY',         '4eEAEu]iS>?o=2 q=^Zh).]t;Tr7!1f-U:v;tx]bVl6Qr3]C9>Wm76:%B36sk)Ch');
define('SECURE_AUTH_KEY',  '[1D{DYH5X4-L|;Lm4az^N&)H#WN=GDVW~3D0l5qnA;Qyo>Cdv4-GX}7#<I-/,/C5');
define('LOGGED_IN_KEY',    '|!gTQl},L(KJd2G36``BP$c+occ@PU6aNuAr;#+;Jf,$lPEc|180?#oh+|/HA`Ww');
define('NONCE_KEY',        'B87xcI?Vc2A,CYvI?6CX[g?(aYt,Jh;j>H=c2+z#Vm|xxVzr6xxj|3#e2lZc3w||');
define('AUTH_SALT',        'EPlh[_:u^iknj^QdL~7,IKQ3C&-p4$i#chWp@IEG<+0#)0M%LO]Ya1PZL*qx((8b');
define('SECURE_AUTH_SALT', 'Iw)o8uir;kpF+XF,jPPMC`QuKwvFS1k#Js{fmXC^@q4:5LUK; 6a;4G4nv0Hu5Vp');
define('LOGGED_IN_SALT',   'tT9SB6f5P^G+&A-QdNapHmcl]FZ~-OfIm{+LZ ^)Ulc)E-|mwPR #KT2|fG!puD:');
define('NONCE_SALT',       ':<dK+a6Y_&B&qKvIdrGLcpHQ:FDKw7$EA>MD^b$cERG9K%TWcJ(t1zurz4UF@A?o');

/*----------------------------------------------------*/
// Custom settings
/*----------------------------------------------------*/
define('WP_AUTO_UPDATE_CORE', false);
define('DISALLOW_FILE_EDIT', true);
define('FS_DIRECT', true);

/*----------------------------------------------------*/
// Reverse Proxy Detection (Docker)
/*----------------------------------------------------*/

if (!empty($_SERVER['HTTP_X_FORWARDED_HOST'])) {
        $_SERVER['HTTP_HOST'] = $_SERVER['HTTP_X_FORWARDED_HOST'];
}

if (!empty($_SERVER['HTTP_X_REAL_IP']) && (filter_var($_SERVER['HTTP_X_REAL_IP'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) !== FALSE || filter_var($_SERVER['HTTP_X_REAL_IP'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) !== FALSE)) {
        $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_X_REAL_IP'];
}

if (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
        $_SERVER['HTTPS'] = 'on';
}


/* That's all, stop editing! Happy blogging. */
