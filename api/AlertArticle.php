<?php
if(!class_exists('LoginD'))
{
	include 'LoginD.php';
}

/**
* 更改文章内容
*/
class AlertArticle
{
	var $object;
	//构造函数，$obj传入需更改文章对象
	function AlertArticle($obj){
		$this->object = $obj;
		/*$this->alertDB($title);
		$this->alertFile($data);*/
	}
	//更改数据库数据，$title传入文章title
	function alertDB($title){
		$login = new LoginD();
		$login->login();
		$obj = $this->object;
		date_default_timezone_set("Asia/Shanghai");
		$date = date("y-m-d H:i:s");
		$sql = "update articles set title = '$title', alertTime = '$date' where id = $obj->id";
		mysql_query($sql)or die(mysql_error());
		$login->close();
	}
	//更改文章内容，$data传入更改后正文内容
	function alertFile($data){
		file_put_contents($this->object->url, $data);
	}
}
?>