<?php
/*
 * index.php
 *
 * (2019/04/23) Tomoyuki Nohara
 *
 */ 
/*************************************************************************/
/* 環境設定 */
/*************************************************************************/
date_default_timezone_set('Asia/Tokyo');

/*************************************************************************/
/* フォーム処理とその他の事前処理 */
/*************************************************************************/
require_once("post_task.php");

/*************************************************************************/
/* デバッグ */
/*************************************************************************/


/*************************************************************************/
/* PHP終了*/
/*************************************************************************/
?>

<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <title>DJ Moriyama / Playlist</title>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="css/style.css" rel="stylesheet">
</head>

<style>
    .moriyama-logo {
        width: 80px;
    }
</style>
<body>

    <div class="cotainer-fluid">
        <div class="header">
            <p>DJ Moriyama Playlists</p>
        </div>
    </div>

    <!-- スペーサー -->
    <div class="spacer20"></div>

    <!-- トップヘッダ＾ -->
    <div id="container">
        <a href="index.php">
            <!-- <img id="top-logo" src="img/50x50_gray.svg"> -->
            <!-- <img id="top-logo" src="img/moriyama-icon.jpg"> -->
            <!-- <img src="img/moriyama-icon.jpg" class="img-circle moriyama-logo center-block"> -->
        </a>
    </div>
    <!-- /トップヘッダ＾ -->

    <!-- スペーサー -->
    <div class="spacer20"></div>


    <!-- ツイートのカウント数 -->
    <div class="container text-center">
        <!-- カウンター -->
        <span class="counter">
            <strong><?php echo count($youtube_url_list); ?></strong>
            <span class="counter-sub">/1000</span>
        </span>

    </div>

    <!-- 概要 -->
    <div class="container">
        <div class="text-center">
            DJ Moriyama の 作業用BGMプレイリスト
        </div>
    </div>


    <!-- スペーサー -->
    <div class="spacer20"></div>


    <!-- PHPでDBの要素を書き出し -->
    <div class="container">

        <!-- DB保存用の用のフォーム要素 -->
        <form method="POST" action=" ">
                <div class="input-group">
                    <!-- 追加するURL -->
                    <input type="text" class="form-control" placeholder="youtube url for..." name="youtubeurl" >
                    <!-- 再読み込み防止用のセッションキー -->
                    <input type="hidden" value="<?php echo $session_key ?>" name="session_key">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default" name="action" value="add">Go!</button>
                    </span>
                </div>
                <!-- /input-group -->
        </form>
    </div><!--/container-->

    <!-- スペーサー -->
    <div class="spacer20"></div>


    <!-- スペーサー -->
    <div class="spacer20"></div>


    <!-- PHPでDBの要素を書き出し -->
    <div class="container idea-area">
        
        <?php
        for ( $i=0; $i<count($youtube_url_list); $i++) {
            $youtube_url =$youtube_url_list[$i];
            printf($HTML_TEMPLATE, $youtube_url["id"], $youtube_url["message"]);
        }

        ?>

    </div><!--/container-->
    <!-- スペーサー -->
    <div class="spacer20"></div>
    <div class="spacer20"></div>
    <div class="spacer20"></div>
    <div class="spacer20"></div>

    <!-- footer -->
    <footer class="footer">
      <div class="container text-center">
        <div class="spacer20"></div>
        <p class="text-muted">DJ Moriyama Playlist</p>
        <p class="text-muted">鮮度が命なので最新の10曲のみが表示されます。</p>
        <a href="https://www.facebook.com/profile.php?id=100033433926837"><p class="text-muted">恭平森山のFacebookはこちら</p></a>
        <p class="text-muted">©2019 FiFiFactory</p>
      </div>
    </footer>

    <!-- ************************* 以下javaScript *********************************** -->
    <script src="js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
