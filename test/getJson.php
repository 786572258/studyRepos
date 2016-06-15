<meta charset="utf-8">
<?php
function debug($d) {
	echo '<pre>';
	print_r($d);
}
//http://music.163.com/api/playlist/detail?id=387321785
//http://music.163.com/api/playlist/detail?id=387321785
//$json = file_get_contents("http://music.163.com/api/playlist/detail?id=387321785");
//$json = file_get_contents("http://music.163.com/api/playlist/detail?id=387321786");
$json = file_get_contents("http://music.163.com/api/playlist/detail?id=387352743");
$arr = json_decode($json, true);
/*
varwenkmList=[
    {
        "song_id": "28832054",
        "song_title": "你是对的人",
        "singer": "戚薇,俊昊",
        "album": "爱情回来了 电视原声带",
        "pic": "y_28832054.jpg"
    }
];
*/

$varwenkmList = [];
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
		'pic' => $arr['result']['coverImgUrl']
	);
}



echo 'varwenkmList='.json_encode($varwenkmList);
exit;
/*
debug($varwenkmList);
debug($arr);
*/
?>