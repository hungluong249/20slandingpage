<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/**
 * FIXED TOUR CATEGORIES ID
 */
defined('FIXED_DOMESTIC_PILGRIMAGE_CATEGORY_ID') OR define('FIXED_DOMESTIC_PILGRIMAGE_CATEGORY_ID', 22);
defined('FIXED_INTERNATIONAL_PILGRIMAGE_CATEGORY_ID') OR define('FIXED_INTERNATIONAL_PILGRIMAGE_CATEGORY_ID', 23);

/**
 * FIXED POST CATEGORIES ID
 */
defined('FIXED_SHARED_CORNER')        OR define('FIXED_SHARED_CORNER', 19);
defined('FIXED_NEWS')        OR define('FIXED_NEWS', 15);
defined('FIXED_ARCHIVE_LIBRARY')        OR define('FIXED_ARCHIVE_LIBRARY', 16);

/**
 * FIXED POST CATEGORIES ID
 */
defined('FIXED_ABOUT_US')        OR define('FIXED_ABOUT_US', 22);

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
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code



/**
 * HTTP Success code
 */
defined('HTTP_SUCCESS') OR define('HTTP_SUCCESS', 200);


/**
 * HTTP Error code
 */
defined('HTTP_BAD_REQUEST') OR define('HTTP_BAD_REQUEST', 400);
defined('HTTP_NOT_FOUND') OR define('HTTP_NOT_FOUND', 404);


/**
 * Message Success code
 */
defined('MESSAGE_CREATE_SUCCESS') OR define('MESSAGE_CREATE_SUCCESS', 'Thêm mới thành công!');

/**
 * Message Success code
 */
defined('MESSAGE_CREATE_ERROR') OR define('MESSAGE_CREATE_ERROR', 'Thêm mới thất bại!');

defined('MESSAGE_CREATE_ERROR_VALIDATE') OR define('MESSAGE_CREATE_ERROR_VALIDATE', 'Lỗi thêm mới cấu hình vui lòng thao tác lại.');


/**
 * Message Success code
 */
defined('MESSAGE_UPDATE_SUCCESS') OR define('MESSAGE_UPDATE_SUCCESS', 'Sửa thành công!');

/**
 * Message Success code
 */
defined('MESSAGE_UPDATE_ERROR') OR define('MESSAGE_UPDATE_ERROR', 'Sửa thất bại!');

defined('MESSAGE_UPDATE_ERROR_VALIDATE') OR define('MESSAGE_UPDATE_ERROR_VALIDATE', 'Lỗi sửa cấu hình vui lòng thao tác lại.');


/**
 * Message Success code
 */
defined('MESSAGE_REMOVE_SUCCESS') OR define('MESSAGE_REMOVE_SUCCESS', 'Xóa thành công!');

/**
 * Message error code
 */
defined('MESSAGE_REMOVE_ERROR') OR define('MESSAGE_REMOVE_ERROR', 'Xóa thất bại!');

/**
 * Message Success code
 */
defined('MESSAGE_ISSET_ERROR') OR define('MESSAGE_ISSET_ERROR', 'ID không tồn tại!');
/**
 * Message Success code
 */
defined('MESSAGE_ISSET_CONFIG_ERROR') OR define('MESSAGE_ISSET_CONFIG_ERROR', 'Cấu hình không tồn tại!');

/**
 * Message check id product category 
 */
defined('MESSAGE_ID_ERROR') OR define('MESSAGE_ID_ERROR', 'ID phải là số và lớn hơn 0');

/**
 * Message Success code
 */
defined('MESSAGE_EDIT_SUCCESS') OR define('MESSAGE_EDIT_SUCCESS', 'Sửa thành công!');

/**
 * Message Success code
 */
defined('MESSAGE_EDIT_ERROR') OR define('MESSAGE_EDIT_ERROR', 'Sửa thất bại!');
/**
 * Message Success code
 */
/*==============================
=            Message for Create            =
==============================*/

/**
 * Message Photos are too large code
 */
defined('MESSAGE_PHOTOS_ERROR') OR define('MESSAGE_PHOTOS_ERROR', 'Hình ảnh vượt quá %u Kb. Vui lòng kiểm tra lại và thực hiện lại thao tác!');

/**
 * Message Pfile extension
 */
defined('MESSAGE_FILE_EXTENSION_ERROR') OR define('MESSAGE_FILE_EXTENSION_ERROR', 'Đuôi file image phải là jpg | jpeg | png | gif!');

/**
 * Message foreign key link check product category and check product
 */
defined('MESSAGE_FOREIGN_KEY_LINK_ERROR_PRODUCT') OR define('MESSAGE_FOREIGN_KEY_LINK_ERROR_PRODUCT', 'Category vẫn còn %s tour và có %s category là con nên không thẻ xóa!');/**
 * Message foreign key link check product category and check product
 */
defined('MESSAGE_FOREIGN_KEY_LINK_ERROR') OR define('MESSAGE_FOREIGN_KEY_LINK_ERROR', 'Category vẫn còn %s bài viết và có %s category là con nên không thẻ xóa!');

/**
 * Message foreign key check product category and check product
 */
defined('MESSAGE_FOREIGN_KEY_ERROR') OR define('MESSAGE_FOREIGN_KEY_ERROR', 'Floor vẫn còn %s Bàn nên không thẻ xóa!');


/**
 * Message file extension
 */
defined('MESSAGE_FILE_EXTENSION_ERROR') OR define('MESSAGE_FILE_EXTENSION_ERROR', 'Đuôi file image phải là jpg | jpeg | png | gif!');


/**
 * Message deactive banner
 */
defined('MESSAGE_DEACTIVE_BANNER_ERROR') OR define('MESSAGE_DEACTIVE_BANNER_ERROR', 'Bạn phải tắt banner!');
defined('MESSAGE_ERROR_BANNER_ERROR') OR define('MESSAGE_ERROR_BANNER_ERROR', 'Không thể tắt!');

/**
 * Message file extension
 */
defined('MESSAGE_EMPTY_IMAGE_ERROR') OR define('MESSAGE_EMPTY_IMAGE_ERROR', 'Bạn phải chọn hình ảnh');
/**
 * Message file extension
 */
defined('MESSAGE_REGISTRATION_SUCCESS') OR define('MESSAGE_REGISTRATION_SUCCESS', 'Đăng ký thành công!');
/**
 * Message file extension
 */
defined('MESSAGE_REGISTRATION_ERROR') OR define('MESSAGE_REGISTRATION_ERROR', 'Đăng ký thất bại vui lòng thao tác lại!');

