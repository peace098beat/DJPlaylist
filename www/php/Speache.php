<?php
/*
 * Speache.php
 *
 * (2019/04/23) Tomoyuki Nohara
 * (2016/06/04) Tomoyuki Nohara
 *
 */ 

/*************************************************************************/
/* フォーム処理*/
/*************************************************************************/
// 文字列を返す
function get_speach($tw_num)
{
	// 100までは定型の文を出す。
	if($tw_num <= 100) {

		$speaches =  get_speache100();

	    if($tw_num <= 0){
	        return "ようこそ。一日5分。未来のための確実な投資をするんだ。";

	    }else {
		    // 順番通りに返す
		    return $speaches[$tw_num];

	    }


	}else{
		
		$speaches =  get_speaches();

		// 100以降はランダムに出す。
		if ($tw_num == 1000){
	        return "おめでとう1000個だ。イマジネーションは終わった。次は何か一つ形にする段階だ。";

	    }else if ($tw_num % 100 == 0){
	        return sprintf('おめでとう%1$sだ。気を抜くな。本当のゴールは1000だ。', $tw_num);

	    }else{
	    	// ランダムに返す
	        $index = array_rand($speaches, 1);
	        return $speaches[$index];
	    }
	}

  
}


/*************************************************************************/
/*
 * 100まではいい感じに文章が作られている
 */
function get_speache100( )
{
	$lines = file('php/Speache100.txt');
	return $lines;
}

/*
 * 区切りタイミングの返信を削除した文章リスト。
 * ランダムに使用する
 */
function get_speaches( )
{
	$lines = file('php/Speache.txt');
	return $lines;
}



/*************************************************************************/
/* 使い方 */
/*
	// ファイルの内容を配列に取り込みます。
	$lines = file('Speache.txt');

	// 配列をループしてHTMLをHTMLソースとして表示し、行番号もつけます。
	foreach ($lines as $line_num => $line) {
	    echo htmlspecialchars($line) . "<br/>\n";
	}
 */
/*************************************************************************/
?>