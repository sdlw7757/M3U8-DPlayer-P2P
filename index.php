<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" /> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我爱云解析</title>
<link href="pucms.css" rel="stylesheet">
<script src="jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="pucms.js" type="text/javascript"></script>
</head>
<body style="overflow-y:hidden;">
<div class="panel">
    <a href="/dp/?url=">【M3U8调用】</a>
    <a href="https://jx.xmflv.com/?url=">【VIP云解析】</a>
    <a href="dp2/?url=">【DP-P2P】</a>
    <a href="dp/?url=">【DPlayer】</a> 
    <a href="ck/?url=">【CKplayer】</a>
    <a href="ck2/?url=">【CK-P2P】</a>  	
</div>
<p class="slide">
    <a class="WANG-WANG">切换</a></p>
<div style="margin:-36px auto;width:100%;height:100%;">
    <iframe id="WANG" scrolling="no" allowtransparency="true" frameborder="0"
            src="dp2/?url=<?php echo $_GET["url"]; ?>"width="100%" scrolling="no" height="100%" align="middle" frameborder="no" hspace="0" vspace="0" allowFullscreen="true" marginheight="0" marginwidth="0" name="tv"></iframe>
    <script type="text/javascript"> function QQ(url) {
            $('#WANG').attr('src', decodeURIComponent(decodeURIComponent(url))).show();
        } </script>
</div>
</body>
</html>
