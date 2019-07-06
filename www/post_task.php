<?php
/*
 * post_task.php
 *
 * (2016/06/01) Tomoyuki Nohara
 * (2019/04/23) Tomoyuki Nohara
 * (2019/09/06) Tomoyuki Nohara
 *
 */ 

date_default_timezone_set('Asia/Tokyo');



// セッション開始
@session_start();

/*************************************************************************/
// Modleクラスのインポート
require_once("php/Model.class.php");
require_once("php/util.php");

// DBクラスの生成
$Model = new Model();

$flush="";


/*************************************************************************/
/*   再読み込み対策  */
/*************************************************************************/
if ( isset($_SESSION['session_key']) && isset($_POST['session_key']) &&
  $_SESSION['session_key'] == $_POST['session_key']) {

    // セッションIDが合致しているので、送信処理を記述
    $msg = "セッションが一致";

    /*********************************
     * データの追加
     ********************************/
    if ($_POST['action'] == 'add'){

        // POSTデータからurlを取得
        $_youtubeurl = $_POST["youtubeurl"];

        // パーシング
        $youtubeurl = parseYTUrl($_youtubeurl);

        // ページの存在を確認
        if(isExistxYT($youtubeurl)){
            // ページが存在するなら, DBに保存
            $hash = array('message' => $youtubeurl);
            $res = $Model->add_data($hash);
            if($res){
                flushrc("チャンネルが登録されました");
            }

        }else{
            warning("ページが見つかりませんでした (T.T)/.");
        }

    } //追加

    /*********************************
     * データの削除
     ********************************/
    if ($_POST['action'] == 'delete'){
        // write code delete..
        $delete_item_id = $_POST["id"];
        $res = $Model->delete_item($delete_item_id);
        if($res){
            htmlComment("Sucess DB Delete Item :: id=".$delete_item_id);
        }
    } //削除

    /*********************************
     * 全データの削除
     ********************************/
    if ($_POST['action'] == 'reset'){
        // write code delete..
        $Model->reset();
        $flush="リセットしました";
    } //reset

    /*********************************
     * test_add_data
     ********************************/
    if ($_POST['action'] == 'add_test'){
        $Model->test_add_data(1000);

    } //reset


} else {
    // なにもしない
    $msg = "セッションキーが一致してません.";
}

/*************************************************************************/
/*　DBからデータの呼び出し */
/*************************************************************************/
$youtube_url_list = $Model->get_data(10);

/*************************************************************************/
/* セッション開始 */
/*************************************************************************/
// タイムスタンプと推測できない文字列にてキーを発行
$session_key = md5(time()."推測できない文字列");
// 発行したキーをセッションに保存
if ( isset($_SESSION['session_key'])){ unset($_SESSION['session_key']);};
// 発行したキーをセッションに保存
$_SESSION['session_key'] = $session_key;


/*************************************************************************/
/* テンプレートの準備 */
/*************************************************************************/
// プレーヤ要素生成用のテンプレート
// $HTML_TEMPLATE = '<p>[%1$s] - %2$s </p>';

// 2カラムスタイル
// $HTML_TEMPLATE = '
// <iframe width="235" height="150" 
// src="https://www.youtube.com/embed/%2$s?controls=0" 
// frameborder="0" allow="accelerometer;
// encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
// ';

// 3カラムスタイル 355x150
$HTML_TEMPLATE = '
<iframe width="355" height="280" 
src="https://www.youtube.com/embed/%2$s?controls=0" 
frameborder="0" allow="accelerometer;
encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
';



/*************************************************************************/
/* PHP終了*/
/*************************************************************************/


?>