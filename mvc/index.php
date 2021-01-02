<?php  

/*
bước 0 : xác định chức năng có 
	url đăng nhập 							.login
	url thêm , sửa ,xóa , update 			.them .sua .xoa
	url xem chi tiết 						.htm

 bước 1 : kiểm tra url 
 bước 2 : xác định kiểu url và .đuôi
 	2.1 : cắt lấy .đuôi 
 	2.2 :
	ok
*/

require_once 'config/connect.php';

if ($_SERVER['REQUEST_URI'] == '/' || $_SERVER['REQUEST_URI']=='/index.html') {require_once 'view/home.php';}
	
	$url = trim($_SERVER['REQUEST_URI']);
	$url = explode('.', $url);

	$ext = array_pop($url);

	switch ($ext) {
		case 'login':
			require_once 'view/user.php';
			break;
		case 'them':
			require_once 'view/them.php';
			break;
		case 'sua':
			require_once 'view/sua.php';
			break;
		case 'xoa':
			require_once 'view/xoa.php';
			break;
		case 'htm':
			require_once 'view/htm.php';
			break;

		default:
			require_once 'view/error.php';
			break;
	}

?>