<?php
if(!class_exists('LoginD'))
{
	include 'LoginD.php';
}
/**
* ReadArticles 读取数据库内页面数据
*/
class ReadArticle
{
	var $list;
	function ReadArticle(){
		
	}
	//获取文章列表
	function getList($num=null){
		$login = new LoginD();
		$login->login();
		if($num==null) $result = mysql_query("select * from articles");
		else mysql_query("select * from articles limit $num");
		$this->list=array();
		while($row = mysql_fetch_object($result)){
			array_push($this->list, $row);
		}
		$login->close();
		return $this->list;

	}
	//按ID获取文章对象
	function getObjectById($id){
		$login = new LoginD();
		$login->login();
		$result = mysql_query("select * from articles where id=$id");
		$row = mysql_fetch_object($result);
		$login->close();
		return $row;
	}
	//从对象中提取文章内容
	function getContentByObj($obj){
		$url = $obj->url;
		$content = file_get_contents($url);
		return $content;
	}
}
?>