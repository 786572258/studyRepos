<?php
//访问格式：http://localhost/studyRepos/test/getJson2.php?id=387352743
$id = $_GET['id'];
$json = file_get_contents('http://music.163.com/api/playlist/detail?id='.$id);
$arr = json_decode($json, true);

foreach($arr['result']['tracks'] as $k => $v) {
	//歌手
	$singer = [];
	foreach($arr['result']['tracks'][0]['artists'] as $kk=>$vv) {
		$singer[] = $v['name'];
	}
	$singers = implode(',', $singer);
	$varwenkmList[] = array(
		'song_id' => $v['id'],
		'song_title' => $v['name'],
		'singer' => $singers,
		'album' => $v['album']['name'],
		'pic' => $v['album']['blurPicUrl']
	);
}



echo 'var wenkmList='.json_encode($varwenkmList);
exit;

/*
debug($varwenkmList);
debug($arr);
*/
?>