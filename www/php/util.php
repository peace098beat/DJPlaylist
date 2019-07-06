<?php
/**
 * util.php
 * ユーザ補助関数
 */


/**
 *  HTMLコメントアウトの書き出し
 */       
function htmlComment($str=''){
	echo "<!-- Admin:: ".$str." --><br>";
	// echo "Admin:: ".$str."<br>";
}

/**
 *  Flush!!
 *  HTMLでコメントをかきだし
 */    
function flushrc($s)
{
	if($s != ""){
		echo "<p class='bg-success'>".$s."</p>";
	}
	
	// echo "<p class='bg-success'>".$s."</p>";
	// echo "<p >".$s."</p>";
}

function warning($s) {
	if($s != ""){
		echo "<p class='bg-warning'>".$s."</p>";
	}
}


/*************************************************************************/
/**
 * youtubeURLをパーシング
 *  http://stackoverflow.com/questions/2936467/parse-youtube-video-id-using-preg-match
 * 
 * https://www.youtube.com/watch?v=E0FgUui2p9o => E0FgUui2p9o を取り出す
 */        
function parseYTUrl($url) 
{
	$pattern = '#^(?:https?://)?(?:www\.)?(?:youtu\.be/|youtube\.com(?:/embed/|/v/|/watch\?v=|/watch\?.+&v=))([\w-]{11})(?:.+)?$#x';
	preg_match($pattern, $url, $matches);
	return (isset($matches[1])) ? $matches[1] : false;
}

/**
 *  Youtubeリンク切れチェック
 *  http://www.php.net/manual/ja/function.get-headers.php
 *  @param : $URL [<youtube url>]
 *  @return bool
 */    
function isExistxYT($url)
{
	# code...
	$url = "https://www.youtube.com/watch?v=".$url;

	try{
		$contents = @get_headers($url);
	} catch (Exception $e) {
		// htmlComment($e->getMessage() . PHP_EOL);
		return false;
	}
	return ($contents[0] == "HTTP/1.0 200 OK");
}


?>