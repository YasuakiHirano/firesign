<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <link media="all" rel="stylesheet" href="<?php echo CSS_DIR; ?>main.css" type="text/css" />
        <script type="text/javascript" src="<?php echo JS_DIR; ?>jquery-2.0.3.js"></script>
        <script type="text/javascript" src="<?php echo JS_DIR; ?>common.js"></script>
        <title><?php echo $title?></title>
    </head>
    <body>
    <?php echo $header?>
    <div id="page_main">
        <div style="width:100%;float:left;margin-top:10px;">
            <?php echo $hello?>
            <?php echo $data_list?>
        </div>
    </div>
    </body>
</html>
