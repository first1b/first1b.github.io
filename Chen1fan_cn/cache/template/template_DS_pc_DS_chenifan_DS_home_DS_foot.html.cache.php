<div id="footer" class="two-s-footer clearfix">
    <div class="footer-box">
        <div class="container">
            <div class="social-footer">
                <a class="weiboii" href="http://weibo.com/" target="_blank">
                    <i class="fa fa-weibo"></i>
                </a>
                <a class="ttweiboii" href="http://t.qq.com/" target="_blank" rel="nofollow">
                    <i class="fa fa-tencent-weibo"></i>
                </a>
                <a class="mailii" href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=1812215600@qq.com" rel="nofollow" target="_blank">
                    <i class="fa fa-envelope"></i>
                </a>
                 <a class="qqii" href="http://wpa.qq.com/msgrd?v=1&uin=1812215600&site=qq&menu=yes" rel="nofollow"  target="_blank">
                    <i class="fa fa-qq"></i>
                </a>
                <a id="tooltip-f-weixin" class="wxii" href="javascript:void(0);">
                    <i class="fa fa-weixin"></i>
                </a>
            </div>
            <div class="nav-footer">
                <a href="/">首页</a>
                <?php $list_return = $this->list_tag("action=category module=share pid=0"); if ($list_return && is_array($list_return)) extract($list_return, EXTR_OVERWRITE); $count=dr_count($return); if (is_array($return)) { $key=-1; foreach ($return as $t) { $key++; $is_first=$key==0 ? 1 : 0;$is_last=$count==$key+1 ? 1 : 0; ?> 
                <a href="<?php echo $t['url']; ?>"><?php echo $t['name']; ?></a>
                <?php } } ?>
              <a href="/hwfx" target="blank">好文分享</a>
            </div>
            <div class="copyright-footer">
                <!--<p>   备案号：<a href="https://beian.miit.gov.cn/" rel="nofollow" target="_blank"></a></p>-->
            </div>
            
        </div>
    </div>
</div>
<div class="search-form">
    <!--##form class="sidebar-search" method="get" action="/search.php">-->
        <input type="hidden" name="kwtype" value="0" />
        <div class="search-form-inner">
            <div class="search-form-box">
                <input class="form-search" type="text" name="q" placeholder="键入搜索关键词">
                <button type="submit" id="btn-search">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    <!--##/form>-->
    <div class="close-search">
        <span class="close-top"></span>
        <span class="close-bottom"></span>
    </div>
</div>
<div class="f-weixin-dropdown">
    <div class="tooltip-weixin-inner">
        <h3>关注站长公众号</h3>
        <div class="qcode"><img src="/skin/img/wxgzh.png" width="160" height="160" alt="微信公众号"></div>
    </div>
    <div class="close-weixin">
        <span class="close-top"></span>
        <span class="close-bottom"></span>
    </div>
</div>
<!--<div class="f-baijiahao-dropdown">
    <div class="tooltip-baijiahao-inner">
        <h3>关注站长百家号</h3>
        <div class="qcode"><img src="/skin/img/bjh.png" width="160" height="160" alt="百家号"></div>
    </div>
    <div class="close-weixin">
        <span class="close-top"></span>
        <span class="close-bottom"></span>
    </div>
</div>-->
<script type="text/javascript" src='/skin/js/fancybos.js'></script>
<script type='text/javascript' src='/skin/js/bootstrap.min.js'></script>
<script type='text/javascript' src='/skin/js/jquery.mcustomscrollbar.concat.min.js'></script>
<script type='text/javascript' src='/skin/js/jquery.resizeend.js'></script>
<script type='text/javascript' src='/skin/js/jquery.sticky-kit.min.js'></script>
<script type='text/javascript'>/* <![CDATA[ */
    var suxingme_url = {
        "roll": "",
        "headfixed": "1",
        "slidestyle": "index_no_slide",
        "wow": "1"
    };
    /* ]]> */
    </script>
<script type='text/javascript' src='/skin/js/suxingme.js'></script>
<script type='text/javascript' src='/skin/js/jquery.bootstrap-autohidingnavbar.min.js'></script>
<script type='text/javascript' src='/skin/js/jquery.lazyload.min.js'></script>
<script type='text/javascript' src='/skin/js/wow.min.js'></script>
<script type='text/javascript' src='/skin/js/ajax-comment.js'></script>
<script type='text/javascript' src='/skin/js/fancybox.js'></script>
<script>
(function(){
    var bp = document.createElement('script');
    var curProtocol = window.location.protocol.split(':')[0];
    if (curProtocol === 'https') {
        bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
    }
    else {
        bp.src = 'http://push.zhanzhang.baidu.com/push.js';
    }
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(bp, s);
})();
</script>
<script>
(function(){
var src = "https://s.ssl.qhres2.com/ssl/ab77b6ea7f3fbf79.js";
document.write('<script src="' + src + '" id="sozz"><\/script>');
})();
</script>