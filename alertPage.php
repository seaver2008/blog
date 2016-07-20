<?php
include 'api/ReadArticle.php';
$read = new ReadArticle();
$list = $read->getList();
$content = $read->getContentByObj($list[0]);
?>
<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <title>文档编辑</title>
</head>

<body>
<!-- 加载编辑器的容器 -->
<form action="alertCompletePage.php" method="post">
    <input type="hidden" value=<?php echo $list[0]->id?> name="id" id="data" />
    <div>
        <span>Title</span>
        <input type="text" name="title"/>
    </div>
    <script id="container" name="content" type="text/plain">
        <?php
            echo $content;
        ?>
    </script>
    <div>
        <input type="submit" value="Submit"/>
    </div>
</form>

    <!-- 配置文件 -->
    <script type="text/javascript" src="ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="ueditor/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container');
    </script>
</body>

</html>