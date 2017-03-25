<div id="footer">

    <div class="footer-box connect-me">
        <div class="footer-box-header">
            <i class="fa fa-comments-o"></i>&nbsp;
            社交账号
        </div>
        <div class="footer-divider"></div>
        <a href="#" class="connect-link rss-link">
            <i class="fa fa-rss fa-5x"></i>
            <span class="connect-text">RSS</span>
        </a>
        <a href="{{ $blogInfo['footer_weibo_url'] }}" class="connect-link weibo-link" target="_blank">
            <i class="fa fa-weibo fa-5x"></i>
            <span class="connect-text">weibo</span>
        </a>
        <a href="{{ $blogInfo['footer_github_url'] }}" class="connect-link github-link" target="_blank">
            <i class="fa fa-github fa-5x"></i>
            <span class="connect-text">github</span>
        </a>
        <a href="#" class="connect-link wechat-link">
            <i class="fa fa-weixin fa-5x"></i>
            <span class="connect-text">wechat</span>
        </a>
    </div>

    <div class="footer-box friend-link">
        <div class="footer-box-header">
            <i class="fa fa-link"></i>&nbsp;
            友情链接
        </div>
        <div class="footer-divider"></div>
        @foreach ($footerBlogrolls as $blogroll)
        <a href="{{ $blogroll->link }}" target="_blank" class="btn friend-link-btn">{{ $blogroll->title }}</a>
        @endforeach
    </div>

    <div class="footer-box donation">
        <div class="footer-box-header">
            <i class="fa fa-thumbs-o-up"></i>&nbsp;
            打赏支持
            <small class="pull-right">拿出手机扫一扫，支持一下博主&nbsp;&nbsp;&nbsp;&nbsp;</small>
        </div>
        <div class="footer-divider"></div>
        <img src="{{ asset('assets/images/donate-wechat.jpg') }}" width="150px" class="img-responsive" alt="微信扫一扫" />
        <img src="{{ asset('assets/images/donate-zhifubao.jpg') }}" width="150px" class="img-responsive" alt="支付宝钱包" />
    </div>

    <div class="footer-copyright">
        <p>
            Copyright © 2015. <a href="{{ url('/') }}">messikiller's blog</a>. Powered by wp2lara-blog
            <iframe src="https://ghbtns.com/github-btn.html?user=messikiller&repo=wp2lara-blog&type=star&count=true" frameborder="0" scrolling="0" width="100px" height="20px" style="vertical-align:middle;"></iframe>
        </p>
        <p>
            <img src="{{ asset('assets/images/countrylogo.png') }}" style="display:inline-block;width: 16px;">
            <a href="http://www.miitbeian.gov.cn" target="_blank">粤ICP备15117370号</a>
	    <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1261464132'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s11.cnzz.com/z_stat.php%3Fid%3D1261464132%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
        </p>
    </div>

</div>
