<?php
/**
 * 主题设置
 */
function themeFields($layout) {
    $picUrl = new Typecho_Widget_Helper_Form_Element_Text('picUrl', NULL, NULL, _t('图片地址'), _t('在这里填入一个图片 URL 地址, 作为文章的头图'));
    $layout->addItem($picUrl);

    $description = new Typecho_Widget_Helper_Form_Element_Text('description', NULL, NULL, _t('描述'), _t('此文章的描述，用于 SEO 优化'));
    $layout->addItem($description);
}
function themeConfig($form) {
    $Render = new Render ($form);
    $Render->panel("main", NULL, NULL,
        $Render->panel("item", "简介", NULL, '<p style="font-size:14px;">
        <span style="display: block; margin-bottom: 10px; margin-top: 10px; font-size: 16px;">感谢您使用 Material 主题</span>
        <span style="margin-bottom:10px;display:block">请关注 <a href="https://github.com/idawnlight/typecho-theme-material" target="_blank" style="color:#3384da;font-weight:bold;text-decoration:underline">Github-Material</a> 以获得<span style="color:#df3827;font-weight:bold;">最新版本支持</span></span>
        <a href="mailto:i@lim-light.com" >帮助&支持</a> &nbsp;
        <a href="https://github.com/idawnlight/typecho-theme-material/issues" target="_blank">建议&反馈</a><br><br>当前版本 ' . MATERIAL_VERSION . '<span id="update"></span><script type="text/javascript" src="https://api.lim-light.com/update/material.php?version=' . MATERIAL_VERSION . '&encode=js-html&front=，" async defer></script></p>', true, false). 
        $Render->panel("item", "功能设定", "基础的功能",
            $Render->panel("item", "功能开关", NULL, 
                 $Render->checkbox("switch", "功能开关", NULL, 
                 ['ShowPixiv' => '侧边栏显示 mokeyjay 的 pixiv 挂件',
                 'SmoothScroll' => '平滑滚动效果',
                 'ShowLoadingLine' => '顶部 loading 加载进度条效果',
                 'atargetblank' => '链接以新标签页形式打开',
                 'Pangu' => '引用 Pangu.js 实现中英文间自动添加空格',
                 'PanguPHP' => '引用 Pangu.PHP 后端实现中英文间自动添加空格',
                 'HighLight' => '引用 highlight.js 实现代码高亮',
                 'Lazyload' => '图片延迟加载（文章内）'], ['SmoothScroll', 'ShowLoadingLine', 'PanguPHP', 'HighLight'])
            ).
            $Render->panel("item", "文章评论", NULL,
                $Render->panel("item", "文章评论类型", NULL,
                    $Render->radio("commentis", "文章评论类型", NULL, [0 => "原生评论"], 0)
                ).
                $Render->panel("item", "评论框行数", NULL,
                    $Render->input("CommentRows", "评论框行数", "默认为 1", 1)
                )
            ).
            $Render->panel("item", "文章二维码", NULL,
                $Render->radio("qrcode", "文章二维码", NULL, 
                [0 => "LWL12 ( api.lwl12.com )",
                1 => "journey.ad ( api.imajd.cn )",
                2 => "Google Chart ( chart.apis.google.com )",
                3 => "不显示二维码"], 0)
            ).
            $Render->panel("item", "搜索设置", NULL,
                $Render->radio("searchis", "搜索设置", NULL, [0 => "Typecho 原生搜索", 1 => "本地搜索（即时搜索）"], 1)
            ).
            $Render->panel("item", "CDN 类型", NULL,
                $Render->radio("CDNType", "CDN 类型", NULL, [0 => '不启用 CDN', 1 => 'jsDelivr', 2 => '自定义'], 0) .
                $Render->input("CDNURL", "CDN 地址", "仅在使用自定义 CDN 时需要填写<br>创建一个文件夹，把 <b>css, fonts, img, js</b> 文件夹放进去，上传到到你的 CDN 储存空间根目录下<br />
                填入你的 CDN 地址, 如 <b>https://cdn.example.com/MaterialCDN</b> 或 <b>https://root.example.com</b>")
            ).
            $Render->panel("item", "语言", NULL, 
                 $Render->radio("language", "语言", NULL, 
                 ["ar" => "العَرَبِيَّة", 
                 "de" => "Deutsch", 
                 "en" => "English", 
                 "es" => "Español", 
                 "fr" => "Français", 
                 "ja" => "日本語", 
                 "ms" => "Malay", 
                 "pt-BR" => "Portuguese (Brazil)", 
                 "zh-CN" => "简体中文", 
                 "zh-TW" => "繁體中文"], "zh-CN")
            ).
            $Render->panel("item", "页脚 SNS", NULL,
            $Render->panel("item", "页脚 SNS 图标按钮显示设置", NULL,
                $Render->checkbox("footersns", "页脚 SNS 图标按钮显示设置", "开启后，按钮显示于博客页脚位置", 
                    ['ShowBilibili' => '哔哩哔哩',
                    'ShowWeibo' => '新浪微博',
                    'ShowZhihu' => '知乎',
                    'ShowTwitter' => 'Twitter',
                    'ShowV2EX' => 'V2EX',
                    'ShowFacebook' => 'Facebook',
                    'ShowGooglePlus' => 'Google+',
                    'ShowInstagram' => 'Instagram',
                    'ShowGithub' => 'Github',
                    'ShowTumblr' => 'Tumblr',
                    'ShowTelegram' => 'Telegram',
                    'ShowLinkedin' => 'Linkedin'], [])
                ).
                $Render->panel("item", "SNS 信息", NULL, 
                    $Render->input("FacebookURL", "Facebook").
                    $Render->input("TwitterURL", "Twitter").
                    $Render->input("GooglePlusURL", "Google Plus").
                    $Render->input("WeiboURL", "微博").
                    $Render->input("InstagramURL", "Instagram").
                    $Render->input("TumblrURL", "Tumblr").
                    $Render->input("GithubURL", "Github").
                    $Render->input("LinkedinURL", "Linkedin").
                    $Render->input("ZhihuURL", "知乎").
                    $Render->input("BilibiliURL", "哔哩哔哩").
                    $Render->input("TelegramURL", "Telegram").
                    $Render->input("V2EXURL", "V2EX")
                )
            ).
            $Render->panel("item", "文章版权", NULL,
                $Render->input("post_license", "文章版权", "你可以在每篇文章的结尾添加你的版权说明，支持 HTML 标签。License 以粗体显示，默认为空。 比如，你可这样设定 CC License。<br><b>&#84;&#104;&#105;&#115;&#32;&#98;&#108;&#111;&#103;&#32;&#105;&#115;&#32;&#117;&#110;&#100;&#101;&#114;&#32;&#97;&#32;&#60;&#97;&#32;&#104;&#114;&#101;&#102;&#61;&#34;&#47;&#99;&#114;&#101;&#97;&#116;&#105;&#118;&#101;&#99;&#111;&#109;&#109;&#111;&#110;&#115;&#46;&#104;&#116;&#109;&#108;&#34;&#32;&#116;&#97;&#114;&#103;&#101;&#116;&#61;&#34;&#95;&#98;&#108;&#97;&#110;&#107;&#34;&#62;&#67;&#67;&#32;&#66;&#89;&#45;&#78;&#67;&#45;&#83;&#65;&#32;&#51;&#46;&#48;&#32;&#85;&#110;&#112;&#111;&#114;&#116;&#101;&#100;&#32;&#76;&#105;&#99;&#101;&#110;&#115;&#101;&#60;&#47;&#97;&#62;</b>", NULL)
            ).
            $Render->panel("item", "Footer 文字", NULL,
                $Render->input("footer_text", "Footer 文字", "你可以在页面的 Footer 指定你想显示的文字，支持 HTML 标签；默认为空。 比如，备案号可以这样设定。<br><b>&#60;&#97;&#32;&#104;&#114;&#101;&#102;&#61;&#34;&#104;&#116;&#116;&#112;&#58;&#47;&#47;&#119;&#119;&#119;&#46;&#109;&#105;&#105;&#116;&#98;&#101;&#105;&#97;&#110;&#46;&#103;&#111;&#118;&#46;&#99;&#110;&#34;&#32;&#114;&#101;&#108;&#61;&#34;&#110;&#111;&#102;&#111;&#108;&#108;&#111;&#119;&#34;&#62;&#26576;&#73;&#67;&#80;&#22791;&#120;&#120;&#120;&#120;&#120;&#120;&#120;&#120;&#21495;&#45;&#120;&#60;&#47;&#97;&#62;</b>", NULL)
            ).
            $Render->panel("item", "Roboto 字体使用来源", NULL,
                $Render->radio("RobotoSource", "Roboto 字体使用来源", NULL, 
                [0 => "调用 Google fonts (使用 https://lug.ustc.edu.cn 镜像)",
                1 => "调用 Google fonts (使用 https://fonts.loli.net 镜像)",
                2 => "调用 Google fonts",
                3 => "不调用"]
                , 3)
            ).
            $Render->panel("item", "网站统计代码", NULL,
                $Render->textarea("analysis", "网站统计代码", "填入如 Google Analysis 的第三方统计代码", NULL)
            ).
            $Render->panel("item", "文章底部 Adsense", NULL,
                $Render->textarea("adsense", "文章底部 Adsense", "填入 Google Adsense 的广告代码", NULL)
            ).
            $Render->panel("item", "DNS 预加载", NULL,
                $Render->textarea("DNSPrefetch", "DNS 预加载", "一行一个，如 <b>//dns.example.com</b>", NULL)
            )
        ).
        $Render->panel("item", "外观设置", NULL,
            $Render->panel("item", "Loading 加载进度条颜色", NULL,
                $Render->input("loadingcolor", "Loading 加载进度条颜色", "打开 loading 加载进度条后, 在这里设置进度条的颜色", "#29d")
            ).
            $Render->panel("item", "Loading 加载缓冲时间", NULL,
                $Render->input("loadingbuffer", "Loading 加载缓冲时间", "loading 加载进度条的缓冲时间, 单位为毫秒 ms, 默认为 800ms", 800)
            ).
            $Render->panel("item", "搜索框文字颜色", NULL,
                $Render->input("SearchColor", "搜索框文字颜色", "填入颜色代码，用于适配浅色背景", NULL)
            ).
            $Render->panel("item", "背景设置", NULL,
                $Render->panel("item", "背景类型", NULL,
                    $Render->radio("BGtype", "背景类型", NULL, 
                    [0 => '纯色背景',
                    1 => '图片背景',
                    2 => '渐变背景'], 1)
                ).
                $Render->panel("item", "背景颜色 / 图片", NULL,
                    $Render->input("bgcolor", "背景颜色 / 图片", "背景设置如果选择纯色背景, 这里就填写颜色代码; <br />背景设置如果选择图片背景, 这里就填写图片地址;<br />不填写则默认显示 #F5F5F5 或主题文件夹下的 /img/bg.jpg", NULL)
                )
            ).
            $Render->panel("item", "缩略图显示效果", NULL,
                $Render->panel("item", "缩略图显示效果", NULL,
                    $Render->radio("ThumbnailOption", "缩略图显示效果", NULL, 
                    [1 => "显示文章内第一张图片或指定的图片 (若无图片则显示随机图)",
                    2 => "只显示纯色",
                    3 => "只显示随机图片"], 1)
                ).
                $Render->panel("item", "缩略图为纯色时的颜色", NULL,
                    $Render->input("TitleColor", "缩略图为纯色时的颜色", "缩略图为纯色时的颜色", "#FFF")
                ).
                $Render->panel("item", "随机缩略图数量", NULL,
                    $Render->input("RandomPicAmnt", "随机缩略图数量", "img/random 图片的数量，以 material- 开头", 19)
                )
            ).
            $Render->panel("item", "主题颜色", NULL,
                $Render->input("ThemeColor", "主题颜色", NULL, '#0097A7')
            ).
            $Render->panel("item", "超链接颜色", NULL,
                $Render->input("alinkcolor", "超链接颜色", NULL, '#00838F')
            ).
            $Render->panel("item", "Android Chrome 地址栏颜色", NULL,
                $Render->input("ChromeThemeColor", "Android Chrome 地址栏颜色", NULL, '#0097A7')
            ).
            $Render->panel("item", "按钮颜色", NULL,
                $Render->input("ButtonThemeColor", "按钮颜色", NULL, '#757575')
            ).
            $Render->panel("item", "卡片阴影", NULL,
                $Render->input("CardElevation", "卡片阴影", "默认为 2", 2)
            ).
            $Render->panel("item", "个人头像地址", NULL,
                $Render->input("avatarURL", "个人头像地址", "填入头像的地址, 如不填写则使用默认头像")
            ).
            $Render->panel("item", "favicon 地址", NULL,
                $Render->input("favicon", "favicon 地址", "填入博客 favicon 的地址, 默认则不显示")
            ).
            $Render->panel("item", "侧边栏顶部图片", NULL,
                $Render->input("sidebarheader", "侧边栏顶部图片", "填入图片地址, 如不填写则使用默认图片")
            ).
            $Render->panel("item", "首页顶部左边的图片地址", NULL,
                $Render->input("dailypic", "首页顶部左边的图片地址", "填入图片地址, 图片显示在首页顶部左边位置")
            ).
            $Render->panel("item", "首页顶部右边 LOGO 图片地址", NULL,
                $Render->input("logo", "首页顶部右边 LOGO 图片地址", "填入 LOGO 地址, 图片将显示于首页右上角板块")
            ).
            $Render->panel("item", "首页顶部右边 LOGO 图片大小", NULL,
                $Render->radio("logosize", "首页顶部右边 LOGO 图片大小", NULL, 
                [0 => "标准",
                1 => "更大"], 0)
            ).
            $Render->panel("item", "首页顶部左边图片的点击跳转地址", NULL,
                $Render->input("dailypicLink", "首页顶部左边图片的点击跳转地址", "点击图片后, 想要跳转网页的地址", '#')
            ).
            $Render->panel("item", "首页顶部右边 LOGO 的点击跳转地址", NULL,
                $Render->input("logoLink", "首页顶部右边 LOGO 的点击跳转地址", "点击 LOGO 后, 想要跳转网页的地址", '#')
            ).
            $Render->panel("item", "首页顶部左边的标语", NULL,
                $Render->input("slogan", "首页顶部左边的标语", "填入自定义文字, 显示于首页顶部左边的图片上", 'Hi, nice to meet you')
            ).
            $Render->panel("item", "自定义字体", NULL,
                $Render->input("CustomFonts", "自定义字体", "主题的 font-family，通常不建议修改", "Roboto, 'Helvetica Neue', Helvetica, 'PingFang SC', 'Hiragino Sans GB', 'Microsoft YaHei', '微软雅黑', Arial, sans-serif")
            )
        )
    );
}