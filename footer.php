        <!-- Floating Action Button -->
        <div id="back-to-top" class="toTop-wrap">
            <a href="#top" class="toTop">
                <i class="material-icons footer_top-i">expand_less</i>
            </a>
        </div>


        <!--Footer-->
        <footer class="mdl-mini-footer" id="bottom">
            <!--mdl-mini-footer-left-section-->
            <div class="mdl-mini-footer--left-section">
                <?php if (!empty($this->options->footersns) && in_array('ShowTwitter', $this->options->footersns)) : ?>
                <a href="<?php $this->options->TwitterURL() ?>" target="_blank">
                    <button class="mdl-mini-footer--social-btn social-btn footer-sns-twitter">
                        <span class="visuallyhidden">Twitter</span>
                    </button>
                </a>
                <?php endif;?>
                <?php if (!empty($this->options->footersns) && in_array('ShowFacebook', $this->options->footersns)) : ?>
                <a href="<?php $this->options->FacebookURL() ?>" target="_blank">
                    <button class="mdl-mini-footer--social-btn social-btn footer-sns-facebook">
                        <span class="visuallyhidden">Facebook</span>
                    </button>
                </a>
                <?php endif;?>

                <?php if (!empty($this->options->footersns) && in_array('ShowGooglePlus', $this->options->footersns)) : ?>
                <a href="<?php $this->options->GooglePlusURL() ?>" target="_blank">
                    <button class="mdl-mini-footer--social-btn social-btn footer-sns-gplus">
                        <span class="visuallyhidden">Google Plus</span>
                    </button>
                </a>
                <?php endif;?>

                <?php if (!empty($this->options->footersns) && in_array('ShowWeibo', $this->options->footersns)) : ?>
                <a href="<?php $this->options->WeiboURL() ?>" target="_blank">
                    <button class="mdl-mini-footer--social-btn social-btn footer-sns-weibo">
                        <span class="visuallyhidden">Weibo</span>
                    </button>
                </a>
                <?php endif;?>

                <?php if (!empty($this->options->footersns) && in_array('ShowInstagram', $this->options->footersns)) : ?>
                <a href="<?php $this->options->InstagramURL() ?>" target="_blank">
                    <button class="mdl-mini-footer--social-btn social-btn footer-sns-instagram">
                        <span class="visuallyhidden">Instagram</span>
                    </button>
                </a>
                <?php endif;?>

                <?php if (!empty($this->options->footersns) && in_array('ShowGithub', $this->options->footersns)) : ?>
                <a href="<?php $this->options->GithubURL() ?>" target="_blank">
                    <button class="mdl-mini-footer--social-btn social-btn footer-sns-github">
                        <span class="visuallyhidden">Github</span>
                    </button>
                </a>
                <?php endif;?>

                <?php if (!empty($this->options->footersns) && in_array('ShowTumblr', $this->options->footersns)) : ?>
                <a href="<?php $this->options->TumblrURL() ?>" target="_blank">
                    <button class="mdl-mini-footer--social-btn social-btn footer-sns-tumblr">
                        <span class="visuallyhidden">Tumblr</span>
                    </button>
                </a>
                <?php endif;?>

                <?php if (!empty($this->options->footersns) && in_array('ShowBilibili', $this->options->footersns)) : ?>
                    <a href="<?php $this->options->BilibiliURL() ?>" target="_blank">
                        <button class="mdl-mini-footer--social-btn social-btn footer-sns-bilibili">
                            <span class="visuallyhidden">Bilibili</span>
                        </button>
                    </a>
                <?php endif;?>

                <?php if (!empty($this->options->footersns) && in_array('ShowTelegram', $this->options->footersns)) : ?>
                    <a href="<?php $this->options->TelegramURL() ?>" target="_blank">
                        <button class="mdl-mini-footer--social-btn social-btn footer-sns-telegram">
                            <span class="visuallyhidden">Telegram</span>
                        </button>
                    </a>
                <?php endif;?>

                <?php if (!empty($this->options->footersns) && in_array('ShowZhihu', $this->options->footersns)) : ?>
                    <a href="<?php $this->options->ZhihuURL() ?>" target="_blank">
                        <button class="mdl-mini-footer--social-btn social-btn footer-sns-zhihu">
                            <span class="visuallyhidden">Zhihu</span>
                        </button>
                    </a>
                <?php endif;?>

                <?php if (!empty($this->options->footersns) && in_array('ShowLinkedin', $this->options->footersns)) : ?>
                    <a href="<?php $this->options->LinkedinURL() ?>" target="_blank">
                        <button class="mdl-mini-footer--social-btn social-btn footer-sns-linkedin">
                            <span class="visuallyhidden">LinkedIn</span>
                        </button>
                    </a>
                <?php endif;?>

            </div>

            <!--copyright-->
            <div id="copyright">Copyright &copy;
                <?php echo date("Y"); ?>
                <?php $this->options->title(); ?>
            </div>
            <?php copyright() ?>


            <!--mdl-mini-footer-right-section-->
            <div class="mdl-mini-footer--right-section">
                <div>
                    <div class="footer-develop-div">Powered by <a href="http://typecho.org" target="_blank" class="footer-develop-a">Typecho</a></div>
                    <div class="footer-develop-div">Theme - <a href="https://github.com/LiMingYuGuang/typecho-theme-material" target="_blank" class="footer-develop-a">Material</a></div>                </div>
            </div>
        </footer>
    </main>
    <div class="mdl-layout__obfuscator"></div>
</div>


<!-- UC Browser Compatible -->
<script>
	var agent = navigator.userAgent.toLowerCase();
	if(agent.indexOf('ucbrowser')>0) {
        <?php if (!empty($this->options->CDNURL)): ?>
		document.write('<link rel="stylesheet" href="<?php $this->options->CDNURL() ?>/MaterialCDN/css/uc.css">');
        <?php else: ?>
		document.write('<link rel="stylesheet" href="<?php $this->options->themeUrl('css/uc.css'); ?>">');
        <?php endif; ?>
	    alert('由于 UC 浏览器使用极旧的内核，而本网站使用了一些新的特性。\n为了您能更好的浏览，推荐使用 Chrome 或 Firefox 浏览器。');
	}
</script>

<!--Analysis code-->
<?php $this->options->analysis(); ?>

<!-- Material js -->
<?php if (!empty($this->options->CDNURL)): ?>
<script src="<?php $this->options->CDNURL() ?>/MaterialCDN/js/jquery.min.js"></script>
<script src="<?php $this->options->CDNURL() ?>/MaterialCDN/js/js.min.js"></script>
<script src="<?php $this->options->CDNURL() ?>/MaterialCDN/js/jquery.pjax.min.js"></script>
<script src="<?php $this->options->CDNURL() ?>/MaterialCDN/js/lazyload.min.js"></script>
<?php else: ?>
<script src="<?php $this->options->themeUrl('js/jquery.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('js/js.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('js/jquery.pjax.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('js/lazyload.min.js'); ?>"></script>
<?php endif; ?>

<script>
    $("div.lazy").lazyload();
</script>


<?php if (!empty($this->options->switch) && in_array('ShowLoadingLine', $this->options->switch)): ?>
<?php if (!empty($this->options->CDNURL)): ?>
<script src="<?php $this->options->CDNURL() ?>/MaterialCDN/js/nprogress.js"></script>
<?php else: ?>
<script src="<?php $this->options->themeUrl('js/nprogress.js'); ?>"></script>
<?php endif; ?>

<script type="text/javascript">
    NProgress.configure({
        showSpinner: true
    });
    NProgress.start();
    $('#nprogress .bar').css({
        'background': '<?php $this->options->loadingcolor(); ?>'
    });
    $('#nprogress .peg').css({
        'box-shadow': '0 0 10px <?php $this->options->loadingcolor(); ?>, 0 0 15px <?php $this->options->loadingcolor(); ?>'
    });
    $('#nprogress .spinner-icon').css({
        'border-top-color': '<?php $this->options->loadingcolor(); ?>',
        'border-left-color': '<?php $this->options->loadingcolor(); ?>'
    });
    setTimeout(function() {
        NProgress.done();
        $('.fade').removeClass('out');
    }, <?php $this->options->loadingbuffer(); ?>);
</script>
<?php endif; ?>

<?php if (!empty($this->options->switch) && in_array('SmoothScroll', $this->options->switch) && UACheck::is !== "Safari"): ?>
<?php if (!empty($this->options->CDNURL)): ?>
<script src="<?php $this->options->CDNURL() ?>/MaterialCDN/js/smoothscroll.js" async></script>
<?php else: ?>
<script src="<?php $this->options->themeUrl('js/smoothscroll.js'); ?>" async></script>
<?php endif; ?>
<?php endif; ?>

<?php if (!empty($this->options->switch) && in_array('atargetblank', $this->options->switch)): ?>
<script>
    //Add target="_blank" to a tags
    $(document).bind('DOMNodeInserted', function(event) {
        $('a[href^="http"]').each(
            function() {
                if (!$(this).attr('target')) {
                    $(this).attr('target', '_blank')
                }
            }
        );
    });
</script>
<?php endif; ?>

<!-- Pangu js -->
<?php if (!empty($this->options->switch) && in_array('Pangu', $this->options->switch)): ?>
  <?php if (!empty($this->options->CDNURL)): ?>
      <script src="<?php $this->options->CDNURL() ?>/MaterialCDN/js/pangu.min.js"></script>
  <?php else: ?>
      <script src="<?php $this->options->themeUrl('js/pangu.min.js'); ?>"></script>
  <?php endif; ?>
  <script> pangu.spacingPage(); </script>
<?php endif; ?>

<!-- highlight js -->
<?php if (!empty($this->options->switch) && in_array('HighLight', $this->options->switch)): ?>
  <?php if (!empty($this->options->CDNURL)): ?>
      <script src="<?php $this->options->CDNURL() ?>/MaterialCDN/js/highlight.min.js"></script>
      <link href="<?php $this->options->CDNURL() ?>/MaterialCDN/css/highlight.min.css" rel="stylesheet">
  <?php else: ?>
      <script src="<?php $this->options->themeUrl('js/highlight.min.js'); ?>"></script>
      <link href="<?php $this->options->themeUrl('css/highlight.min.css'); ?>" rel="stylesheet">
  <?php endif; ?>
  <script> hljs.initHighlightingOnLoad(); </script>
<?php endif; ?>

<!-- localsearch (beta) -->
<?php if (!empty($this->options->searchis) && $this->options->searchis == '1'): ?>
<script>
    var inputArea = document.querySelector('#search');
            var getSearchFile = function() {
                var path = '<?php echo $this->options->LocalsearchURL ?>';
                searchFunc(path, 'search', 'local-search-result');
            }

            if(inputArea) {
                inputArea.onfocus = function() {
                    getSearchFile();
                }
            }
</script>
<script>
    var searchFunc = function(path, search_id, content_id) {
        'use strict';
        $.ajax({
            url: path,
            dataType: 'xml',
            success: function( xmlResponse ) {
                // get the contents from search data
                var datas = $( 'entry', xmlResponse ).map(function() {
                    return {
                        title: $( 'title', this ).text(),
                        content: $('content',this).text(),
                        url: $( 'url' , this).text()
                    };
                }).get();
                var $input = document.getElementById(search_id);
                var $resultContent = document.getElementById(content_id);
                $input.addEventListener('input', function() {
                    var str='<ul class=\"search-result-list\">';
                    var keywords = this.value.trim().toLowerCase().split(/[\s\-]+/);
                    $resultContent.innerHTML = '';
                    if (this.value.trim().length <= 0) {
                        return;
                    }
                    // perform local searching
                    datas.forEach(function(data) {
                        var isMatch = true;
                        var content_index = [];
                        var data_title = data.title.trim().toLowerCase();
                        var data_content = data.content.trim().replace(/<[^>]+>/g,'').toLowerCase();
                        var data_url = data.url;
                        var index_title = -1;
                        var index_content = -1;
                        var first_occur = -1;
                        // only match artiles with not empty titles and contents
                        if(data_title !== '' && data_content !== '') {
                            keywords.forEach(function(keyword, i) {
                                index_title = data_title.indexOf(keyword);
                                index_content = data_content.indexOf(keyword);
                                if( index_title < 0 && index_content < 0 ) {
                                    isMatch = false;
                                } else {
                                    if (index_content < 0) {
                                        index_content = 0;
                                    }
                                    if (i === 0) {
                                        first_occur = index_content;
                                    }
                                }
                            });
                        }
                        // show search results
                        if (isMatch) {
                            str += '<li><a href="'+ data_url +'" class="search-result-title" target="_blank">'+ data_title;
                            var content = data.content.trim().replace(/<[^>]+>/g, '');
                            if (first_occur >= 0) {
                                // cut out characters
                                var start = first_occur - 6;
                                var end = first_occur + 6;
                                if (start < 0) {
                                    start = 0;
                                }
                                if (start === 0) {
                                    end = 10;
                                }
                                if (end > content.length) {
                                    end = content.length;
                                }
                                var match_content = content.substr(start, end);
                                // highlight all keywords
                                keywords.forEach(function(keyword) {
                                    var regS = new RegExp(keyword, 'gi');
                                    match_content = match_content.replace(regS, '<em class="search-keyword">'+keyword+'</em>');
                                })
                                str += '<p class="search-result">' + match_content + '...</p>' +'</a>';
                            }
                        }
                    });
                    $resultContent.innerHTML = str;
                });
            }
        });
    }
</script>
<?php endif; ?>

<?php $this->footer(); ?>

</body>
</html>
