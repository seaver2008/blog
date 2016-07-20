<?php
include 'api/WriteArticle.php';
$article = new WriteArticle($_POST["title"],$_POST["content"]);

// ob_start();
// echo $_POST["title"];
// echo "<br/>";
// echo ob_get_contents();
?>
<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <title><?php echo $_POST["title"];?></title>
</head>
<body>
	<?php
	echo $_POST["content"];
	?>
</body>
</html>