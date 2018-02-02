<?php
/**
 * 主题设置
 */
function themeFields($layout) {
    $picUrl = new Typecho_Widget_Helper_Form_Element_Text('picUrl', NULL, NULL, _t('图片地址'), _t('在这里填入一个图片 URL 地址, 作为文章的头图'));
    $layout->addItem($picUrl);

    Helper::options()->commentsAntiSpam = false; 
}
function themeConfig($form)
{

    $tools = new themeOptions;
    
    echo "
    <style>
        body{
            background-color:#F5F5F5;
        }
        @media screen and (min-device-width: 1024px) {
            ::-webkit-scrollbar-track {
            	background-color: rgba(255,255,255,0);
            }
            ::-webkit-scrollbar {
            	width: 6px;
            	background-color: rgba(255,255,255,0);
            }
            ::-webkit-scrollbar-thumb {
                border-radius: 3px;
            	background-color: rgba(193,193,193,1);
            }
        }
        .typecho-head-nav{
            background-color:#673AB7;
        }
        #typecho-nav-list .parent a:hover, #typecho-nav-list .focus .parent a, #typecho-nav-list .root:hover .parent a{
            background: RGBA(255, 255, 255, 0);
        }
        #typecho-nav-list{
            display: none;
        }
        .typecho-head-nav .operate a{
            border:0;
            color:rgba(255,255,255,.6);
        }
        .typecho-head-nav .operate a:hover,
        .typecho-head-nav .operate a:focus{
            color:rgba(255,255,255,.8);
            background-color:#673AB7;
            outline:none;
        }
        .body.container{
            min-width: 100% !important;
            padding:0px;
        }
        .row {
            margin:0px;
        }
        .col-mb-12{
            padding:0 !important;
        }
        .typecho-page-title{
            height:100px;
            padding: 10px 40px 20px 40px;
            background-color:#673AB7;
            color:#FFF;
            font-size: 24px;
        }
        .typecho-option-tabs{
            padding: 0;
            margin: 0;
            height: 60px;
            background-color: #512DA8;
            margin-bottom: 40px !important;
            padding-left:25px;
        }
        .typecho-option-tabs li{
            margin: 0;
            border: none;
            float: left;
            position: relative;
            display: block;
            text-align: center;
            font-weight: 500;
            font-size: 14px;
            text-transform: uppercase;
        }
        .typecho-option-tabs a{
            height:auto;
            border:0;
            color: rgba(255,255,255,.6);
            background-color:rgba(255,255,255,0) !important;
            padding: 17px 24px;
        }
        .typecho-option-tabs a:hover{
            color:rgba(255,255,255,.8);
        }
        .message{
            background-color:#673AB7 !important;
            color:#fff;
        }
        .success{
            background-color:#673AB7;
            color:#fff;
        }
        .current{
            background-color: #FFF;
            height: 4px;
            padding:0 !important;
            bottom:0px;
        }
        .current a{
            color:#FFF;
        }
        input[type=text],
        textarea{
            border: none;
            border-bottom: 1px solid rgba(0,0,0,.60);
            outline:none;
            border-radius:0;
        }
        .typecho-option span{
            margin-right:0;
        }
        .typecho-option-submit{
            position: fixed;
            right: 32px;
            bottom: 32px;
        }
        .typecho-option-submit button{
            float:right;
            background: #00BCD4;
            box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);
            color: #FFF;
        }
        .typecho-page-main .typecho-option textarea{
            height:149px;
        }
        .typecho-option label.typecho-label{
            font-weight: 500;
            margin-bottom: 20px;
            margin-top: 10px;
            font-size: 16px;
            padding-bottom: 5px;
            border-bottom: 1px solid rgba(0,0,0,0.2);
        }
        #use-intro{
            box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);
            background-color: #fff;
            margin: 8px;
            padding: 8px;
            padding-left:20px;
            margin-bottom: 40px;
        }
        .typecho-foot{
            padding: 16px 40px;
            color: rgb(158, 158, 158);
            margin-top: 80px;
        }
        form, botton{
            display: none
        }
    </style>
    ";

    //echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/zdhxiong/mdui@0.3.0/dist/css/mdui.min.css">
    //<script src="https://cdn.jsdelivr.net/gh/zdhxiong/mdui@0.3.0/dist/js/mdui.min.js"></script>';

    echo '<link href="https://cdn.bootcss.com/mdui/0.4.0/css/mdui.min.css" rel="stylesheet">' . 
    '<script src="https://cdn.bootcss.com/mdui/0.4.0/js/mdui.min.js"></script>';

    echo "<script>mdui.JQ(function () { $('form:eq(0)').attr('action', $('form:eq(1)').attr('action')); });</script>";

    echo '<form action="" method="post" enctype="application/x-www-form-urlencoded" style="display: block!important">
    <div class="mdui-panel" mdui-panel>
      <div class="mdui-panel-item mdui-panel-item-open">
        <div class="mdui-panel-item-header">介绍</div>
        <div class="mdui-panel-item-body">';

    echo '<p style="font-size:14px;">
        <span style="display: block;
        margin-bottom: 10px;
        margin-top: 10px;
        font-size: 16px;">感谢您使用 Material 主题</span>
        <span style="margin-bottom:10px;display:block">请关注 <a href="https://github.com/idawnlight/typecho-theme-material" target="_blank" style="color:#3384da;font-weight:bold;text-decoration:underline">Github-Material</a> 以获得<span style="color:#df3827;font-weight:bold;">最新版本支持</span></span>
        <a href="mailto:i@lim-light.com" >帮助&支持</a> &nbsp;
        <a href="https://github.com/idawnlight/typecho-theme-material/issues" target="_blank">建议&反馈</a><br><br>';
    echo '当前版本 ' . MATERIAL_VERSION . '<span id="update"></span><script type="text/javascript" src="https://api.lim-light.com/update/material.php?version=' . MATERIAL_VERSION . '&encode=js-html&front=，" async defer></script>';
    echo '</p>';

    echo '</div>
      </div>
      <div class="mdui-panel-item">
        <div class="mdui-panel-item-header">功能设定</div>
        <div class="mdui-panel-item-body">';
    
    $tools->checkbox("功能开关",
    array(
        'ShowPixiv' => '侧边栏显示 mokeyjay 的 pixiv 挂件',
        'SmoothScroll' => '平滑滚动效果',
        'ShowLoadingLine' => '顶部 loading 加载进度条效果',
        'atargetblank' => '链接以新标签页形式打开',
        'Pangu' => '引用 Pangu.js 实现中英文间自动添加空格',
        'PanguPHP' => '引用 Pangu.PHP 后端实现中英文间自动添加空格',
        'HighLight' => '引用 highlight.js 实现代码高亮',
        'Lazyload' => '图片延迟加载（文章内）'
    ), "switch");

    $tools->radio("文章评论",
    array(
        0 => "原生评论"
    ), "commentis");

    $tools->radio("搜索设置",
    array(
        0 => "Typecho 原生搜索",
        1 => "本地搜索（即时搜索）"
    ), "searchis", "需要手动创建索引页（独立页面模板->文章索引）");

    $tools->input("本地搜索索引页链接", "LocalsearchURL", "仅在启用即时搜索时需要填写");

    $tools->radio("CDN 类型",
    array(
        0 => '不启用 CDN',
        1 => 'jsDelivr',
        2 => '自定义'
    ), "CDNType", "");

    $tools->input("CDN 地址", "CDNURL", "仅在使用自定义 CDN 时需要填写<br>创建一个文件夹，把 <b>css, fonts, img, js</b> 文件夹放进去，上传到到你的 CDN 储存空间根目录下<br />
    填入你的 CDN 地址, 如 <b>https://cdn.example.com/MaterialCDN</b> 或 <b>https://root.example.com</b>");

    $tools->radio("界面语言设置",
    array(
        0 => 'English',
        1 => '简体中文'
    ), "langis", "默认使用简体中文");

    $tools->checkbox("页脚 SNS 图标按钮显示设置",
    array(
        'ShowBilibili' => '哔哩哔哩 &emsp;',
        'ShowWeibo' => '新浪微博 &emsp;',
        'ShowZhihu' => '知乎 &emsp;<br />',            
        'ShowTwitter' => 'Twitter &emsp;',
        'ShowV2EX' => 'V2EX &emsp;',
        'ShowFacebook' => 'Facebook &emsp;',
        'ShowGooglePlus' => 'Google+ &emsp;<br />',
        'ShowInstagram' => 'Instagram&emsp;',
        'ShowGithub' => 'Github &emsp;',
        'ShowTumblr' => 'Tumblr &emsp;<br />',
        'ShowTelegram' => 'Telegram &emsp;',
        'ShowLinkedin' => 'Linkedin &emsp;',
    ), "footersns", "开启后, 按钮显示于博客页脚位置");

    $tools->multiInput("SNS 地址",
    array(
        "BilibiliURL" => "哔哩哔哩 地址",
		"WeiboURL" => "新浪微博 地址",
		"ZhihuURL" => "知乎 地址",
		"TwitterURL" => "Twitter 地址",
		"V2EXURL" => "V2EX 地址",
		"FacebookURL" => "Facebook 地址",
		"GooglePlusURL" => "Google+ 地址",
		"InstagramURL" => "Instagram 地址",
		"GithubURL" => "Github 地址",
		"TumblrURL" => "Tumblr 地址",
		"TelegramURL" => "Telegram 地址",
		"LinkedinURL" => "Linkedin 地址"
    ));

    $tools->radio("Roboto 字体使用来源",
    array(
        0 => "调用 Google fonts (使用 https://lug.ustc.edu.cn 中科大 https 镜像加速)",
        1 => "调用 Google fonts (使用 https://fonts.cat.net 镜像加速)",
        2 => "调用主题文件夹自带的 Roboto （或 CDN 中）",
        3 => "使用自定义字体源 (在\"网站统计代码 + 自定义字体源\"填入)"
    ), "RobotoSource");

    $tools->textarea("网站统计代码 + 自定义字体源", "analysis", "填入如 Google Analysis 的第三方统计代码或字体源<br>Tip：位于页尾");

    $tools->textarea("文章底部 Adsense", "adsense", "填入 Google Adsense 的广告代码");

    $tools->textarea("DNS 预加载", "DNSPrefetch", "一行一个，如 <b>//dns.example.com</b>");   

    echo '</div></div>
    <div class="mdui-panel-item">
    <div class="mdui-panel-item-header">外观设置</div>
    <div class="mdui-panel-item-body">';

	$tools->input('Loading 加载进度条颜色', 'loadingcolor', '打开 "功能开关" 中的 loading 加载进度条后, 在这里设置进度条的颜色');

	$tools->input('Loading 加载缓冲时间', 'loadingbuffer', 'loading 加载进度条的缓冲时间, 单位为毫秒 ms, 默认为 800ms');

    $tools->radio("背景设置",
    array(
        0 => '纯色背景 &emsp;',
        1 => '图片背景 &emsp;',
        2 => '渐变背景 &emsp;'
    ), "BGtype", "选择背景方案, 对应填写下方的 '<b>背景颜色 / 图片</b>' 或选择 '<b>渐变样式</b>'");

    $tools->input("背景颜色 / 图片", "bgcolor", "背景设置如果选择纯色背景, 这里就填写颜色代码; <br />背景设置如果选择图片背景, 这里就填写图片地址;<br />
    不填写则默认显示 #F5F5F5 或主题文件夹下的 /img/bg.jpg");

    $tools->radio("渐变样式",
    array(
        0 => 'Aerinite',
        1 => 'Ethereal',
        2 => 'Patrichor',
        3 => 'Komorebi',
        4 => 'Crepuscular',
        5 => 'Autumn',
        6 => 'Shore',
        7 => 'Horizon',
        8 => 'Green Beach',
        9 => 'Virgin'
    ), "GradientType", "背景设置如果选择渐变背景, 在这里选择想要的渐变样式<br>至于这些是什么意思，你去问 viosey 啊");

    $tools->radio("缩略图显示效果",
    array(
        0 => "显示文章内第一张图片 (若无图片则显示随机图)",
        1 => "只显示纯色",
        2 => "只显示随机图片"
    ), "ThumbnailOption");
    
    $tools->input("缩略图为纯色时的颜色", "TitleColor", "填入颜色代码");

    $tools->input("随机缩略图数量", "RandomPicAmnt", "img/random 图片的数量");

    $tools->input("主题颜色", "ThemeColor");

    $tools->input("超链接颜色", "alinkcolor");

    $tools->input("Android Chrome 地址栏颜色", "ChromeThemeColor");

    $tools->input("按钮颜色", "ButtonThemeColor");

    $tools->input("卡片阴影", "CardElevation", "默认为 2");

    $tools->input("评论框行数", "CommentRows", "默认为 1");

    $tools->input("个人头像地址", "avatarURL", "填入头像的地址, 如不填写则使用默认头像");    

    $tools->input("favicon 地址", "favicon", "填入博客 favicon 的地址, 默认则不显示");

    $tools->input("侧边栏顶部图片", "sidebarheader", "填入图片地址, 如不填写则使用默认图片");

    $tools->input("首页顶部左边的图片地址", "dailypic", "填入图片地址, 图片显示在首页顶部左边位置");

    $tools->input("首页顶部右边 LOGO 图片地址", "logo", "填入 LOGO 地址, 图片将显示于首页右上角板块");

    $tools->radio("首页顶部右边 LOGO 图片大小",
    array(
        0 => "标准",
        1 => "更大"
    ), "logosize");

    $tools->input("首页顶部左边图片的点击跳转地址", "dailypicLink", "点击图片后, 想要跳转网页的地址");

    $tools->input("首页顶部右边 LOGO 的点击跳转地址", "logoLink", "点击 LOGO 后, 想要跳转网页的地址");

    $tools->input("首页顶部左边的标语", "slogan", "填入自定义文字, 显示于首页顶部左边的图片上");

    $tools->input("自定义字体", "CustomFonts", "主题的 font-family，通常不建议修改");


    echo '</div></div></div>
      
    <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-deep-purple-accent" style="display: block!important; position: fixed; right: 32px; bottom: 32px;">保存</button>
    </form>';


    
    $switch = new Typecho_Widget_Helper_Form_Element_Checkbox('switch',
    array(
        'ShowPixiv' => _t('侧边栏显示 mokeyjay 的 pixiv 挂件'),
        'SmoothScroll' => _t('平滑滚动效果'),
        'ShowLoadingLine' => _t('顶部 loading 加载进度条效果'),
        'atargetblank' => _t('链接以新标签页形式打开'),
        'Pangu' => _t('引用 Pangu.js 实现中英文间自动添加空格'),
        'PanguPHP' => _t('引用 Pangu.PHP 后端实现中英文间自动添加空格'),
        'HighLight' => _t('引用 highlight.js 实现代码高亮'),
        'Lazyload' => _t('图片延迟加载（文章内）')
    ),

    //Default choose
    array('SmoothScroll','ShowLoadingLine','PanguPHP','HighLight'), _t('<span style="font-size: large" id="function"><strong>功能设定</strong></span><br /><br />功能开关')
    );
    $form->addInput($switch->multiMode());

    $commentis = new Typecho_Widget_Helper_Form_Element_Radio('commentis',
        array(
            '0' => _t('使用原生评论 &emsp;'),
        ),

        '0', _t('文章评论'), _t("默认使用原生评论")
    );
    $form->addInput($commentis);

    $searchis = new Typecho_Widget_Helper_Form_Element_Radio('searchis',
        array(
            '0' => _t('使用 Typecho 原生搜索 &emsp;'),
            '1' => _t('使用本地搜索（即时搜索）（Beta）'),
        ),

        '0', _t('搜索设置'), _t("默认使用原生搜索；本地搜索移植自 hexo 版，需要手动创建索引页")
    );
    $form->addInput($searchis);

    $LocalsearchURL = new Typecho_Widget_Helper_Form_Element_Text('LocalsearchURL', null, null, _t('本地搜索索引页链接'), _t('仅在启用即时搜索时需要填写'));
    $form->addInput($LocalsearchURL);

    $CDNType = new Typecho_Widget_Helper_Form_Element_Radio('CDNType',
        array(
            '0' => _t('不启用 CDN'),
            '1' => _t('jsDelivr'),
            '2' => _t('自定义'),
        ),

        '0', _t('MaterialCDN 类型'), _t("推荐使用 jsDelivr（注意，当你使用激进的开发版时，部分资源可能加载失败）")
    );
    $form->addInput($CDNType);

    $CDNURL = new Typecho_Widget_Helper_Form_Element_Text('CDNURL', null, null, _t('CDN 地址'), _t("
    创建一个文件夹，把 <b>css, fonts, img, js</b> 文件夹放进去，上传到到你的 CDN 储存空间根目录下<br />
    填入你的 CDN 地址, 如 <b>https://material.lim-light.com/MaterialCDN</b>"));
    $form->addInput($CDNURL);

    $langis = new Typecho_Widget_Helper_Form_Element_Radio('langis',
        array(
            '0' => _t('English <br />'),
            '1' => _t('简体中文 <br />'),
        ),

        '1', _t('界面语言设置'), _t("默认使用简体中文")
    );
    $form->addInput($langis);

    $footersns = new Typecho_Widget_Helper_Form_Element_Checkbox('footersns',
        array(
            'ShowBilibili' => _t('哔哩哔哩 &emsp;'),
            'ShowWeibo' => _t('新浪微博 &emsp;'),
            'ShowZhihu' => _t('知乎 &emsp;<br />'),            
            'ShowTwitter' => _t('Twitter &emsp;'),
            'ShowV2EX' => _t('V2EX &emsp;'),
            'ShowFacebook' => _t('Facebook &emsp;'),
            'ShowGooglePlus' => _t('Google+ &emsp;<br />'),
            'ShowInstagram' => _t('Instagram&emsp;'),
            'ShowGithub' => _t('Github &emsp;'),
            'ShowTumblr' => _t('Tumblr &emsp;<br />'),
            'ShowTelegram' => _t('Telegram &emsp;'),
            'ShowLinkedin' => _t('Linkedin &emsp;'),
        ),

        array('ShowTwitter','ShowFacebook','ShowGooglePlus'), _t('页脚 SNS 图标按钮显示设置'), _t('开启后, 按钮显示于博客页脚位置')
    );
    $form->addInput($footersns);

    $BilibiliURL = new Typecho_Widget_Helper_Form_Element_Text('BilibiliURL', null, null, _t('哔哩哔哩 地址'), null);
    $form->addInput($BilibiliURL);

    $WeiboURL = new Typecho_Widget_Helper_Form_Element_Text('WeiboURL', null, null, _t('新浪微博 地址'), null);
    $form->addInput($WeiboURL);

    $ZhihuURL = new Typecho_Widget_Helper_Form_Element_Text('ZhihuURL', null, null, _t('知乎 地址'), null);
    $form->addInput($ZhihuURL);
    
    $TwitterURL = new Typecho_Widget_Helper_Form_Element_Text('TwitterURL', null, null, _t('Twitter 地址'), null);
    $form->addInput($TwitterURL);

    $V2EXURL = new Typecho_Widget_Helper_Form_Element_Text('V2EXURL', null, null, _t('V2EX 地址'), null);
    $form->addInput($V2EXURL);

    $FacebookURL = new Typecho_Widget_Helper_Form_Element_Text('FacebookURL', null, null, _t('Facebook 地址'), null);
    $form->addInput($FacebookURL);

    $GooglePlusURL = new Typecho_Widget_Helper_Form_Element_Text('GooglePlusURL', null, null, _t('Google+ 地址'), null);
    $form->addInput($GooglePlusURL);

    $InstagramURL = new Typecho_Widget_Helper_Form_Element_Text('InstagramURL', null, null, _t('Instagram 地址'), null);
    $form->addInput($InstagramURL);

    $GithubURL = new Typecho_Widget_Helper_Form_Element_Text('GithubURL', null, null, _t('Github 地址'), null);
    $form->addInput($GithubURL);

    $TumblrURL = new Typecho_Widget_Helper_Form_Element_Text('TumblrURL', null, null, _t('Tumblr 地址'), null);
    $form->addInput($TumblrURL);

    $TelegramURL = new Typecho_Widget_Helper_Form_Element_Text('TelegramURL', null, null, _t('Telegram 地址'), null);
    $form->addInput($TelegramURL);

    $LinkedinURL = new Typecho_Widget_Helper_Form_Element_Text('LinkedinURL', null, null, _t('Linkedin 地址'), null);
    $form->addInput($LinkedinURL);

    $CustomFonts = new Typecho_Widget_Helper_Form_Element_Text('CustomFonts', null, _t("Roboto, 'Helvetica Neue', Helvetica, 'PingFang SC', 'Hiragino Sans GB', 'Microsoft YaHei', '微软雅黑', Arial, sans-serif"), _t('自定义字体'), null);
    $form->addInput($CustomFonts);

    $RobotoSource = new Typecho_Widget_Helper_Form_Element_Radio('RobotoSource',
    array(
        '0' => _t('调用 Google fonts (使用 https://lug.ustc.edu.cn 中科大 https 镜像加速)<br />'),
        '1' => _t('调用 Google fonts (使用 https://fonts.cat.net 镜像加速)<br />'),
        '2' => _t('调用主题文件夹自带的 Roboto &emsp;<br />'),
        '3' => _t('使用自定义字体源 (在"网站统计代码 + 自定义字体源"填入)')
    ),

    '2', _t('Roboto 字体使用来源'), null);
    $form->addInput($RobotoSource);

    $analysis = new Typecho_Widget_Helper_Form_Element_Textarea('analysis', null, null, _t('网站统计代码 + 自定义字体源'), _t('填入如 Google Analysis 的第三方统计代码或字体源'));
    $form->addInput($analysis);

    $adsense = new Typecho_Widget_Helper_Form_Element_Textarea('adsense', null, null, _t('文章底部 Adsense'), _t('填入 Google Adsense 广告代码'));
    $form->addInput($adsense);

    $DNSPrefetch = new Typecho_Widget_Helper_Form_Element_Textarea('DNSPrefetch', null, null, _t('DNS 预加载'), _t('一行一个，如 <b>//dns.example.com</b>'));
    $form->addInput($DNSPrefetch);

    $loadingcolor = new Typecho_Widget_Helper_Form_Element_Text('loadingcolor', null, _t('#29d'), _t('<br><span style="font-size: large" id="style"><strong>样式设定</strong></span><br><br>loading 加载进度条颜色'), _t('打开 "功能开关" 中的 loading 加载进度条后, 在这里设置进度条的颜色'));
    $form->addInput($loadingcolor);

    $loadingbuffer = new Typecho_Widget_Helper_Form_Element_Text('loadingbuffer', null, _t('800'), _t('loading 加载缓冲时间'), _t('loading 加载进度条的缓冲时间, 单位为毫秒 ms, 默认为 800ms'));
    $form->addInput($loadingbuffer);

    $BGtype = new Typecho_Widget_Helper_Form_Element_Radio('BGtype',
        array(
            '0' => _t('纯色背景 &emsp;'),
            '1' => _t('图片背景 &emsp;'),
            '2' => _t('渐变背景 &emsp;')
        ),

        '0', _t('背景设置'), _t("选择背景方案, 对应填写下方的 '<b>背景颜色 / 图片</b>' 或选择 '<b>渐变样式</b>', 这里默认使用图片背景.")
    );
    $form->addInput($BGtype);

    $bgcolor = new Typecho_Widget_Helper_Form_Element_Text('bgcolor', null, _t('#F5F5F5'), _t('背景颜色 / 图片'), _t('背景设置如果选择纯色背景, 这里就填写颜色代码; <br />背景设置如果选择图片背景, 这里就填写图片地址;<br />
    不填写则默认显示 #F5F5F5 或主题文件夹下的 /img/bg.jpg'));
    $form->addInput($bgcolor);

    $GradientType = new Typecho_Widget_Helper_Form_Element_Radio('GradientType',
        array(
            '0' => _t('Aerinite &emsp;'),
            '1' => _t('Ethereal &emsp;'),
            '2' => _t('Patrichor <br />'),
            '3' => _t('Komorebi &emsp;'),
            '4' => _t('Crepuscular &emsp;'),
            '5' => _t('Autumn <br />'),
            '6' => _t('Shore &emsp;'),
            '7' => _t('Horizon &emsp;'),
            '8' => _t('Green Beach <br />'),
            '9' => _t('Virgin <br />'),
        ),

        '0', _t('渐变样式'), _t("背景设置如果选择渐变背景, 在这里选择想要的渐变样式.")
    );
    $form->addInput($GradientType);

    $ThumbnailOption = new Typecho_Widget_Helper_Form_Element_Radio('ThumbnailOption',
        array(
            '1' => _t('显示文章内第一张图片 (若无图片则显示随机图片)<br />'),
            '2' => _t('只显示纯色 &emsp;'),
            '3' => _t('只显示随机图片'),
        ),

        '1', _t('缩略图显示效果')
    );
    $form->addInput($ThumbnailOption);

    $TitleColor = new Typecho_Widget_Helper_Form_Element_Text('TitleColor', null, _t('#FFF'), _t('缩略图为纯色时的颜色'), _t('填入颜色代码'));
    $form->addInput($TitleColor);

    $RandomPicAmnt = new Typecho_Widget_Helper_Form_Element_Text('RandomPicAmnt', null, _t('19'), _t('随机缩略图数量'), _t('img/random 图片的数量'));
    $form->addInput($RandomPicAmnt);

    $ThemeColor = new Typecho_Widget_Helper_Form_Element_Text('ThemeColor', null, _t('#0097A7'), _t('主题颜色'), null);
    $form->addInput($ThemeColor);

    $alinkcolor = new Typecho_Widget_Helper_Form_Element_Text('alinkcolor', null, _t('#00838F'), _t('超链接颜色'), null);
    $form->addInput($alinkcolor);

    $ChromeThemeColor = new Typecho_Widget_Helper_Form_Element_Text('ChromeThemeColor', null, _t('#0097A7'), _t('Android Chrome 地址栏颜色'), null);
    $form->addInput($ChromeThemeColor);

    $ButtonThemeColor = new Typecho_Widget_Helper_Form_Element_Text('ButtonThemeColor', null, _t('#757575'), _t('按钮颜色'), null);
    $form->addInput($ButtonThemeColor);

    $CardElevation = new Typecho_Widget_Helper_Form_Element_Text('CardElevation', null, _t('2'), _t('卡片阴影'), _t('默认为 2'));
    $form->addInput($CardElevation);

    $CommentRows = new Typecho_Widget_Helper_Form_Element_Text('CommentRows', null, _t('1'), _t('评论框行数'), _t('默认为 1'));
    $form->addInput($CommentRows);

    $avatarURL = new Typecho_Widget_Helper_Form_Element_Text('avatarURL', null, null, '个人头像地址', '填入头像的地址, 如不填写则使用默认头像');
    $form->addInput($avatarURL);

    $favicon = new Typecho_Widget_Helper_Form_Element_Text('favicon', null, null, _t('favicon 地址'), _t('填入博客 favicon 的地址, 默认则不显示'));
    $form->addInput($favicon);

    $sidebarheader = new Typecho_Widget_Helper_Form_Element_Text('sidebarheader', null, null, _t('侧边栏顶部图片'), _t('填入图片地址, 如不填写则使用默认图片'));
    $form->addInput($sidebarheader);

    $dailypic = new Typecho_Widget_Helper_Form_Element_Text('dailypic', null, null, _t('首页顶部左边的图片地址'), _t('填入图片地址, 图片显示在首页顶部左边位置'));
    $form->addInput($dailypic);

    $logo = new Typecho_Widget_Helper_Form_Element_Text('logo', null, null, _t('首页顶部右边 LOGO 图片地址'), _t('填入 LOGO 地址, 图片将显示于首页右上角板块'));
    $form->addInput($logo);

    $logosize = new Typecho_Widget_Helper_Form_Element_Radio('logosize',
    array(
        '1' => _t('标准 &emsp;'),
        '2' => _t('更大 &emsp;'),
    ),

        '1', _t('首页顶部右边 LOGO 图片地址大小'), _t('仅在使用自定义图片时有效')
    );
    $form->addInput($logosize);

    $dailypicLink = new Typecho_Widget_Helper_Form_Element_Text('dailypicLink', null, _t('#'), _t('首页顶部左边图片的点击跳转地址'), _t('点击图片后, 想要跳转网页的地址'));
    $form->addInput($dailypicLink);

    $logoLink = new Typecho_Widget_Helper_Form_Element_Text('logoLink', null, null, _t('首页顶部右边 LOGO 的点击跳转地址'), _t('点击 LOGO 后, 想要跳转网页的地址'));
    $form->addInput($logoLink);

    $slogan = new Typecho_Widget_Helper_Form_Element_Text('slogan', null, _t('Hi, nice to meet you'), _t('首页顶部左边的标语'), _t('填入自定义文字, 显示于首页顶部左边的图片上'));
    $form->addInput($slogan);

}