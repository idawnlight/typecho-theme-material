<?php

define("MATERIAL_VERSION", "3.1.0");

require_once("lib/UACheck.php");
require_once("lib/pangu.php");

/**
 * JavaScript 载入
 * @param string url
 */
function jsLoad($url) 
{
    echo '<script src="'  . $url . '"></script>';
}

/**
 * CSS 载入
 * @param string url
 */
function cssLoad($url) 
{
    echo '<script src="'  . $url . '"></script>';
}

function themeInit($archive)
{
    if ($archive->is('post') || $archive->is('page')) {
        $archive->content = preg_replace('#<img(.*?) src="(.*?)" (.*?)>#',
        '<img$1 data-original="$2" class="lazy" $3>', $archive->content);
    }
}

/**
 * 主题设置
 */
function themeConfig($form)
{
    echo '<p style="font-size:14px;" id="use-intro">
    <span style="display: block;
    margin-bottom: 10px;
    margin-top: 10px;
    font-size: 16px;">感谢您使用 Material 主题</span>
    <span style="margin-bottom:10px;display:block">请关注 <a href="https://github.com/LiMingYuGuang/typecho-theme-material" target="_blank" style="color:#3384da;font-weight:bold;text-decoration:underline">Github-Material</a> 以获得<span style="color:#df3827;font-weight:bold;">最新版本支持</span></span>
    <a href="mailto:i@lim-light.com" >帮助&支持</a> &nbsp;
    <a href="https://github.com/LiMingYuGuang/typecho-theme-material/issues" target="_blank">建议&反馈</a>
    </p>';

    echo '当前版本 ' . MATERIAL_VERSION . '<span id="update"></span><script type="text/javascript" src="https://api.lim-light.com/update/material.php?version=' . MATERIAL_VERSION . '&encode=js-html&front=，" async defer></script>';
    
    $munu = '
    <ul class="typecho-option" id="typecho-option-item-switch-0">
    <li>
        <label class="typecho-label" style="font-size: large">快速跳转</label>
    </li>
    <li>
        <span class="multiline">
        - <a href="#function">功能设定</a>
    </span>
    </li>
    <li>
        <span class="multiline">
        - <a href="#style">样式设定</a>
        </span>
    </li>
    </ul>
    ';

    echo "<br>" . $munu;

    $switch = new Typecho_Widget_Helper_Form_Element_Checkbox('switch',
    array(
        'ShowPixiv' => _t('侧边栏显示 mokeyjay 的 pixiv 挂件'),
        'SmoothScroll' => _t('平滑滚动效果'),
        'ShowLoadingLine' => _t('顶部 loading 加载进度条效果'),
        'atargetblank' => _t('链接以新标签页形式打开'),
        'Pangu' => _t('引用 Pangu.js 实现中英文间自动添加空格'),
        'PanguPHP' => _t('引用 Pangu.PHP 后端实现中英文间自动添加空格'),
        'HighLight' => _t('引用 highlight.js 实现代码高亮')
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

        '0', _t('搜索设置'), _t("默认使用原生搜索<br />本地搜索移植自 hexo 版，需要手动创建索引页，已知缺陷：<br />1. 当文章中包含 XML 代码时会解析错误<br />2. 无法获取文章 tags")
    );
    $form->addInput($searchis);

    $LocalsearchURL = new Typecho_Widget_Helper_Form_Element_Text('LocalsearchURL', null, null, _t('本地搜索索引页链接'), _t('仅在启用即时搜索时需要填写'));
    $form->addInput($LocalsearchURL);

    $CDNURL = new Typecho_Widget_Helper_Form_Element_Text('CDNURL', null, null, _t('CDN 地址'), _t("
    新建一个'MaterialCDN' 文件夹, 把'css, fonts, img, js' 文件夹放进去, 然后把'MaterialCDN' 上传到到你的 CDN 储存空间根目录下<br />
    填入你的 CDN 地址, 如 <b>https://material.lim-light.com</b>"));
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

    '1', _t('Roboto 字体使用来源'), null);
    $form->addInput($RobotoSource);

    $analysis = new Typecho_Widget_Helper_Form_Element_Textarea('analysis', null, null, _t('网站统计代码 + 自定义字体源'), _t('填入如 Google Analysis 的第三方统计代码或字体源'));
    $form->addInput($analysis);

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

/**
 * 文章缩略图
 * @param $widget $widget
 */
function showThumbnail($widget)
{
    //If article no include picture, display random default picture
    $rand = rand(1, $widget->widget('Widget_Options')->RandomPicAmnt); //Random number

    if (!empty($widget->widget('Widget_Options')->CDNURL)) {
        $random = $widget->widget('Widget_Options')->CDNURL. '/MaterialCDN/img/random/material-' . $rand . '.png';
    } else {
        $random = $widget->widget('Widget_Options')->themeUrl . '/img/random/material-' . $rand . '.png';
    }//Random picture path


    // If only one random default picture, delete the following "//"
    //$random = $widget->widget('Widget_Options')->themeUrl . '/img/random.jpg';

    $attach = $widget->attachments(1)->attachment;
    $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';

    if (preg_match_all($pattern, $widget->content, $thumbUrl)) {
        echo $thumbUrl[1][0];
    } elseif (isset($attach) && $attach->isImage) {
        echo $attach->url;
    } else {
        echo $random;
    }
}

/**
 * 随机缩略图
 * @param $widget $widget
 */
function randomThumbnail($widget)
{
    //If article no include picture, display random default picture
    $rand = rand(1, $widget->widget('Widget_Options')->RandomPicAmnt); //Random number

    if (!empty($widget->widget('Widget_Options')->CDNURL)) {
        $random = $widget->widget('Widget_Options')->CDNURL. '/MaterialCDN/img/random/material-' . $rand . '.png';
    } else {
        $random = $widget->widget('Widget_Options')->themeUrl . '/img/random/material-' . $rand . '.png';
    }//Random picture path

    echo $random;
}

/**
 * Pjax 检测
 * @return bool 是否为 pjax 请求
 * @deprecated 在未来将可能被删除
 */
function isPjax()
{
    return array_key_exists('HTTP_X_PJAX', $_SERVER) && $_SERVER['HTTP_X_PJAX'];
}

/**
 * Console Copyrigtht
 */
function copyright()
{
    echo '<script>console.log("\n %c © Material ' . MATERIAL_VERSION . ' | https://github.com/LiMingYuGuang/typecho-theme-material %c \n","color:#455a64;background:#e0e0e0;padding:5px 0;border-top-left-radius:5px;border-bottom-left-radius:5px;","color:#455a64;background:#e0e0e0;padding:5px 0;border-top-right-radius:5px;border-bottom-right-radius:5px;")</script>';
}

/**
 * Multi-language support
 * @param string English 英文翻译
 * @param string Chinese 中文翻译
 * @param int languageIs 语言设置
 * @return string 对应翻译
 */
function tranMsg($eng, $chs, $l)
{
  return ($l == "0") ? $eng : $chs ;
}
