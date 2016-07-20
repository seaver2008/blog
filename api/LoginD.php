<?php
/**
* 数据库登陆
*/
class LoginD
{
	var $con;
	//登陆数据库并选择指定数据库
	function login(){
		$this->con = mysql_connect("localhost","root","");
		if (!$this->con){
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db("blog", $this->con);
	}
	//关闭数据库链接
	function close(){
		mysql_close($this->con);
	}

}


?>