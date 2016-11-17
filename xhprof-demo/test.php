<?php
$xhprof_flag = 1;

if(extension_loaded('xhprof')){
    //载入下载的XHPROF包中的2个文件夹
    include_once 'xhprof_lib/utils/xhprof_lib.php';
    include_once 'xhprof_lib/utils/xhprof_runs.php';
    xhprof_enable(XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY);
}

function test() {
	echo '你好世界';
	
}
test();
test();
test();
if(extension_loaded('xhprof')){
    $ns = 'myXhprof';
    //关闭profiler
    $xhprofData = xhprof_disable();
    //实例化类
    $xhprofRuns = new XHProfRuns_Default();
    $runId = $xhprofRuns->save_run($xhprofData, $ns);
    //前端展示库的URL
    $url = './xhprof_html/index.php';
    $url .= '?run=%s&source=%s';
    //变量替换
    $url = sprintf($url, $runId, $ns);
    //输入URL
    echo '<a href="'.$url.'" target="_blank">查看结果</a>';
}
