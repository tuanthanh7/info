<?php
/**
 * Cấu hình cơ bản cho WordPress
 *
 * Trong quá trình cài đặt, file "wp-config.php" sẽ được tạo dựa trên nội dung 
 * mẫu của file này. Bạn không bắt buộc phải sử dụng giao diện web để cài đặt, 
 * chỉ cần lưu file này lại với tên "wp-config.php" và điền các thông tin cần thiết.
 *
 * File này chứa các thiết lập sau:
 *
 * * Thiết lập MySQL
 * * Các khóa bí mật
 * * Tiền tố cho các bảng database
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Thiết lập MySQL - Bạn có thể lấy các thông tin này từ host/server ** //
/** Tên database MySQL */
define( 'DB_NAME', 'clb_test2' );

/** Username của database */
define( 'DB_USER', 'root' );

/** Mật khẩu của database */
define( 'DB_PASSWORD', '' );

/** Hostname của database */
define( 'DB_HOST', 'localhost' );

/** Database charset sử dụng để tạo bảng database. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Kiểu database collate. Đừng thay đổi nếu không hiểu rõ. */
define('DB_COLLATE', '');

/**#@+
 * Khóa xác thực và salt.
 *
 * Thay đổi các giá trị dưới đây thành các khóa không trùng nhau!
 * Bạn có thể tạo ra các khóa này bằng công cụ
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Bạn có thể thay đổi chúng bất cứ lúc nào để vô hiệu hóa tất cả
 * các cookie hiện có. Điều này sẽ buộc tất cả người dùng phải đăng nhập lại.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'W;KP_-9Xs4hbme4Q0eboI-59>7_R NbbMf=WB$o9~EQ2{7a|4^d4q(m+X6e5 jrt' );
define( 'SECURE_AUTH_KEY',  'Pc)~3y]ae< i4V{Jzc+kREri$rV9 n-m|sMv)]@3]W{].D91pTl|,~6yW@An]OXm' );
define( 'LOGGED_IN_KEY',    '_5j1*C{[D/JFVJ<QeIZM}T)owP2tzZt^F{j8.fZ]|:?r)^}cwt[&C5GJOJeBg5@=' );
define( 'NONCE_KEY',        'hM5F[r|ft61xI[`F~O[wYhI$}c}VS_J? !VNkUuut70a vYrBft]#9un.MFwT[ k' );
define( 'AUTH_SALT',        'mlpf6-kJ>8f4V5D A}}vFrtO[QB=^*l{?uLC pI*VUv#1iVM_Wm(TfdO]lyHC)mo' );
define( 'SECURE_AUTH_SALT', '@T1l{,{GmE2eT+xo?|b4r32qr]ohas^G2O=^c-*nmzG=Szxfe1vb?0TN/#2^nD9<' );
define( 'LOGGED_IN_SALT',   't AY{,yxsncw>S@b7uNq;dtWAQL~:u!w<*61qb8a&#)pmVi_9uB%*Sf!tUwHjy64' );
define( 'NONCE_SALT',       'PVvw-Q1H]sn/k2e3Q}GBm*0Zi~UCu@x5e$Hz9@9JYE%JImh!lNpVnfYg-mlh#uAR' );

/**#@-*/

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix = 'wp_';

/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');
