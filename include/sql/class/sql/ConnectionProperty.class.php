<?php

class ConnectionProperty{
	private static $host = 'localhost';
	private static $user = 'root';
	private static $password = '';
	private static $database = 'nur';

	public static function getHost(){
		return ConnectionProperty::$host;
	}

	public static function getUser(){
		return ConnectionProperty::$user;
	}

	public static function getPassword(){
		return ConnectionProperty::$password;
	}

	public static function getDatabase(){
		return ConnectionProperty::$database;
	}
}
?>