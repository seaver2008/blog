<?php
if(!class_exists('LoginD'))
{
	include 'LoginD.php';
}
class WriteArticle
{
	var $title;
	var $content;
	var $fileDir;
	var $fileURL;
	var $date;
	//构造函数 $tt写入文章标题 $con写入文章内容
	function WriteArticle($tt,$con){
		 date_default_timezone_set("Asia/Shanghai");
		 $this->title = $tt;
		 $this->content = $con;
		 $this->fileDir = "articles/".date('ymd')."/";
		 $this->fileURL = $this->fileDir.date('ymdHis').".html";
		 $this->date = date("y-m-d H:i:s");
		 $this->writeFile();
		 $this->writeDataBase();
	}
	//将文件写入硬盘
	function writeFile(){
		if(!file_exists($this->fileDir)) mkdir($this->fileDir);
		$myfile = fopen($this->fileURL, "w") or die("Unable to open file!");
		fwrite($myfile, $this->content);
		fclose($myfile);
	} 
	//将信息插入数据库
	function writeDataBase(){
		$login = new LoginD();
		$login->login();
		mysql_query("insert into articles (title, url, date)
			values('$this->title','$this->fileURL','$this->date')");
		$login->close();
	}
}
?>