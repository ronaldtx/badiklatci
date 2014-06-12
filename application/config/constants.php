<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

/*
    VARIABEL TAMBAHAN
*/

define('TITLEAPP', 'BADIKLAT');
define('BREADCRUMBDEF', '');
define('FILEFOLDER', 'folderupload');
define('UPLOADPATH', 'D:\\xampp\\htdocs\\badiklatci\\folderupload\\');
define('LIMITPAGING', 20);
define('BASEURL', 'http://localhost:8080/badiklatci/');

/*SETTING DB START*/
define('HOSTDB','localhost');
define('USERDB','root');
define('PASSDB','gakpake');
define('NAMEDB','badiklat');
/*SETTING DB END*/

/*SETTING EMAIL START*/
define('EMAIL_ADMIN','email@admin.com');
define('FROMEMAIL','Notifikasi Request barang');
define('PROTOCOLEMAIL', 'smtp');
define('HOSTEMAIL', 'ssl://smtp.googlemail.com');
define('PORTEMAIL', '465');
define('USEREMAIL', 'email@email.com');
define('PASSEMAIL', 'password');
/*SETTING EMAIL END*/


/* End of file constants.php */
/* Location: ./application/config/constants.php */
