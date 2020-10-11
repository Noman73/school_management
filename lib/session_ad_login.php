<?php

class session_ad_login{
	public static function init(){
		if(version_compare(phpversion(), '5.4.0','<')){
			if (session_id()=="") {
				session_start();
			}
		}else{
			if (session_status()==PHP_SESSION_NONE){
				session_start();
			}
		}
	}

	public static function set($key,$val){
		$_SESSION[$key]=$val;
	}

	public static function get($key){
		if (isset($_SESSION[$key])) {
			return $_SESSION[$key];
		}else{
			return false;
		}
	}

	public static function checkAdminLogin(){
		if (self::get('admin_login')==false) {
			self::logout();
		}
	}
	public static function checkTcrLogin(){
		if(self::get("tcr_login")==false and self::get("admin_login")==false){
			self::logout();
		}elseif (self::get('tcr_login')==false and self::get("admin_login")==true) {
			self::set("tcr_login",true);
		}
	}

	public static function logout(){
		session_destroy();
		session_unset();
		header("Location: admin_login.php");
	}
}

?>