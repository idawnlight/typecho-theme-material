<?php $this->need('header.php'); ?>

<div class="material-layout  mdl-js-layout has-drawer is-upgraded">

    <main class="material-layout__content" id="main">
        <!-- Top Anchor -->
        <div id="top"></div>

        <!-- Hamburger Button -->
        <button class="MD-burger-icon sidebar-toggle">
            <span class="MD-burger-layer"></span>
        </button>

        <div class="material-index mdl-grid">

            <?php while ($this->next()): ?>

            <!-- Article fragment -->
            <div class="post_entry-module mdl-card mdl-shadow--<?php $this->options->CardElevation() ?>dp mdl-cell mdl-cell--12-col <?php if (!empty($this->options->switch) && in_array('ShowLoadingLine', $this->options->switch)): ?>fade out<?php endif; ?>">

                    <!-- Article link & title -->
                    <?php if ($this->options->ThumbnailOption == '1'): ?>
                    <div class="post-thumbnail-pure mdl-card__media mdl-color-text--grey-50 lazy " data-original="<?php showThumbnail($this); ?>">
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
                    <div class="post_thumbnail-random mdl-card__media mdl-color-text--grey-50 lazy " data-original="<?php randomThumbnail($this); ?>">
                        <p class="article-headline-p"><a href="<?php $this->permalink() ?>" target="_self"><?php $this->title() ?></a></p>
                    </div>
                    <?php endif; ?>

                <!-- Article content -->
                <div class="mdl-color-text--grey-600 mdl-card__supporting-text post_entry-content">
                    <!--  $this->content('Continue Reading...');  -->
                    <?php $this->excerpt(80, '...'); ?> &nbsp;&nbsp;&nbsp;
                    <span>
                        <a href="<?php $this->permalink(); ?>" target="_self">
                            <?php echo tranMsg("Continue Reading", "继续阅读", $this->options->langis) ?>
                        </a>
                    </span>
                </div>

                <!-- Articli info-->
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
