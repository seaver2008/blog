<?php
include 'api/AlertArticle.php';
include 'api/ReadArticle.php';
$read = new ReadArticle();
$obj = $read->getObjectById($_POST["id"]);
$article = new AlertArticle($obj);
$article->alertFile($_POST["content"]);
$article->alertDB($_POST["title"]);

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