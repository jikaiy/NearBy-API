<?php

class DB_Functions{
	
	private $db;
	
	function __construct(){
		require_once 'DB_Connect.php';
		$this->db = new DB_Connect();
		$this->db->connect();
	}
	
	function __destruct(){}
	
	//public function loadLocation($name, $locationX, $locationY){}
		/*
		if(isNameExisted($name)){
			$insert = $insert = mysql_query("UPDATE location SET locationX = '$locationX', locationY='$locationY', updated_at=NOW() WHERE name = '$name';");
		}else{
			$insert = mysql_query("INSERT INTO location (name, locationX, locationY, created_at)VALUE('$name','$locationX','$locationY',NOW());");
		}
		*/
		
		/**
		 
		$insert = mysql_query("INSERT INTO location (name, locationX, locationY, created_at)VALUE('$name','$locationX','$locationY',NOW());");
		$insert = mysql_query("UPDATE location SET locationX = '$locationX', locationY='$locationY', updated_at=NOW() WHERE name = '$name';");
		if($insert){
			$result = mysql_query("SELECT * FROM location WHERE name = '$name';");
			return mysql_fetch_array($result);
		}else{
			return false;
		}
		
		*/
		
		/*
		if(!isNameExisted($name)){
			$insert = mysql_query("INSERT INTO location(name, locationX, locationY, created_at)VALUE('$name','$locationX','$locationY',NOW())");
		}else{
			$insert = mysql_query("UPDATE location SET locationX = '$locationX', locationY='$locationY', updated_at=NOW() WHERE name = '$name'");
		}
		
		
		if($insert){
			$result = mysql_query("SELECT * FROM location WHERE name = '$name';");
			return mysql_fetch_array($result);
		} else {
			return false;
		}*/
		 
	
	public function queryLocation($name){
		$result = mysql_query("SELECT * FROM location WHERE name = '$name';") or die(mysql_error());
		$no_of_rows = mysql_num_rows($result);
		if($no_of_rows>0){
			$result = mysql_fetch_array($result);
			return $result;
		}else{
			return false;
		}
	}
	
	public function isNameExisted($name){
		$result = mysql_query("SELECT name FROM location WHERE name = '$name';");
		$no_of_row = mysql_num_rows($result);
		if($no_of_row>0){
			return true;
		}else{
			return false;
		}
	}
	
	public function loadLocation($name, $locationX, $locationY){
		$sql = mysql_query("INSERT INTO location(name, locationX, locationY, created_at)VALUE('$name','$locationX','$locationY',NOW());");
	    if($sql){
			$result = mysql_query("SELECT * FROM location WHERE name = '$name';") or die(mysql_error());
		}
		$no_of_rows = mysql_num_rows($result);
		if($no_of_rows>0){
			$result = mysql_fetch_array($result);
			return $result;
		}else{
			return false;
		}
	}
	
	public function updateLocation($name, $locationX, $locationY){
		$sql = mysql_query("UPDATE location SET locationX ='$locationX', locationY ='$locationY', updated_at = NOW() WHERE name ='$name';");
		if($sql){
			$result = mysql_query("SELECT * FROM location WHERE name = '$name';") or die(mysql_error());
		}
		$no_of_rows = mysql_num_rows($result);
		if($no_of_rows>0){
			$result = mysql_fetch_array($result);
			return $result;
		}else{
			return false;
		}
	}
}

?>