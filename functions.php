<?php

define("MATERIAL_VERSION", "3.2.0");

require_once("lib/UACheck.php");
require_once("lib/pangu.php");
require_once("lib/ThemeOptionRender.php");
require_once("lib/ThemeOption.php");

error_reporting(0);

/**
 * JavaScript LS 载入
 * @param string name
 * @param string uri
 */
function jsLsload($name, $uri)
{
    $options = Helper::options();
    $md5 = md5(file_get_contents($options->themeFile(getTheme(), $uri)));
    $base64 = base64_encode($md5);
    echo '<script>lsloader.load("' . $name . '","' . getThemeFile($uri) . '?' . $base64 . '", true)</script>';
}

/**
 * CSS LS 载入
 * @param string name
 * @param string uri
 */
function cssLsload($name, $uri) 
{
    $options = Helper::options();
    $md5 = md5(file_get_contents($options->themeFile(getTheme(), $uri)));
    $base64 = base64_encode($md5);
    echo '<style id="' . $name . '"></style>';
    echo '<script>if(typeof window.lsLoadCSSMaxNums === "undefined")window.lsLoadCSSMaxNums = 0;window.lsLoadCSSMaxNums++;lsloader.load("' . $name . '","' . getThemeFile($uri) . '?' . $base64 . '",function(){if(typeof window.lsLoadCSSNums === "undefined")window.lsLoadCSSNums = 0;window.lsLoadCSSNums++;if(window.lsLoadCSSNums == window.lsLoadCSSMaxNums)document.documentElement.style.display="";}, false)</script>';
}

function getThemeFile($uri)
{
    $options = Helper::options();
    $themeOptions = getThemeOptions();
    if ($themeOptions["CDNType"] == 1) {
        return "https://cdn.jsdelivr.net/gh/idawnlight/typecho-theme-material@" . MATERIAL_VERSION . "/" . $uri;
    } elseif ($themeOptions["CDNType"] == 2) {
        return $themeOptions["CDNURL"] . "/" . $uri;
    } else {
        $site = substr($options->siteUrl, 0, strlen($options->siteUrl) - 1);
        return $site . __TYPECHO_THEME_DIR__ . "/" . getTheme() . "/" . $uri;
    }
}

function thisThemeFile($uri)
{
    echo getThemeFile($uri);
    return;
}

function getTheme()
{
    if (!isset($themeIs)) {
        $db = Typecho_Db::get();
        $query = $db->select('value')->from('table.options')->where('name = ?', 'theme'); 
        $result = $db->fetchAll($query);
        static $themeIs;
        $themeIs = $result[0]["value"];
        unset($db); unset($result);
    }
    return $themeIs;
}

function getThemeOptions()
{
    static $themeOptions = "";
    if ($themeOptions == "") {
        $db = Typecho_Db::get();
        $query = $db->select('value')->from('table.options')->where('name = ?', 'theme:' . getTheme()); 
        $result = $db->fetchAll($query);
        $themeOptions = unserialize($result[0]["value"]);
        unset($db);
    }
    return $themeOptions;
}

function themeInit($archive)
{
    if (($archive->is('post') || $archive->is('page')) && in_array("Lazyload", getThemeOptions()["switch"])) {
        $archive->content = preg_replace('#<img(.*?) src="(.*?)" (.*?)>#',
        '<img$1 data-original="$2" class="lazy" $3>', $archive->content);
    }
    $options = Helper::options();
    if ($options->version === "1.1/17.10.30") {
        $archive->content = preg_replace('#<li><p>(.*?)</p>(.*?)</li>#',
        '<li>$1$2</li>', $archive->content);
    }
}

/**
 * 文章缩略图
 * @param $widget $widget
 */
function showThumbnail($widget)
{
    if($widget->fields->picUrl){
        echo $widget->fields->picUrl;
        return;
    }

    //If article no include picture, display random default picture
    $rand = rand(1, $widget->widget('Widget_Options')->RandomPicAmnt); //Random number

    $random = getThemeFile('img/random/material-' . $rand . '.png');
    


    // If only one random default picture, delete the following "//"
    //$random = $widget->widget('Widget_Options')->themeUrl . '/img/random.jpg';

    $attach = $widget->attachments(1)->attachment;
    $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';
    $patternlazy = '/\<img.*?data-original\=\"(.*?)\"[^>]*>/i';

    if (preg_match_all($pattern, $widget->content, $thumbUrl)) {
        echo $thumbUrl[1][0];
    } elseif (preg_match_all($patternlazy, $widget->content, $thumbUrl)) {
        echo $thumbUrl[1][0];
    } elseif ($attach->isImage) {
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

    $random = getThemeFile('img/random/material-' . $rand . '.png');

    echo $random;
}

/**
 * Console Copyrigtht
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
 * 仿 Hexo 的 TOC 实现
 * @param string post content
 * @return string content
 * TODO: 更改实现方式
 */
function toc($content)
{
    $chunks = preg_split('/(<h[1-2].*?\/h[1-2]>)/msi', $content, -1, PREG_SPLIT_DELIM_CAPTURE);

    $toc = '<!--<nopangu>--><ol class="post-toc">';
    $i = 0;
    $i2 = 0;
    $flag = 0;
    $result = '';

    foreach ($chunks as $c) {
        if (strtolower(substr($c, 0, 2)) !== '<h') {
            $result .= $c;
            continue;
        }
        if (strtolower(substr($c, 0, 4)) == '<h1>') {
            $i++;
            if ($i > 0 && $flag == 1) {
                $toc .= "</li>";
            }
            if ($i > 0 && $flag == 2) {
                $i2 = 0;
                $toc .= "</ol></li>";
            }
            $flag = 1;
            $toc .= '<li class="post-toc-item post-toc-level-1">';
        }
        if (strtolower(substr($c, 0, 4)) == '<h2>' && $i !== 0) {
            if ($i > 0 && $flag == 1) {
                $toc .= '<ol class="post-toc-child">';
            }
            $i2++;
            $flag = 2;
        }
        if ($flag == 2) $toc .= '<li class="post-toc-item post-toc-level-2">';
        $toc .= '<a class="post-toc-link" href="#' . substr($c, 4, strlen($c) - 4 - 5) . '"><span class="post-toc-number">';
        if ($flag == 1) $toc .= $i;
        if ($flag == 2) $toc .= $i . "." . $i2;
        $toc .= '.</span><span class="post-toc-text">' . substr($c, 4, strlen($c) - 4 - 5) . '</span></a>';
        if ($flag == 2) $toc .= '</li>';

        $result .= strtolower(substr($c, 0, 3)) . ' id="' . substr($c, 4, strlen($c) - 4 - 5) . '">' . substr($c, 4, strlen($c) - 4);
    }

    if ($i > 0 && $flag == 1) {
        $toc .= '</li>';
    }
    if ($i > 0 && $flag == 2) {
        $toc .= "</ol></li>";
    }
    $toc .= '</ol><!--</nopangu>-->';

    if ($i == 0) {
        echo '&nbsp;此文章暂无目录';
        return $content;
    }

    echo $toc;
    return $result;
}