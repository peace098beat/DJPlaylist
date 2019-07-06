<?php
/*
 * TweetBox.php
 *
 * (2019/04/23) Tomoyuki Nohara
 * (2016/06/01) Tomoyuki Nohara
 *
 */ 

/*************************************************************************/
/* フォーム処理*/
/*************************************************************************/
require_once("post_task.php");

 
/*************************************************************************/
/* PHP終了*/
/*************************************************************************/
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>いんべんとかれんだー</title>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="css/style.css" rel="stylesheet">
</head>

  <body>

    <!-- スペーサー -->
    <div class="spacer20"></div>

    <!-- トップヘッダ＾ -->
    <div id="container">
        <a href="/admin.php">
            <img id="top-logo" src="img/50x50_gray.svg">
        </a>
    </div>
    <!-- /トップヘッダ＾ -->

    <!-- スペーサー -->
    <div class="spacer20"></div>
    <div class="spacer20"></div>

    <div id="container">
        <?php  flushrc($flush); ?>
    </div>

    <div class="spacer20"></div>

    <!-- リセットボタン -->
    <div class="container">
    <p>DBをすべてリセットする場合にのみご利用ください。決してもとには戻りません。</p>
    <form method="POST" action=" ">
            <span class="input-group-btn">
                <!-- 再読み込み防止用のセッションキー -->
                <input type="hidden" value="<?php echo $session_key ?>" name="session_key">
                <button type="submit" class="btn btn-default"  name="action" value="reset" >reset</button>
            </span>
            <!-- /input-group -->
    </form>

    </div><!--/container-->


    <!-- リセットボタン -->
    <div class="container">
    <p>ダミーデータを1000個追加します</p>
    <form method="POST" action=" ">
            <span class="input-group-btn">
                <!-- 再読み込み防止用のセッションキー -->
                <input type="hidden" value="<?php echo $session_key ?>" name="session_key">
                <button type="submit" class="btn btn-default"  name="action" value="add_test" >add_test</button>
            </span>
            <!-- /input-group -->
    </form>

    </div><!--/container-->


    <!-- スペーサー -->
    <div class="spacer20"></div>
    <div class="spacer20"></div>
    <div class="spacer20"></div>
    <div class="spacer20"></div>

    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>