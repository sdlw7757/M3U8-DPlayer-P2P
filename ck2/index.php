<!DOCTYPE html>
<html>
<head>
<script charset="utf-8" src="jquery-1.7.2.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
<meta http-equiv="X-UA-Compatible" content="IE=edge"><!-- IE内核 强制使用最新的引擎渲染网页 -->
<meta name="renderer" content="webkit">  <!-- 启用360浏览器的极速模式(webkit) -->
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0 ,maximum-scale=1.0, user-scalable=no"><!-- 手机H5兼容模式 -->
<title>CK-P2P解析</title>
<style type="text/css">body,html,.a1{background-color:#000;padding: 0;margin: 0;width:100%;height:100%;}
#info{position:fixed;top:5px;left:10px;font-size:10px;color:#fdfdfd;z-index:20719029;text-shadow:1px 1px 1px #000, 1px 1px 1px #000}</style>
</head>
<body ondragstart="window.event.returnValue=false" oncontextmenu="window.event.returnValue=false" onselectstart="event.returnValue=false" style="overflow-y:hidden;">
<input type="hidden" id="url" value="<?php echo($_REQUEST['url']);?>">
<div id="video" style="width:100%;height:100%;"></div>
<p id="info"></p>
<script type="text/javascript" src="ckplayer.min.js" charset="UTF-8"></script>
<!--<script type="text/javascript" src="http://cdn.jsdelivr.net/npm/p2p-ckplayer@latest/ckplayer/ckplayer.min.js" charset="UTF-8"></script>-->
<script type="text/javascript">
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

    var videoObject = {
        container: '#video',//“#”代表容器的ID，“.”或“”代表容器的class
        variable: 'player',//该属性必需设置，值等于下面的new chplayer()的对象
        autoplay:true,
        html5m3u8:true,

        video:url,//视频地址
        hlsjsConfig: {  
            debug: false,
            p2pConfig: {
                logLevel: 'debug',
                live: false,        // 如果是直播设为true
                getStats: function (totalP2PDownloaded, totalP2PUploaded, totalHTTPDownloaded) {
                    var total = totalHTTPDownloaded + totalP2PDownloaded;
                    document.querySelector('#info').innerText = `冰豆p2p比例: ${Math.round(totalP2PDownloaded/total*100)}%, 已加速: ${totalP2PDownloaded}KB, 已分享: ${totalP2PUploaded}KB`;
                },

            }
        }
    };
    var player = new ckplayer(videoObject);
</script>
</body>
</html>
