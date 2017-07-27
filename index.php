<?php
/**
 * 这是 <a herf="https://viosey.com/" target="_blank">Viosey</a> 基于 Google Material Design 开发的 Typecho 主题，目前 Typecho 版由 <a herf="https://blog.lim-light.com/" target="_blank">黎明余光</a> 维护
 *
 * @package Theme.Material
 * @author 黎明余光
 * @version 3.0.3
 * @link https://blog.lim-light.com
 */

$this->need('header.php');?>

        <div class="material-layout  mdl-js-layout has-drawer is-upgraded">

        <main class="material-layout__content" id="main">

            <!-- Top Anchor -->
            <div id="top"></div>

            <!-- Hamburger Button -->
            <button class="MD-burger-icon sidebar-toggle">
                <span class="MD-burger-layer"></span>
            </button>

            <div class="material-index mdl-grid">

                <!-- Daily Pic -->
                <div class="mdl-card mdl-shadow--<?php $this->options->CardElevation() ?>dp daily-pic mdl-cell mdl-cell--8-col index-top-block">
                    <?php if (!empty($this->options->dailypic)): ?>
                    <div class="mdl-card__media mdl-color-text--grey-50" style="background-image:url(<?php $this->options->dailypic() ?>)">
                        <?php else: ?>
                        <?php if (!empty($this->options->CDNURL)): ?>
                        <div class="mdl-card__media mdl-color-text--grey-50" style="background-image:url(<?php $this->options->CDNURL() ?>/MaterialCDN/img/daily_pic.png)">
                            <?php else: ?>
                            <div class="mdl-card__media mdl-color-text--grey-50" style="background-image:url(<?php $this->options->themeUrl('img/daily_pic.png') ?>)">
                                <?php endif; ?>
                                <?php endif; ?>
                                <p class="index-top-block-slogan"><a href="<?php $this->options->dailypicLink() ?>"><?php $this->options->slogan() ?></a></p>
                            </div>

                            <div class="mdl-card__supporting-text meta mdl-color-text--grey-600">
                                <!-- Author avatar -->
                                <div id="author-avatar">
                                    <?php if (!empty($this->options->avatarURL)): ?>
                                    <img src="<?php $this->options->avatarURL() ?>" width="32px" height="32px" />
                                    <?php else: ?>
                                    <?php $this->author->gravatar(32); ?>
                                    <?php endif; ?>
                                </div>
                                <div>
                                    <strong><?php $this->author(); ?></strong>
                                </div>
                            </div>
                        </div>

                        <!-- Blog info -->
                        <div class="mdl-card mdl-shadow--<?php $this->options->CardElevation() ?>dp something-else mdl-cell mdl-cell--8-col mdl-cell--4-col-desktop index-top-block">
                            <!-- Search -->
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable" method="post" action="">
                                <label id="search-label" class="mdl-button mdl-js-ripple-effect mdl-js-button mdl-button--fab mdl-color--accent mdl-shadow--4dp" for="search">
                                    <!-- For modern browsers. -->
                                    <i class="material-icons mdl-color-text--white" role="presentation">search</i>
                                </label>
                                <form id="search-form" method="post" action="" class="mdl-textfield__expandable-holder">
                                    <input class="mdl-textfield__input search-input" type="text" name="s" id="search">
                                    <label id="search-form-label" class="mdl-textfield__label" for="search">Enter your query...</label>
                                </form>
                            </div>
                            <!-- LOGO -->
                            <div class="something-else-logo mdl-color--white mdl-color-text--grey-600">
                                <?php if (!empty($this->options->logoLink)): ?>
                                <a href="<?php $this->options->logoLink() ?>">
                                    <?php endif; ?>
                                    <?php if (!empty($this->options->logo)): ?>
                                    <img src="<?php $this->options->logo() ?>">
                                    <?php else: ?>
                                    <?php if (!empty($this->options->CDNURL)): ?>
                                    <img src="<?php $this->options->CDNURL() ?>/MaterialCDN/img/MaterialLOGO.png">
                                    <?php else: ?>
                                    <img src="<?php $this->options->themeUrl('img/MaterialLOGO.png') ?>">
                                    <?php endif; ?>
                                    <?php endif; ?>
                                </a>
                            </div>
                            <!-- Infomation -->
                            <div class="mdl-card__supporting-text meta meta--fill mdl-color-text--grey-600">
                                <div>
                                    <strong><?php $this->options->title();  ?></strong>
                                </div>
                                <div class="section-spacer"></div>
                                <!-- Pages button -->
                                <button id="show-pages-button" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                                <i class="material-icons" role="presentation">view_carousel</i>
                                <span class="visuallyhidden">Pages</span>
                            </button>
                                <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right" for="show-pages-button">
                                    <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                                    <?php while ($pages->next()): ?>
                                    <a href="<?php $pages->permalink(); ?>" class="index_share-link" title="<?php $pages->title(); ?>">
                                        <li class="mdl-menu__item mdl-js-ripple-effect">
                                            <?php $pages->title(); ?>
                                        </li>
                                    </a>
                                    <?php endwhile; ?>
                                </ul>

                                <!--  Menu button-->
                                <button id="menubtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                                    <i class="material-icons" role="presentation">more_vert</i>
                                    <span class="visuallyhidden">show menu</span>
                                </button>
                                <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right" for="menubtn">

                                    <a href="<?php $this->options->feedUrl(); ?>" class="index_share-link">
                                        <li class="mdl-menu__item mdl-js-ripple-effect">
                                            <?php if ($this->options->langis == '0'): ?> Article RSS
                                            <?php else: ?> 文章 RSS
                                            <?php endif; ?>
                                        </li>
                                    </a>
                                    <!-- 文章的RSS地址连接 -->
                                    <a class="index_share-link" href="https://www.facebook.com/sharer/sharer.php?u=<?php $this->options->siteUrl(); ?>">
                                        <li class="mdl-menu__item">
                                            <?php if ($this->options->langis == '0'): ?> Share to Facebook
                                            <?php else: ?> 分享到 Facebook
                                            <?php endif; ?>
                                        </li>
                                    </a>
                                    <a class="index_share-link" href="https://telegram.me/share/url?url=<?php $this->options->siteUrl(); ?>&text=<?php $this->options->title(); ?>" >
                                        <li class="mdl-menu__item">
                                            <?php if ($this->options->langis == '0'): ?> Share to Telegram
                                            <?php else: ?> 分享到 Telegram
                                            <?php endif; ?>
                                        </li>
                                    </a>
                                    <a class="index_share-link" href="https://twitter.com/intent/tweet?text=<?php $this->options->title(); ?>&url=<?php $this->options->siteUrl(); ?>&via=<?php $this->author->screenName(); ?>">
                                        <li class="mdl-menu__item">
                                            <?php if ($this->options->langis == '0'): ?> Share to Twitter
                                            <?php else: ?> 分享到 Twitter
                                            <?php endif; ?>
                                        </li>
                                    </a>
                                    <a class="index_share-link" href="https://plus.google.com/share?url=<?php $this->options->siteUrl(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                                        <li class="mdl-menu__item">
                                            <?php if ($this->options->langis == '0'): ?> Share to Google+
                                            <?php else: ?> 分享到 Google+
                                            <?php endif; ?>
                                        </li>
                                    </a>
                                    <a class="index_share-link" href="http://service.weibo.com/share/share.php?appkey=&title=<?php $this->options->title(); ?>&url=<?php $this->options->siteUrl(); ?>&pic=&searchPic=false&style=simple ">
                                        <li class="mdl-menu__item">
                                            <?php if ($this->options->langis == '0'): ?> Share to Weibo
                                            <?php else: ?> 分享到 新浪微博
                                            <?php endif; ?>
                                        </li>
                                    </a>
                                </ul>
                            </div>
                        </div>
                        <?php if ($this->is('index')): ?>
                        <?php
                    $db = Typecho_Db::get();
                    $prefix = $db->getPrefix();
                    $sticky_posts = $db->fetchAll($this->db
                        ->select()->from($prefix.'contents')
                        ->orWhere('cid = ?', $this->options->sticky_1)
                        ->orWhere('cid = ?', $this->options->sticky_2)
                        ->where('type = ? AND status = ? AND password IS NULL', 'post', 'publish'));
                        rsort($sticky_posts);//对数组逆向排序，即大ID在前
                        foreach ($sticky_posts as $sticky_posts) {
                            $result = Typecho_Widget::widget('Widget_Abstract_Contents')->push($sticky_posts);
                            $post_views = number_format($result['views']);
                            $post_title = htmlspecialchars($result['title']);
                            $post_date = date('M d,Y', $result['created']);
                            $permalink = $result['permalink'];
                            /*if($post_views > $this->options->view_num){echo 'HOT';} else {echo ''.$post_views.''' VIEW';};*/
                            echo '
                            <!-- Article module -->
                            <div class="mdl-article-top mdl-cell mdl-cell--12-col '.((!empty($this->options->switch) && in_array('ShowLoadingLine', $this->options->switch))?"fade out":"").' ">
                                <p class="article-headline-p-top"><a href="'.$permalink.'" target="_self"><span style="color:">[置顶]&nbsp;</span><span style="color:#757575">'.$post_title .'</span></a></p>
                            </div>
                            '."\n\r";
                        }
                    ?>
                            <?php endif; ?>

                            <?php while ($this->next()): ?>

                            <!-- Article module -->
                            <div class="post_entry-module mdl-card mdl-shadow--<?php $this->options->CardElevation() ?>dp mdl-cell mdl-cell--12-col <?php if (!empty($this->options->switch) && in_array('ShowLoadingLine', $this->options->switch)): ?>fade out<?php endif; ?>">

                                <!-- Article link & title -->
                                <?php if ($this->options->ThumbnailOption == '1'): ?>
                                <div class="post-thumbnail-pure mdl-card__media mdl-color-text--grey-50 lazy " data-original="<?php showThumbnail($this); ?>" style="background-image:url(<?php $this->options->themeUrl('img/grey.gif'); ?>)">
                                    <p class="article-headline-p"><a href="<?php $this->permalink() ?>" target="_self"><?php $this->title() ?></a></p>
                                </div>
                                <?php elseif ($this->options->ThumbnailOption == '2'): ?>
                                <div class="mdl-card__media mdl-color-text--grey-50" style="background-color:<?php $this->options->TitleColor()?> !important;color:#757575 !important;">
                                    <p class="article-headline-p-nopic">
                                        <a href="<?php $this->permalink() ?>" target="_self">
                                        "</br><?php $this->title() ?></br>"
                                    </a>
                                    </p>
                                </div>
                                <?php elseif ($this->options->ThumbnailOption == '3'): ?>
                                <div class="post_thumbnail-random mdl-card__media mdl-color-text--grey-50 lazy " data-original="<?php randomThumbnail($this); ?>" style="background-image:url(<?php $this->options->themeUrl('img/grey.gif'); ?>)">
                                    <p class="article-headline-p"><a href="<?php $this->permalink() ?>" target="_self"><?php $this->title() ?></a></p>
                                </div>
                                <?php endif; ?>

                                <!-- Article content -->
                                <div class="mdl-color-text--grey-600 mdl-card__supporting-text post_entry-content">
                                    <?php $this->excerpt(80, '...'); ?> &nbsp;&nbsp;&nbsp;
                                    <span>
                                <a href="<?php $this->permalink(); ?>" target="_self">
                                    <?php echo tranMsg("Continue Reading", "继续阅读", $this->options->langis) ?>
                                </a>
                            </span>
                                </div>

                                <!-- Article info-->
                                <div id="post_entry-info">
                                    <div class="mdl-card__supporting-text meta mdl-color-text--grey-600 " id="post_entry-left-info">
                                        <!-- Author avatar -->
                                        <div id="author-avatar">
                                            <?php if (!empty($this->options->avatarURL)): ?>
                                            <img src="<?php $this->options->avatarURL() ?>" width="44px" height="44px" />
                                            <?php else: ?>
                                            <?php $this->author->gravatar(44); ?>
                                            <?php endif; ?>
                                        </div>
                                        <div>
                                            <span class="author-name-span"><strong><?php $this->author(); ?></strong></span>
                                            <span>
                                        <?php if ($this->options->langis == '0'): ?>
                                            <?php $this->date('F j, Y'); ?>
                                        <?php else: ?>
                                            <?php $this->dateWord(); ?>
                                        <?php endif; ?>
                                    </span>
                                        </div>
                                    </div>
                                    <div id="post_entry-right-info" style="color:<?php $this->options->alinkcolor(); ?>">
                                    <span class="post_entry-category">
                                        <?php $this->category(', '); ?> |
                                    </span>
                                        <a href="<?php $this->permalink() ?>">
                                            <!-- 使用原生评论 -->
                                            <?php $this->commentsNum('%d 评论'); ?>
                                        </a>

                                    </div>

                                </div>

                            </div>

                            <?php endwhile; ?>

                            <nav class="material-nav mdl-cell mdl-cell--12-col">
                                <?php $this->pageLink(
                        '<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon"><i class="material-icons" role="presentation">arrow_back</i></button>'); ?>
                                <span class="page-number current"><?php if ($this->_currentPage>1) {
                            echo $this->_currentPage;
                        } else {
                            echo 1;
                        }?> of <?php echo   ceil($this->getTotal() / $this->parameter->pageSize); ?></span>

                                <?php $this->pageLink(
                        '<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon"><i class="material-icons" role="presentation">arrow_forward</i></button>', 'next'); ?>
                            </nav>

                    </div>

                    <?php include('sidebar.php'); ?>
                    <?php include('footer.php'); ?>
