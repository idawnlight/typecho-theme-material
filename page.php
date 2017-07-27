<?php $this->need('header.php'); ?>

<div class="material-layout  mdl-js-layout has-drawer is-upgraded">

    <main class="material-layout__content" id="main">
        <div id="top"></div>
        <!-- Sidebar hamburger button -->
        <button class="MD-burger-icon sidebar-toggle">
            <span class="MD-burger-layer"></span>
        </button>

        <!-- Post module -->
        <div class="material-post_container">
            <div class="material-post mdl-grid">

                <!-- Article title -->
                <div class="mdl-card mdl-shadow--4dp mdl-cell mdl-cell--12-col">
                    <div class="post_thumbnail-custom mdl-card__media mdl-color-text--grey-50" style="background-image: url(<?php showThumbnail($this); ?>);">
                        <p class="article-headline-p">
                            <?php $this->title() ?>
                        </p>
                    </div>

                <!-- Articli info -->
                <div class="mdl-color-text--grey-700 mdl-card__supporting-text meta">
                    <!-- Author avatar -->
                    <div id="author-avatar">
                        <?php if (!empty($this->options->avatarURL)): ?>
                        <img src="<?php $this->options->avatarURL() ?>" width="44px" height="44px" alt="Author Avatar">
                        <?php else: ?>
                        <?php $this->author->gravatar(44); ?>
                        <?php endif; ?>
                    </div>

                    <div>
                        <!-- Author name -->
                        <strong><?php $this->author(); ?></strong>
                        <!-- Articel date -->
                        <span>
                            <?php if ($this->options->langis == '0'): ?>
                                <?php $this->date('F j, Y'); ?>
                            <?php else: ?>
                                <?php $this->dateWord(); ?>
                            <?php endif; ?>
                        </span>
                    </div>
                    <div class="section-spacer"></div>
                    <button id="article-functions-qrcode-button" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                        <i class="material-icons" role="presentation">devices other</i>
                        <span class="visuallyhidden">devices other</span>
                    </button>
                    <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="article-functions-qrcode-button">
                        <img src="https://pan.baidu.com/share/qrcode?w=246&h=246&url=<?php $this->permalink(); ?>">
                    </ul>
                    <!-- view tags -->
                    <button id="article-functions-viewtags-button" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                                <!-- For modern browsers. -->
                                <i class="material-icons" role="presentation">bookmarks</i>
                                <span class="visuallyhidden">tags</span>
                            </button>
                    <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="article-functions-viewtags-button">
                        <li class="mdl-menu__item" >
                            <?php $this->tags('<li class="mdl-menu__item" style="text-decoration: none;"> ', true, ''); ?></li>
                    </ul>
                    <!-- share -->
                    <button id="article-fuctions-share-button" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                                <i class="material-icons" role="presentation">share</i>
                                <span class="visuallyhidden">share</span>
                            </button>
                    <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="article-fuctions-share-button">
                        <?php if ($this->user->hasLogin()):?>
                        <a class="md-menu-list-a" target="_blank" href="<?php $this->options->adminUrl(); ?>write-post.php?cid=<?php echo $this->cid;?>" target="_blank">
                                <li class="mdl-menu__item">编辑</li>
                        </a>
                        <?php endif;?>
                        <a class="md-menu-list-a" href="https://www.facebook.com/sharer/sharer.php?u=<?php $this->options->permalink(); ?>">
                            <li class="mdl-menu__item">
                                <?php if ($this->options->langis == '0'): ?> Share to Facebook
                                <?php else: ?> 分享到 Facebook
                                <?php endif; ?>
                            </li>
                        </a>
                        <a class="md-menu-list-a" href="https://telegram.me/share/url?url=<?php $this->options->permalink(); ?>&text=<?php $this->options->title(); ?>" >
                            <li class="mdl-menu__item">
                                <?php if ($this->options->langis == '0'): ?> Share to Telegram
                                <?php else: ?> 分享到 Telegram
                                <?php endif; ?>
                            </li>
                        </a>
                        <a class="md-menu-list-a" href="https://twitter.com/intent/tweet?text=<?php $this->title(); ?>&url=<?php $this->permalink() ?>&via=<?php $this->user->screenName(); ?>">
                            <li class="mdl-menu__item">
                                <?php if ($this->options->langis == '0'): ?> Share to Twitter
                                <?php else: ?> 分享到 Twitter
                                <?php endif; ?>
                            </li>
                        </a>
                        <a class="md-menu-list-a" href="https://plus.google.com/share?url=<?php $this->permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                            <li class="mdl-menu__item">
                                <?php if ($this->options->langis == '0'): ?> Share to Google+
                                <?php else: ?> 分享到 Google+
                                <?php endif; ?>
                            </li>
                        </a>
                        <a class="md-menu-list-a" href="http://service.weibo.com/share/share.php?appkey=&title=<?php $this->options->title(); ?>&url=<?php $this->options->permalink(); ?>&pic=&searchPic=false&style=simple ">
                            <li class="mdl-menu__item">
                                <?php if ($this->options->langis == '0'): ?> Share to Weibo
                                <?php else: ?> 分享到新浪微博
                                <?php endif; ?>
                            </li>
                        </a>
                    </ul>
                </div>

                <!-- Articel content -->
                <div id="post-content" class="mdl-color-text--grey-700 mdl-card__supporting-text fade out">
                    <?php $this->content(); ?>
                </div>

                <!-- Article comments -->
                <?php include('comments.php'); ?>
            </div>

            <!-- theNext thePrev button -->
            <nav class="material-nav mdl-color-text--grey-50 mdl-cell mdl-cell--12-col">
                <?php $this->theNext('%s', null, array('title' => '
                        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon mdl-color--white mdl-color-text--grey-900" role="presentation">
                            <i class="material-icons">arrow_back</i>
                        </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Newer', 'tagClass' => 'prev-content')); ?>
                <div class="section-spacer"></div>
                <?php $this->thePrev('%s', null, array('title' => 'Older&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon mdl-color--white mdl-color-text--grey-900" role="presentation">
                            <i class="material-icons">arrow_forward</i>
                        </button>', 'tagClass' => 'prev-content')); ?>
            </nav>
        </div>

        <?php include('sidebar.php'); ?>
        <?php include('footer.php'); ?>
