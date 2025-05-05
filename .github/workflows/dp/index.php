<script charset="utf-8" src="jquery-1.7.2.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><!-- IE内核 强制使用最新的引擎渲染网页 -->
<meta name="renderer" content="webkit">  <!-- 启用360浏览器的极速模式(webkit) -->
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0 ,maximum-scale=1.0, user-scalable=no"><!-- 手机H5兼容模式 -->
<link rel="stylesheet" href="DPlayer.min.css">
<style type="text/css">
    body,html{width:100%;height:100%;background:#000;padding:0;margin:0;overflow-x:hidden;overflow-y:hidden}
    *{margin:0;border:0;padding:0;text-decoration:none}
    #dplayer{position:inherit}
</style>
<div id="dplayer"></div>
<div id="stats"></div>
<input type="hidden" id="url" value="<?php echo $_GET["url"];?>">
<script src="hls.min.js"></script>
<script src="DPlayer.min.js"></script>
<script>
    url=$("#url").val();
    temp=url.split("://");
    url=temp[1];   
    ishttps = 'https:' == document.location.protocol ? true: false;	
   	 if(ishttps){
   		url="https://"+url;
   	 }
   	 else{
   		 url="http://"+url;
   	 }
    var webdata = {
        set:function(key,val){
            window.sessionStorage.setItem(key,val);
        },
        get:function(key){
            return window.sessionStorage.getItem(key);
        },
        del:function(key){
            window.sessionStorage.removeItem(key);
        },
        clear:function(key){
            window.sessionStorage.clear();
        }
    };
	var dp = new DPlayer({
        container: document.getElementById('dplayer'),
        autoplay: true,
		hotkey: true,  // 移动端全屏时向右划动快进，向左划动快退。
        video: {
            url: url,
        }
    });
	dp.seek(webdata.get('vod'+url));
    setInterval(function(){
        webdata.set('vod'+url,dp.video.currentTime);
    },1000);
</script>