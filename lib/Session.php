<?php
	/**
	 *
	 */
	class Session
	{
		public static function init(){
			session_start();
		}

		public static function set($key, $value){
			$_SESSION[$key] = $value;
		}

		public static function get($key){
			if (isset($_SESSION[$key])) {
				return $_SESSION[$key];
			}else {
				return false;
			}
		}
		public static function destroy(){
			session_destroy();
			header("Location: /admin/login.php");
		}

		public static function checkSession(){
			self::init();

			if (self::get('login') == false) {
				self::destroy();
				header("Location: /admin/login.php");
			}
		}
		public static function checkLogin(){
			self::init();

			if (self::get('login') == true) {
				header("Location: /admin/index.php");
			}
		}
	}
 ?>
