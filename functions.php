<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

define("MATERIAL_VERSION", "3.4.0");

require_once("lib/tools.php");
require_once("lib/UACheck.php");
require_once("lib/pangu.php");
require_once("lib/Spyc.php");
require_once("lib/ThemeOptionRender.php");
require_once("lib/ThemeOption.php");

if (!defined('__TYPECHO_DEBUG__') || __TYPECHO_DEBUG__ == 0) {
    error_reporting(0);
}

if (isset($this)) {
    global $t;
    $t = $this;
}

if (isset($_GET["mod"]) && isset($this) && $this->is('index')) {
    if ($_GET["mod"] === "search-xml") {
        $this->need("page-search.php");
        exit;
    }
    if ($_GET["mod"] === "export") {
        if ($_GET['type'] === 'comments') {
            if (Typecho_Widget::widget('Widget_User')->pass('administrator', true)) {
                header("Content-Type: text/xml");
                header('Content-Disposition: attachment; filename="'.Typecho_Widget::widget('Widget_Options')->title.'-comments-wxr-'.gmdate('Y-m-d').'.xml"');
                $tool = new Comment_Export();
                $db = Typecho_Db::get();
                $query = $db->select('*')->from('table.contents')->where('type = ?', 'post')->orWhere('type = ?', 'page');
                $result = $db->fetchAll($query);
                foreach ($result as $item) {
                    $tool->addBlock($item);
                }
                $comment_query = $db->select('*')->from('table.comments');
                $comments = $db->fetchAll($comment_query);
                foreach ($comments as $comment) {
                    if ($comment['status'] !== 'spam') {
                        $tool->addComment($comment);
                    }
                }
                echo $tool->getResult();
                exit;
            }
        }
    }
}

/**
 * JavaScript 载入
 * @param string name
 * @param string uri
 */
function jsLsload($name, $uri)
{
    if (in_array("LocalStorage", getThemeOptions("switch"))) {
        $options = Helper::options();
        $identifier = $name . $uri . filemtime($options->themeFile(getTheme(), $uri)) . MATERIAL_VERSION;
        $hash = md5($identifier);
        echo '<script>lsloader.load("' . $name . '","' . getThemeFile($uri) . '?' . $hash . '", true)</script>';
    } else {
        echo '<script src="'.getThemeFile($uri).'"></script>';
    }
}

/**
 * CSS 载入
 * @param string name
 * @param string uri
 */
function cssLsload($name, $uri)
{
    if (in_array("LocalStorage", getThemeOptions("switch"))) {
        $options = Helper::options();
        $identifier = $name . $uri . filemtime($options->themeFile(getTheme(), $uri)) . MATERIAL_VERSION;
        $hash = md5($identifier);
        echo '<style id="' . $name . '"></style>';
        echo '<script>if(typeof window.lsLoadCSSMaxNums === "undefined")window.lsLoadCSSMaxNums = 0;window.lsLoadCSSMaxNums++;lsloader.load("' . $name . '","' . getThemeFile($uri) . '?' . $hash . '",function(){if(typeof window.lsLoadCSSNums === "undefined")window.lsLoadCSSNums = 0;window.lsLoadCSSNums++;if(window.lsLoadCSSNums == window.lsLoadCSSMaxNums)document.documentElement.style.display="";}, false)</script>';
    } else {
        echo '<link href="'.getThemeFile($uri).'" rel="stylesheet" type="text/css" />';
    }
}

function getScriptType()
{
    if (in_array("LocalStorage", getThemeOptions("switch"))) {
        echo 'text/ls-javascript';
    } else {
        echo 'text/javascript';
    }
}

function getBackgroundLazyload($url)
{
    if (in_array("LazyloadIndex", getThemeOptions("switch"))) {
        echo 'data-original="' . $url . '"';
    } else {
        echo 'style="background-image: url(\'' . $url . '\');"';
    }
}

function getThemeFile($uri, $print = false)
{
    $options = Helper::options();
    if (getThemeOptions("CDNType") == 1) {
        $url = "https://cdn.jsdelivr.net/gh/idawnlight/typecho-theme-material@" . MATERIAL_VERSION . "/" . $uri;
    } else if (getThemeOptions("CDNType") == 3) {
        $url = "https://shadow.elemecdn.com/gh/idawnlight/typecho-theme-material@" . MATERIAL_VERSION . "/" . $uri;
    } else if (getThemeOptions("CDNType") == 2) {
        $url = getThemeOptions("CDNURL") . "/" . $uri;
    } else {
        $site = substr($options->siteUrl, 0, strlen($options->siteUrl) - 1);
        $url = $site . __TYPECHO_THEME_DIR__ . "/" . getTheme() . "/" . $uri;
    }
    if ($print) echo $url;
    return $url;
}

/**
 * 获取当前使用的主题名称
 * @return string theme name
 */
function getTheme()
{
    static $themeName = NULL;
    if ($themeName === NULL) {
        $db = Typecho_Db::get();
        $query = $db->select('value')->from('table.options')->where('name = ?', 'theme');
        $result = $db->fetchAll($query);
        $themeName = $result[0]["value"];
    }
    return $themeName;
}

// https://github.com/typecho/typecho/blob/d84e261f7b9ed10c74e792edc596a18cf5a3ab47/var/Widget/Options.php#L760-L771
function tryDeserialize(string $value) {
    $isSerialized = strpos($value, 'a:') === 0 || $value === 'b:0;';
    return $isSerialized ? @unserialize($value) : json_decode($value, true);
}

/**
 * 获取当前的主题设置
 * @param null $setting
 * @param bool $print
 * @param null $default
 * @return mixed setting value
 * @throws Typecho_Db_Exception
 */
function getThemeOptions($setting = null, $print = false, $default = null)
{
    static $themeOptions = NULL;
    if ($themeOptions === NULL) {
        $db = Typecho_Db::get();
        $query = $db->select('value')->from('table.options')->where('name = ?', 'theme:' . getTheme());
        $result = $db->fetchAll($query);
        $themeOptions = tryDeserialize($result[0]["value"]);
    }
    $result = ($setting === NULL) ? $themeOptions : (isset($themeOptions[$setting]) ? $themeOptions[$setting] : $default);
    if (is_string($result) && $print) echo $result;
    return $result;
}

function themeInit($archive)
{
    if (($archive->is('post') || $archive->is('page')) && in_array("Lazyload", getThemeOptions("switch"))) {
        $archive->content = preg_replace('#<img(.*?) src="(.*?)" (.*?)>#',
            '<img$1 data-original="$2" class="lazy" $3>', $archive->content);
    }
    $options = Helper::options();
    if ($options->version === "1.1/17.10.30") {
        $archive->content = preg_replace('#<li><p>(.*?)</p>(.*?)</li>#',
            '<li>$1$2</li>', $archive->content);
    }
    $options->commentsAntiSpam = false;
}

/**
 * 获取二维码
 * @param string permalink
 * @return string url
 */
function getQRCode($permalink) {
    $qrcode = getThemeOptions("qrcode");
    if ($qrcode === NULL) $qrcode = 1;
    $src = "";
    switch ($qrcode) {
        case 0:
            $src = "https://api.lwl12.com/img/qrcode/get?ct=$permalink&w=200&h=200";
            break;
        case 1:
            $src = "https://api.imjad.cn/qrcode/?text=$permalink&size=200&level=L";
            break;
        case 2:
            $src = "https://chart.googleapis.com/chart?chs=200x200&cht=qr&chld=H|1&chl=$permalink";
            break;
        case 3:
            $src = "https://www.wandoujia.com/api/qr?s=7&c=$permalink";
            break;
    }
    echo $src;
    return $src;
}

/**
 * 文章缩略图
 * @param Typecho_Widget $widget
 * @return string image url
 */
function showThumbnail($widget)
{
    if ($widget->fields->picUrl){
        return $widget->fields->picUrl;
    }

    //If article no include picture, display random default picture
    $result = randomThumbnail();

    $attach = $widget->attachments(1)->attachment;
    if (isset($attach) && $attach->isImage) {
        $result = $attach->url;
    }

    if (getThemeOptions("FetchFirstImageRegex", false, '0') == '0') {
        global $t;
        if (in_array("Lazyload", getThemeOptions("switch")) && method_exists($t,'is') && !$t->is('index') && !$t->is('search')) {
            if (preg_match_all('/\<img.*?data-original\=\"(.*?)\"[^>]*>/i', $widget->content, $thumbUrl)) {
                $result = $thumbUrl[1][0];
            }
        } else {
            if (preg_match_all('/\<img.*?src=\"(.*?)\"[^>]*>/i', $widget->content, $thumbUrl)) {
                $result = $thumbUrl[1][0];
            }
        }
    }

    return $result;
}

/**
 * 随机缩略图
 * @return string image url
 * @throws Typecho_Db_Exception
 */
function randomThumbnail()
{
    static $Last_Pic_Index = 0;
    $rand = rand(1, getThemeOptions('RandomPicAmnt'));
    $result = getThemeFile('img/random/material-' . $rand . '.png');
    if(getThemeOptions('RandomPicAmnt') > 1){
        if($Last_Pic_Index == $rand){
            return randomThumbnail();
        }
        $Last_Pic_Index = $rand;
    }
    return $result;
}

/**
 * Console Copyright
 */
function copyright()
{
    echo '<script>console.log("\n %c © Material ' . MATERIAL_VERSION . ' | https://github.com/idawnlight/typecho-theme-material %c \n","color:#455a64;background:#e0e0e0;padding:5px 0;border-top-left-radius:5px;border-bottom-left-radius:5px;","color:#455a64;background:#e0e0e0;padding:5px 0;border-top-right-radius:5px;border-bottom-right-radius:5px;")</script>';
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

/**
 * i18n support
 * @param string expression
 * @return string translation
 */
function lang($expression, $display = true)
{
    static $lang = NULL;
    $language = (getThemeOptions("language") !== NULL) ? getThemeOptions("language") : "zh-CN";
    if ($lang === NULL) $lang = Spyc::YAMLLoad(Helper::options()->themeFile(getTheme(), "languages/".$language.".yml"));
    $now = $lang;
    foreach (explode(".", $expression) as $exp) {
        if (isset($now[$exp])) {
            if (!is_array($now[$exp])) {
                if ($display) echo $now[$exp];
                return $now[$exp];
            }
            $now = $now[$exp];
        } else {
            return false;
        }
    }
}

/**
 * Pangu.PHP
 * @param string html_source
 * @return string 处理完的 html_source
 */
function pangu($html_source)
{
    $chunks = preg_split('/(<!--<nopangu>-->.*?<!--<\/nopangu>-->|<nopangu>.*?<\/nopangu>|<pre.*?\/pre>|<textarea.*?\/textarea>|<code.*?\/code>)/msi', $html_source, -1, PREG_SPLIT_DELIM_CAPTURE);
    $result = '';
    foreach ($chunks as $c) {
        if (strtolower(substr($c, 0, 16)) == '<!--<nopangu>-->') {
            $c = substr($c, 16, strlen($c) - 16 - 17);
            $result .= $c;
            continue;
        } else if (strtolower(substr($c, 0, 9)) == '<nopangu>') {
            $c = substr($c, 9, strlen($c) - 9 -10);
            $result .= $c;
            continue;
        } else if (strtolower(substr($c, 0, 4)) == '<pre' || strtolower(substr($c, 0, 9)) == '<textarea' || strtolower(substr($c, 0, 5)) == '<code') {
            $result .= $c;
            continue;
        }
        $result .= doPangu($c);
    }
    return $result;
}

/**
 * 获取描述
 * @return bool 是否已输出
 */
function getDescription() {
    global $t;
    if (method_exists($t,'is') && $t->is("post") || $t->is("page")) {
        if ($t->fields->description != ""){
            echo $t->fields->description;
        } else {
            $t->excerpt(80, '...');
        }
        return true;
    }
    return false;
}
