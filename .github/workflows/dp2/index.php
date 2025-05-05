<title>dplayer</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><!-- IE内核 强制使用最新的引擎渲染网页 -->
<meta name="renderer" content="webkit">  <!-- 启用360浏览器的极速模式(webkit) -->
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0 ,maximum-scale=1.0, user-scalable=no"><!-- 手机H5兼容模式 -->
<meta name="x5-fullscreen" content="true" ><meta name="x5-page-mode" content="app" > <!-- X5  全屏处理 -->
<meta name="full-screen" content="yes"><meta name="browsermode" content="application">  <!-- UC 全屏应用模式 -->
<meta name="apple-mobile-web-app-capable" content="yes"> <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" /> <!--  苹果全屏应用模式 -->
<script charset="utf-8" src="jquery-1.7.2.min.js"></script>
<link rel="stylesheet" href="DPlayer.min.css">
<style type="text/css">
    body,html{width:100%;height:100%;background:#000;padding:0;margin:0;overflow-x:hidden;overflow-y:hidden}
    *{margin:0;border:0;padding:0;text-decoration:none}
    #stats{position:fixed;top:5px;left:10px;font-size:10px;color:#fdfdfd;z-index:20719029;text-shadow:1px 1px 1px #000, 1px 1px 1px #000}
    #dplayer{position:inherit}
</style>
<input type="hidden" id="url" value="<?php echo $_GET["url"];?>">
<div id="dplayer"></div>
<div id="stats"></div>
<script src="hls.min.js"></script>
<script src="DPlayer.min.js"></script>
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
    	
    if(url.indexOf("m3u8")!=-1){

	var hlsjsConfig = {
        debug: false,
        p2pConfig: {
            wsSignalerAddr: 'wss://signal.cdnbye.com/wss',
        }
    };

	var dp = new DPlayer({
        container: document.getElementById('dplayer'),
        autoplay: true,
		hotkey: true,  // 移动端全屏时向右划动快进，向左划动快退。
        video: {
            url: url,
            type: 'customHls',
            customType: {
                'customHls': function (video, player) {
                    const hls = new Hls({
                        debug: false,
                        p2pConfig: {
                            logLevel: true,
                            live: false,        // 如果是直播设为true
                        }
                    });
                    hls.loadSource(video.src);
                    hls.attachMedia(video);
                    hls.p2pEngine.on('stats', function (stats) {
                        _totalP2PDownloaded = stats.totalP2PDownloaded;
                        _totalP2PUploaded = stats.totalP2PUploaded;
                        updateStats();
                    }).on('peerId', function (peerId) {
                        _peerId = peerId;
                    }).on('peers', function (peers) {
                        _peerNum = peers.length;
                        updateStats();
                    });

                }
            }
        }
    });
    var _peerId = '', _peerNum = 0, _totalP2PDownloaded = 0, _totalP2PUploaded = 0;
    dp.seek(webdata.get('vod'+url));
    setInterval(function(){
        webdata.set('vod'+url,dp.video.currentTime);
    },1000);
	}
    else{
    	$("#video").attr("src",url);
    }

    function updateStats() {
        var text = '冰豆P2P正在为您加速' + (_totalP2PDownloaded/1024).toFixed(2)
            + 'MB 已分享' + (_totalP2PUploaded/1024).toFixed(2) + 'MB' + ' 连接节点' + _peerNum + '个';
        document.getElementById('stats').innerText = text
    }    
</script>