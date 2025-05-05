<?php
// 检查 'url' 参数是否存在且不为空
if (isset($_GET['url']) && !empty($_GET['url'])) {
    $urls = filter_var($_GET['url'], FILTER_SANITIZE_URL);
    // 进一步检查 URL 是否合法
    if (!filter_var($urls, FILTER_VALIDATE_URL)) {
        // 如果 URL 不合法，重定向到默认页面
        header("Location: https://www.naikan.cc/");
        exit;
    }
} else {
    // 如果 'url' 参数不存在或为空，重定向到默认页面
    header("Location: https://www.naikan.cc/");
    exit;
}
?>
<!DOCTYPE html>
<head>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>我爱云解析</title>
    <script src="jquery-1.7.2.min.js" type="text/javascript"></script>
</head>

<style type="text/css">
    body, html {
        width: 100%;
        height: 100%;
        background: #000;
        padding: 0;
        margin: 0;
        overflow-x: hidden;
        overflow-y: hidden;
    }
</style>
<body oncontextmenu="self.event.returnValue=false" onselectstart="return false">
<div style="margin: 0px auto; width: 100%; height: 100%;">
    <iframe id="WANG" scrolling="no" allowtransparency="true" allowfullscreen="true" frameborder="0" src="" width="100%" height="100%"></iframe>
</div>

<script>
    function GetQueryString(name) {
        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
        var r = window.location.search.substr(1).match(reg);
        if (r != null) return decodeURIComponent(r[2]);
        return null;
    }

    function play(url) {
        $('#WANG').attr('src', decodeURIComponent(url)).show();
    }

    var url_adress = GetQueryString("url");
    if (url_adress && url_adress.indexOf(".m3u8") > 0) {
        play('index1.php?url=' + encodeURIComponent(url_adress));
    } else if (url_adress && url_adress.indexOf("/share/") > 0) {
        play(url_adress);
    } else if (url_adress) {
        play('https://www.xiaodigu.cc/dplayer/?url=' + encodeURIComponent(url_adress));
    }
</script>
</body>