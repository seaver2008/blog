<?php
include 'api/ReadArticle.php';
$read = new ReadArticle();
$data = $read->getList();
?>
<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <title><?php echo $data[0]->title;?></title>
</head>
<body>
	<?php
	echo $read->getContentByObj($data[0]);
	?>
</body>
</html>