<!DOCTYPE HTML>
<html style="display: none">
<head>
    <meta charset="utf-8" />
    <script>
        window.materialVersion = "<?php echo MATERIAL_VERSION; ?>"
    </script>

    <!-- Title -->
    <title>
        <?php $this->archiveTitle('', '', ' - '); ?>
        <?php $this->options->title(); ?>
    </title>

    <!-- dns prefetch -->
    <meta http-equiv="x-dns-prefetch-control" content="on">
    <?php
    if (getThemeOptions("DNSPrefetch") !== "") {
        foreach (explode("\n", $this->options->DNSPrefetch) as $domain) {
            echo '<link rel="dns-prefetch" href="' . trim($domain) . '">' . "\n";
        }
    }
    if (getThemeOptions("CDNType") == 1) {
        echo '<link rel="dns-prefetch" href="//cdn.jsdelivr.net">';
    }
    ?>

    <!-- Meta & Info -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="theme-color" content="<?php $this->options->ChromeThemeColor() ?>">
    <meta name="author" content="<?php $this->options->title() ?>">
    <meta name="description" itemprop="description" content="<?php (getDescription()) ? NULL : $this->options->description(); ?>">
    <meta name="keywords" content="<?php $this->options->keywords() ?><?php ($this->is('post') && count($this->tags) > 0 && print ",") ? $this->tags(",", false, "none") : NULL; ?>">    
    
    <!-- Favicons -->
    <link rel="icon shortcut" type="image/ico" href="<?php $this->options->favicon() ?>">
    <link rel="icon" sizes="192x192" href="<?php $this->options->favicon() ?>">
    <link rel="apple-touch-icon" href="<?php $this->options->favicon() ?>">

    <!--iOS -->
    <meta name="apple-mobile-web-app-title" content="Title">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="480">

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="<?php $this->options->favicon() ?>" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />

    <!-- The Open Graph protocol -->
    <?php if($this->is('post')||$this->is('page')): ?>
        <meta property="og:url" content="<?php $this->permalink(); ?>" />
        <meta property="og:type" content="blog" />
        <meta property="og:release_date" content="<?php $this->date('Y-m-j'); ?>" />
        <meta property="og:title" content="<?php $this->options->title(); ?>" />
        <meta property="og:image" content="<?php showThumbnail($this); ?>" />
        <meta property="og:description" content="<?php (getDescription()) ? NULL : $this->options->description(); ?>" />
        <meta property="og:author" content="<?php $this->author(); ?>" />
        <meta property="article:published_time" content="<?php $this->date('Y-m-j'); ?>" />
        <meta property="article:modified_time" content="<?php $this->date('Y-m-j'); ?>" />
    <?php endif; ?>

    <!-- Disable Fucking Bloody Baidu Tranformation -->
    <meta http-equiv="Cache-Control" content="no-transform" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <!-- Block IE -->
    <!--[if lte IE 9]>
    <link rel="stylesheet" href="<?php getThemeFile("css/ie-blocker.css", true) ?>">
    <?php if ($this->options->langis == '0'): ?>
    <script src="<?php getThemeFile("js/ie-blocker.en.js", true) ?>" img-path="../img/ie-blocker/"></script>
    <?php elseif ($this->options->langis == '1'): ?>
    <script src="<?php getThemeFile("js/ie-blocker.zhCN.js", true) ?>" img-path="../img/ie-blocker/"></script>
    <?php endif; ?>
    <![endif]-->

    <!-- The Twitter Card protocol -->
    <?php if ($this->is("post") || $this->is("page")): ?>
    <meta name="twitter:title" content="<?php $this->archiveTitle(); ?>">
    <meta name="twitter:description" content="<?php (getDescription()) ? NULL : $this->options->description(); ?>">
    <meta name="twitter:image" content="<?php $this->options->favicon() ?>">
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:url" content="<?php $this->permalink(); ?>" />
    <?php endif; ?>

    <?php $this->header(); ?>

    <!-- Import lsloader -->
    <script>(function(){window.lsloader={jsRunSequence:[],jsnamemap:{},cssnamemap:{}};lsloader.removeLS=function(a){try{localStorage.removeItem(a)}catch(b){}};lsloader.setLS=function(a,c){try{localStorage.setItem(a,c)}catch(b){}};lsloader.getLS=function(a){var c="";try{c=localStorage.getItem(a)}catch(b){c=""}return c};versionString="/*"+(window.materialVersion||"unknownVersion")+"*/";lsloader.clean=function(){try{var b=[];for(var a=0;a<localStorage.length;a++){b.push(localStorage.key(a))}b.forEach(function(e){var f=lsloader.getLS(e);if(window.oldVersion){var d=window.oldVersion.reduce(function(g,h){return g||f.indexOf("/*"+h+"*/")!==-1},false);if(d){lsloader.removeLS(e)}}})}catch(c){}};lsloader.clean();lsloader.load=function(f,a,b,d){if(typeof b==="boolean"){d=b;b=undefined}d=d||false;b=b||function(){};var e;e=this.getLS(f);if(e&&e.indexOf(versionString)===-1){this.removeLS(f);this.requestResource(f,a,b,d);return}if(e){var c=e.split(versionString)[0];if(c!=a){console.log("reload:"+a);this.removeLS(f);this.requestResource(f,a,b,d);return}e=e.split(versionString)[1];if(d){this.jsRunSequence.push({name:f,code:e});this.runjs(a,f,e)}else{document.getElementById(f).appendChild(document.createTextNode(e));b()}}else{this.requestResource(f,a,b,d)}};lsloader.requestResource=function(b,e,a,c){var d=this;if(c){this.iojs(e,b,function(h,f,g){d.setLS(f,h+versionString+g);d.runjs(h,f,g)})}else{this.iocss(e,b,function(f){document.getElementById(b).appendChild(document.createTextNode(f));d.setLS(b,e+versionString+f)},a)}};lsloader.iojs=function(d,b,g){var a=this;a.jsRunSequence.push({name:b,code:""});try{var f=new XMLHttpRequest();f.open("get",d,true);f.onreadystatechange=function(){if(f.readyState==4){if((f.status>=200&&f.status<300)||f.status==304){if(f.response!=""){g(d,b,f.response);return}}a.jsfallback(d,b)}};f.send(null)}catch(c){a.jsfallback(d,b)}};lsloader.iocss=function(f,c,h,a){var b=this;try{var g=new XMLHttpRequest();g.open("get",f,true);g.onreadystatechange=function(){if(g.readyState==4){if((g.status>=200&&g.status<300)||g.status==304){if(g.response!=""){h(g.response);a();return}}b.cssfallback(f,c,a)}};g.send(null)}catch(d){b.cssfallback(f,c,a)}};lsloader.iofonts=function(f,c,h,a){var b=this;try{var g=new XMLHttpRequest();g.open("get",f,true);g.onreadystatechange=function(){if(g.readyState==4){if((g.status>=200&&g.status<300)||g.status==304){if(g.response!=""){h(g.response);a();return}}b.cssfallback(f,c,a)}};g.send(null)}catch(d){b.cssfallback(f,c,a)}};lsloader.runjs=function(f,c,e){if(!!c&&!!e){for(var b in this.jsRunSequence){if(this.jsRunSequence[b].name==c){this.jsRunSequence[b].code=e}}}if(!!this.jsRunSequence[0]&&!!this.jsRunSequence[0].code&&this.jsRunSequence[0].status!="failed"){var a=document.createElement("script");a.appendChild(document.createTextNode(this.jsRunSequence[0].code));a.type="text/javascript";document.getElementsByTagName("head")[0].appendChild(a);this.jsRunSequence.shift();if(this.jsRunSequence.length>0){this.runjs()}}else{if(!!this.jsRunSequence[0]&&this.jsRunSequence[0].status=="failed"){var d=this;var a=document.createElement("script");a.src=this.jsRunSequence[0].path;a.type="text/javascript";this.jsRunSequence[0].status="loading";a.onload=function(){d.jsRunSequence.shift();if(d.jsRunSequence.length>0){d.runjs()}};document.body.appendChild(a)}}};lsloader.tagLoad=function(b,a){this.jsRunSequence.push({name:a,code:"",path:b,status:"failed"});this.runjs()};lsloader.jsfallback=function(c,b){if(!!this.jsnamemap[b]){return}else{this.jsnamemap[b]=b}for(var a in this.jsRunSequence){if(this.jsRunSequence[a].name==b){this.jsRunSequence[a].code="";this.jsRunSequence[a].status="failed";this.jsRunSequence[a].path=c}}this.runjs()};lsloader.cssfallback=function(e,c,b){if(!!this.cssnamemap[c]){return}else{this.cssnamemap[c]=1}var d=document.createElement("link");d.type="text/css";d.href=e;d.rel="stylesheet";d.onload=d.onerror=b;var a=document.getElementsByTagName("script")[0];a.parentNode.insertBefore(d,a)};lsloader.runInlineScript=function(c,b){var a=document.getElementById(b).innerText;this.jsRunSequence.push({name:c,code:a});this.runjs()}})();</script>

    <!-- Import queue -->
    <script>function Queue(){this.dataStore=[];this.offer=b;this.poll=d;this.execNext=a;this.debug=false;this.startDebug=c;function b(e){if(this.debug){console.log("Offered a Queued Function.")}if(typeof e==="function"){this.dataStore.push(e)}else{console.log("You must offer a function.")}}function d(){if(this.debug){console.log("Polled a Queued Function.")}return this.dataStore.shift()}function a(){var e=this.poll();if(e!==undefined){if(this.debug){console.log("Run a Queued Function.")}e()}}function c(){this.debug=true}}var queue=new Queue();</script>


    <!-- Material style -->
    <?php cssLsload("material_css", "css/material.min.css") ?>
    <?php cssLsload("style_css", "css/style.min.css") ?>
    <?php cssLsload("material_icons", "css/material-icons.css") ?>

    <?php if ($this->options->RobotoSource == '0'): ?>
        <link href='https://fonts.proxy.ustclug.org/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <?php elseif ($this->options->RobotoSource == '1'): ?>
        <link href='https://fonts.loli.net/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <?php elseif ($this->options->RobotoSource == '2'): ?>
        <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <?php endif; ?>

    <!-- Config CSS -->

    <!-- Other Styles -->
    <style>
        body, html {
            font-family: <?php $this->options->CustomFonts(); ?>;
            overflow-x: hidden;
        }

        a {
            color: <?php $this->options->alinkcolor(); ?>;
        }

        .mdl-card__media,
        #search-label,
        #search-form-label:after,
        #scheme-Paradox .hot_tags-count,
        #scheme-Paradox .sidebar_archives-count,
        #scheme-Paradox .sidebar-colored .sidebar-header,
        #scheme-Paradox .sidebar-colored .sidebar-badge{
            background-color: <?php $this->options->ThemeColor() ?> !important;
        }

        /* Sidebar User Drop Down Menu Text Color */
        #scheme-Paradox .sidebar-colored .sidebar-nav>.dropdown>.dropdown-menu>li>a:hover,
        #scheme-Paradox .sidebar-colored .sidebar-nav>.dropdown>.dropdown-menu>li>a:focus {
            color: <?php $this->options->ThemeColor() ?> !important;
        }

        #post_entry-right-info,
        .sidebar-colored .sidebar-nav li:hover > a,
        .sidebar-colored .sidebar-nav li:hover > a i,
        .sidebar-colored .sidebar-nav li > a:hover,
        .sidebar-colored .sidebar-nav li > a:hover i,
        .sidebar-colored .sidebar-nav li > a:focus i,
        .sidebar-colored .sidebar-nav > .open > a,
        .sidebar-colored .sidebar-nav > .open > a:hover,
        .sidebar-colored .sidebar-nav > .open > a:focus,
        #ds-reset #ds-ctx .ds-ctx-entry .ds-ctx-head a {
            color: <?php $this->options->ThemeColor() ?> !important;
        }

        .toTop {
            background: <?php $this->options->ButtonThemeColor() ?> !important;
        }

        .material-layout .material-post .material-nav,
        .material-layout .material-index .material-nav,
        .material-nav a {
            color: <?php $this->options->ButtonThemeColor() ?>;
        }

        #scheme-Paradox .MD-burger-layer {
            background-color: <?php $this->options->ButtonThemeColor() ?>;
        }

        #scheme-Paradox #post-toc-trigger-btn {
            color: <?php $this->options->ButtonThemeColor() ?>;
        }

        .post-toc a:hover {
            color: <?php $this->options->alinkcolor(); ?>;
            text-decoration: underline;
        }

        #scheme-Paradox #comment {
            font-family: <?php $this->options->CustomFonts(); ?>;
        }

        <?php if (getThemeOptions("SearchColor")):?>
        .search-input {
            color: <?php getThemeOptions("SearchColor", true); ?>;
        }
        <?php endif; ?>


    </style>


    <!-- Theme Background Related-->
    <?php if ($this->options->BGtype =='0') : ?>
        <style>
            body{
            <?php if (!empty($this->options->bgcolor)): ?>
                background-color: <?php $this->options->bgcolor() ?>;
            <?php else: ?>
                background-color: #F5F5F5;
            <?php endif; ?>
            }
            .demo-blog .something-else .mdl-card__supporting-text{
                background-color: #fff;
            }
            .MD-burger-layer{
                background-color: #666;
            }
            .demo-blog .demo-blog__posts>.demo-nav,
            .demo-nav a,
            .demo-blog--blogpost .demo-back{
                color: #666;
            }
        </style>
    <?php elseif ($this->options->BGtype == '2'): ?>
        <style>
            body{
            <?php if ($this->options->GradientType == '0'): ?>
                background-image:
                        -moz-radial-gradient(0% 100%, ellipse cover, #96DEDA 10%,rgba(255,255,227,0) 40%),
                        -moz-linear-gradient(-45deg,  #1fddff 0%,#FFEDBC 100%)
            ;
                background-image:
                        -o-radial-gradient(0% 100%, ellipse cover, #96DEDA 10%,rgba(255,255,227,0) 40%),
                        -o-linear-gradient(-45deg,  #1fddff 0%,#FFEDBC 100%)
            ;
                background-image:
                        -ms-radial-gradient(0% 100%, ellipse cover, #96DEDA 10%,rgba(255,255,227,0) 40%),
                        -ms-linear-gradient(-45deg,  #1fddff 0%,#FFEDBC 100%)
            ;
                background-image:
                        -webkit-radial-gradient(0% 100%, ellipse cover, #96DEDA    10%,rgba(255,255,227,0) 40%),
                        -webkit-linear-gradient(-45deg,  #1fddff 0%,#FFEDBC 100%)
            ;
            <?php elseif ($this->options->GradientType == '1'): ?>
                background-image:
                        -moz-radial-gradient(-20% 140%, ellipse ,  rgba(255,144,187,.6) 30%,rgba(255,255,227,0) 50%),
                        -moz-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%),
                        -moz-radial-gradient(60% 40%,ellipse,   #d9e3e5 10%,rgba(44,70,76,.0) 60%),
                        -moz-linear-gradient(-45deg,  rgba(18,101,101,.8) -10%,#d9e3e5 80% )
            ;
                background-image:
                        -o-radial-gradient(-20% 140%, ellipse ,  rgba(255,144,187,.6) 30%,rgba(255,255,227,0) 50%),
                        -o-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%),
                        -o-radial-gradient(60% 40%,ellipse,   #d9e3e5 10%,rgba(44,70,76,.0) 60%),
                        -o-linear-gradient(-45deg,  rgba(18,101,101,.8) -10%,#d9e3e5 80% )
            ;
                background-image:
                        -ms-radial-gradient(-20% 140%, ellipse ,  rgba(255,144,187,.6) 30%,rgba(255,255,227,0) 50%),
                        -ms-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%),
                        -ms-radial-gradient(60% 40%,ellipse,   #d9e3e5 10%,rgba(44,70,76,.0) 60%),
                        -ms-linear-gradient(-45deg,  rgba(18,101,101,.8) -10%,#d9e3e5 80% )
            ;
                background-image:
                        -webkit-radial-gradient(-20% 140%, ellipse ,  rgba(255,144,187,.6) 30%,rgba(255,255,227,0) 50%),
                        -webkit-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%),
                        -webkit-radial-gradient(60% 40%,ellipse,   #d9e3e5 10%,rgba(44,70,76,.0) 60%),
                        -webkit-linear-gradient(-45deg,  rgba(18,101,101,.8) -10%,#d9e3e5 80% )
            ;
            <?php elseif ($this->options->GradientType == '2'): ?>
                background-image:
                        -moz-radial-gradient(-20% 140%, ellipse ,  rgba(235,167,171,.6) 30%,rgba(255,255,227,0) 50%),
                        -moz-radial-gradient(60% 40%,ellipse,   #d9e3e5 10%,rgba(44,70,76,.0) 60%),
                        -moz-linear-gradient(-45deg,  rgba(62,70,92,.8) -10%,rgba(220,230,200,.8) 80% )
            ;
                background-image:
                        -o-radial-gradient(-20% 140%, ellipse ,  rgba(235,167,171,.6) 30%,rgba(255,255,227,0) 50%),
                        -o-radial-gradient(60% 40%,ellipse,   #d9e3e5 10%,rgba(44,70,76,.0) 60%),
                        -o-linear-gradient(-45deg,  rgba(62,70,92,.8) -10%,rgba(220,230,200,.8) 80% )
            ;
                background-image:
                        -ms-radial-gradient(-20% 140%, ellipse ,  rgba(235,167,171,.6) 30%,rgba(255,255,227,0) 50%),
                        -ms-radial-gradient(60% 40%,ellipse,   #d9e3e5 10%,rgba(44,70,76,.0) 60%),
                        -ms-linear-gradient(-45deg,  rgba(62,70,92,.8) -10%,rgba(220,230,200,.8) 80% )
            ;
                background-image:
                        -webkit-radial-gradient(-20% 140%, ellipse ,  rgba(235,167,171,.6) 30%,rgba(255,255,227,0) 50%),
                        -webkit-radial-gradient(60% 40%,ellipse,   #d9e3e5 10%,rgba(44,70,76,.0) 60%),
                        -webkit-linear-gradient(-45deg,  rgba(62,70,92,.8) -10%,rgba(220,230,200,.8) 80% )
            ;
            <?php elseif ($this->options->GradientType =='3'): ?>
                background-image:
                        -moz-radial-gradient(-20% 140%, ellipse ,  rgba(143,192,193,.6) 30%,rgba(255,255,227,0) 50%),
                        -moz-radial-gradient(60% 40%,ellipse,   #d9e3e5 10%,rgba(44,70,76,.0) 60%),
                        -moz-linear-gradient(-45deg,  rgba(143,181,158,.8) -10%,rgba(213,232,211,.8) 80% )
            ;
                background-image:
                        -o-radial-gradient(-20% 140%, ellipse ,  rgba(143,192,193,.6) 30%,rgba(255,255,227,0) 50%),
                        -o-radial-gradient(60% 40%,ellipse,   #d9e3e5 10%,rgba(44,70,76,.0) 60%),
                        -o-linear-gradient(-45deg,  rgba(143,181,158,.8) -10%,rgba(213,232,211,.8) 80% )
            ;
                background-image:
                        -ms-radial-gradient(-20% 140%, ellipse ,  rgba(143,192,193,.6) 30%,rgba(255,255,227,0) 50%),
                        -ms-radial-gradient(60% 40%,ellipse,   #d9e3e5 10%,rgba(44,70,76,.0) 60%),
                        -ms-linear-gradient(-45deg,  rgba(143,181,158,.8) -10%,rgba(213,232,211,.8) 80% )
            ;
                background-image:
                        -webkit-radial-gradient(-20% 140%, ellipse ,  rgba(143,192,193,.6) 30%,rgba(255,255,227,0) 50%),
                        -webkit-radial-gradient(60% 40%,ellipse,   #d9e3e5 10%,rgba(44,70,76,.0) 60%),
                        -webkit-linear-gradient(-45deg,  rgba(143,181,158,.8) -10%,rgba(213,232,211,.8) 80% )
            ;
            <?php elseif ($this->options->GradientType =='4'): ?>
                background-image:
                        -moz-radial-gradient(-20% 140%, ellipse ,  rgba(214,195,224,.6) 30%,rgba(255,255,227,0) 50%),
                        -moz-radial-gradient(60% 40%,ellipse,   #d9e3e5 10%,rgba(44,70,76,.0) 60%),
                        -moz-linear-gradient(-45deg, rgba(97,102,158,.8) -10%,rgba(237,187,204,.8) 80% )
            ;
                background-image:
                        -o-radial-gradient(-20% 140%, ellipse ,  rgba(214,195,224,.6) 30%,rgba(255,255,227,0) 50%),
                        -o-radial-gradient(60% 40%,ellipse,   #d9e3e5 10%,rgba(44,70,76,.0) 60%),
                        -o-linear-gradient(-45deg, rgba(97,102,158,.8) -10%,rgba(237,187,204,.8) 80% )
            ;
                background-image:
                        -ms-radial-gradient(-20% 140%, ellipse ,  rgba(214,195,224,.6) 30%,rgba(255,255,227,0) 50%),
                        -ms-radial-gradient(60% 40%,ellipse,   #d9e3e5 10%,rgba(44,70,76,.0) 60%),
                        -ms-linear-gradient(-45deg, rgba(97,102,158,.8) -10%,rgba(237,187,204,.8) 80% )
            ;
                background-image:
                        -webkit-radial-gradient(-20% 140%, ellipse ,  rgba(214,195,224,.6) 30%,rgba(255,255,227,0) 50%),
                        -webkit-radial-gradient(60% 40%,ellipse,   #d9e3e5 10%,rgba(44,70,76,.0) 60%),
                        -webkit-linear-gradient(-45deg, rgba(97,102,158,.8) -10%,rgba(237,187,204,.8) 80% )
            ;
            <?php elseif ($this->options->GradientType =='5'): ?>
                background-image: #DAD299; /* fallback for old browsers */
                background-image: -webkit-linear-gradient(to left, #DAD299 , #B0DAB9); /* Chrome 10-25, Safari 5.1-6 */
                background-image: linear-gradient(to left, #DAD299 , #B0DAB9); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            <?php elseif ($this->options->GradientType =='6'): ?>
                background-image: linear-gradient(-20deg, #d0b782 20%, #a0cecf 80%);
            <?php elseif ($this->options->GradientType =='7'): ?>
                background: #F1F2B5; /* fallback for old browsers */
                background: -webkit-linear-gradient(to left, #F1F2B5 , #135058); /* Chrome 10-25, Safari 5.1-6 */
                background: linear-gradient(to left, #F1F2B5 , #135058); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ *
                <?php elseif ($this->options->GradientType =='8'): ?>
                    background: #02AAB0; /* fallback for old browsers */
                background: -webkit-linear-gradient(to left, #02AAB0 , #00CDAC); /* Chrome 10-25, Safari 5.1-6 */
                background: linear-gradient(to left, #02AAB0 , #00CDAC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            <?php elseif ($this->options->GradientType =='9'): ?>
                background: #C9FFBF; /* fallback for old browsers */
                background: -webkit-linear-gradient(to left, #C9FFBF , #FFAFBD); /* Chrome 10-25, Safari 5.1-6 */
                background: linear-gradient(to left, #C9FFBF , #FFAFBD); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            <?php endif; ?>
            }
        </style>
    <?php elseif ($this->options->BGtype == '1'): ?>
        <style>
            body{
            <?php if (!empty($this->options->bgcolor)): ?>
                background-image: url(<?php $this->options->bgcolor() ?>);
            <?php else: ?>
                background-image: url(<?php getThemeFile('img/bg.png', true); ?>);
            <?php endif; ?>
            }
        </style>
    <?php endif; ?>

    <!-- Fade Effect -->
    <?php if (!empty($this->options->switch) && in_array('ShowLoadingLine', $this->options->switch)): ?>
        <style>
            .fade {
                transition: all <?php $this->options->loadingbuffer(); ?>ms linear;
                -webkit-transform: translate3d(0,0,0);
                -moz-transform: translate3d(0,0,0);
                -ms-transform: translate3d(0,0,0);
                -o-transform: translate3d(0,0,0);
                transform: translate3d(0,0,0);
                opacity: 1;
            }

            .fade.out {
                opacity: 0;
            }
        </style>
    <?php endif; ?>

    
    <!-- Canonical link -->
    <?php
    if ($this->is("post") || $this->is("page") || $this->is("index")) {
        echo '<link rel="canonical" href="';
        ($this->is("post") || $this->is("page")) ? $this->permalink() : (($this->is("index")) ? $this->options->siteUrl() : NULL);
        echo '">';
    }
    ?>

</head>

<body id="scheme-Paradox" class="lazy">
