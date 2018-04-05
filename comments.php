<?php $this->comments()->to($comments); ?>
<?php function threadedComments($comments, $options)
{
    $commentClass = '';
    $commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent';  //评论层数大于0为子级，否则是父级
    ?>
    <div id="li-<?php $comments->theId(); ?>" class="comment mdl-color-text--grey-700 comment-body<?php
    if ($comments->_levels > 0) {
        echo ' comment-child';
        $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
    } else {
        echo ' comment-parent';
    }
    $comments->alt(' comment-odd', ' comment-even');
    echo $commentClass; ?>">

        <!-- Comment info -->
        <header class="comment header">

            <!-- Comment avatar -->
            <div id="comment__avatar">
                <?php $comments->gravatar(52, "identicon"); ?>
            </div>

            <!-- Comment author -->
            <div class="comment__author">
                <!--Commenter name -->
                <span class="visitor-name-span"><?php $comments->author(); ?>&nbsp;</span>
                <!--Comment date -->
                <span><?php $comments->date('Y-m-d, H:i'); ?></span>
            </div>
        </header>

        <!-- Comment content -->
        <div class="comment__text">
            <?php $comments->content(); ?>
        </div>

        <!-- Comment actions -->
        <nav class="comment__actions">
            <!-- reply -->
            <?php $comments->reply('<button id="comment-reply-button" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
            <i class="material-icons" role="presentation">forum</i>
            <span class="visuallyhidden">reply comment</span>
            </button>'); ?>
            <!-- share -->
            <button id="comment-share-<?php $comments->theId(); ?>-button" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                <i class="material-icons" role="presentation">share</i>
                <span class="visuallyhidden">share comment</span>
            </button>
            <ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu mdl-js-ripple-effect" for="comment-share-<?php $comments->theId(); ?>-button">
                <a class="md-menu-list-a" target="view_window" href="<?php $comments->permalink(); ?>">
                    <li class="mdl-menu__item">在新标签页中打开</li>
                </a>
                <a class="md-menu-list-a" href="https://twitter.com/intent/tweet?text=<?php echo htmlspecialchars($comments->content); ?>+from&url=<?php $comments->permalink(); ?>">
                    <li class="mdl-menu__item">分享到 Twitter</li>
                </a>
                <a class="md-menu-list-a" href="https://plus.google.com/share?url=<?php $comments->permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                    <li class="mdl-menu__item">分享到 Google+</li>
                </a>
            </ul>
        </nav>

        <!-- Comment answers -->
        <div class="comment__answers">
            <?php if ($comments->children) {
                ?>
                <!--是否嵌套评论判断开始-->
                <div class="comment-children">
                    <?php $comments->threadedComments($options); ?>
                    <!--嵌套评论所有内容-->
                </div>
                <?php
            } ?>
            <!--是否嵌套评论判断结束-->
        </div>

    </div>

    <?php
} ?>

<!-- 使用原生评论 -->
<?php if ($this->options->commentis == '0'): ?>

    <div class="mdl-color-text--primary-contrast mdl-card__supporting-text comments">

        <?php if ($this->allow('comment')): ?>

            <div id="<?php $this->respondId(); ?>" class="respond">

                <!-- Input form start -->
                <form method="post" action="<?php $this->commentUrl() ?>">

                    <!-- If user has login -->
                    <?php if ($this->user->hasLogin()): ?>

                        <!-- Display user name & logout -->
                        <p style="color:#8A8A8A;" class="visitor-name-span">Logged in as
                            <a href="<?php $this->options->adminUrl(); ?>" style="font-weight:400"><?php $this->user->screenName(); ?></a>.
                            <a href="<?php $this->options->logoutUrl(); ?>" title="Logout" style="font-weight:400">Logout &raquo;</a>
                        </p>

                        <!-- If user didn't login -->
                    <?php else: ?>

                        <!-- Input name -->
                        <div class="login-form-group">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input type="text" name="author" class="mdl-textfield__input login-input-info" value="<?php $this->remember('author'); ?>" />
                                <label for="author" class="mdl-textfield__label">
                                    <?php if (getThemeOptions("language") === "zh-CN"): ?>
                                    昵称*
                                    <?php else: ?>
                                    Name*
                                    <?php endif; ?>
                                </label>
                            </div>
                        </div>

                        <!-- Input email -->
                        <div class="login-form-group">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input type="email" name="mail" class="mdl-textfield__input login-input-info" value="<?php $this->remember('mail'); ?>" />
                                <label for="mail" class="mdl-textfield__label">
                                    <?php if (getThemeOptions("language") === "zh-CN"): ?>
                                    邮箱*
                                    <?php else: ?>
                                    Email*
                                    <?php endif; ?>
                                </label>
                            </div>
                        </div>

                        <!-- Input website -->
                        <div class="login-form-group">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input type="url" name="url" id="visitor-url" class="mdl-textfield__input login-input-info" value="<?php $this->remember('url'); ?>" />
                                <!--  placeholder="http://"-->
                                <label for="url" class="mdl-textfield__label">
                                    <?php if (getThemeOptions("language") === "zh-CN"): ?>
                                    网站*
                                    <?php else: ?>
                                    Website*
                                    <?php endif; ?>
                                </label>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Input comment content -->
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="comment-input-div">
                        <textarea name="text" rows="<?php $this->options->CommentRows() ?>" id="comment" class="mdl-textfield__input"></textarea>
                        <label for="comment" class="mdl-textfield__label">
                            <?php if (getThemeOptions("language") === "zh-CN"): ?>
                            加入讨论吧...
                            <?php else: ?>
                            Join the discussion
                            <?php endif; ?>
                        </label>
                    </div>

                    <!-- Submit comment content button -->
                    <?php $comments->reply('
                    <button id="comment-button" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                        <i class="material-icons" role="presentation">check</i><span class="visuallyhidden">add comment</span>
                    </button>'); ?>

                </form>
            </div>

            <?php $comments->listComments(); ?>
            <?php if (getThemeOptions("language") === "zh-CN"): ?>
            <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
            <?php else: ?>
            <?php $comments->pageNav('&laquo; Previous', 'Next &raquo;'); ?>
            <?php endif; ?>

        <?php else: ?>

            <div class="comments__closed">
                <span id="commentCount">
                    <?php if (getThemeOptions("language") === "zh-CN"): ?>
                    评论已关闭
                    <?php else: ?>
                    Comment has been closed
                    <?php endif; ?>
                </span>
            </div>

        <?php endif; ?>
    </div>
<?php endif; ?>
