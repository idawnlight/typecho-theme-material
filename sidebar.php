<!-- Overlay for fixed sidebar -->
<div class="sidebar-overlay "></div>

<!-- Material sidebar -->
<aside id="sidebar" class="sidebar sidebar-colored  sidebar-fixed-left" role="navigation">

        <div id="sidebar-main">
        <!-- Sidebar Header -->
    <?php if (!empty($this->options->sidebarheader)): ?>
    <div class="sidebar-header header-cover" style="background-image: url(<?php $this->options->sidebarheader() ?>);">
    <?php else: ?>
        <div class="sidebar-header header-cover" style="background-image: url(<?php thisThemeFile('img/sidebarheader.jpg'); ?>);">
    <?php endif; ?>
            <!-- Top bar -->
            <!--<div class="top-bar"></div>-->
            <!-- Sidebar toggle button -->
            <button type="button" class="sidebar-toggle mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
            <i class="material-icons">clear_all</i>
        </button>
            <!-- Sidebar brand image -->
            <div class="sidebar-image">
                <?php if (!empty($this->options->avatarURL)): ?>
                <img src="<?php $this->options->avatarURL() ?>">
                <?php else: ?>
                <?php if (!empty($this->options->logo)): ?>
                <img src="<?php $this->options->logo() ?>">
                <?php else: ?>
                <img src="<?php thisThemeFile('img/avatar.png') ?>">
                <?php endif; ?>
                <?php endif; ?>
            </div>

            <!-- Sidebar brand name -->
            <a data-toggle="dropdown" class="sidebar-brand" href="#settings-dropdown">
                <?php $this->user->mail(); ?>
                <b class="caret"></b>
            </a>
        </div>
            <!-- Top bar -->
            <!--<div class="top-bar"></div>-->

        <!-- Sidebar Navigation  -->
        <ul class="nav sidebar-nav">
            <!-- User dropdown  -->
            <li class="dropdown">
                <ul id="settings-dropdown" class="dropdown-menu">
                    <?php if ($this->user->hasLogin()): ?>
                    <li>
                        <a href="<?php $this->options->adminUrl(); ?>" tabindex="-1">
                            <i class="material-icons sidebar-material-icons sidebar-indent-left1pc-element">account_circle</i>
                            <?php echo tranMsg("Profile", "用户概要", $this->options->langis) ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php $this->options->adminUrl('options-theme.php'); ?>" tabindex="-1">
                            <i class="material-icons sidebar-material-icons sidebar-indent-left1pc-element">settings</i>
                            <?php echo tranMsg("Settings", "设置外观", $this->options->langis) ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php $this->options->logoutUrl(); ?>" class="md-menu-list-a" tabindex="-1">
                            <i class="material-icons sidebar-material-icons sidebar-indent-left1pc-element">exit_to_app</i>
                            <?php echo tranMsg("Exit", "退出登录", $this->options->langis) ?>
                        </a>
                    </li>
                    <?php else: ?>
                    <li>
                        <a href="<?php $this->options->loginUrl(); ?>" class="md-menu-list-a" tabindex="-1">
                            <i class="material-icons sidebar-material-icons sidebar-indent-left1pc-element">fingerprint</i>
                            <?php echo tranMsg("Login", "用户登录", $this->options->langis) ?>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </li>

            <!-- Homepage -->
            <li id="sidebar-first-li">
                <a href="<?php $this->options->siteUrl(); ?>" target="_self">
                    <i class="material-icons sidebar-material-icons">home</i>
                    <?php echo tranMsg("Homepage", "主页", $this->options->langis) ?>
                </a>
            </li>

            <!-- Archives  -->
            <li class="dropdown">
                <a href="#" class="ripple-effect dropdown-toggle" data-toggle="dropdown">
                    <i class="material-icons sidebar-material-icons">inbox</i>
                    <?php echo tranMsg("Archives", "归档", $this->options->langis) ?>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')
                ->parse('
                <li>
                    <a href="{permalink}" tabindex="-1">
                        {date}
                        <span class="sidebar_archives-count">{count}</span>
                    </a>
                </li>
                '); ?>
                </ul>
            </li>

            <!-- categories -->
            <li class="dropdown">
                <a href="#" class="ripple-effect dropdown-toggle" data-toggle="dropdown">
                    <i class="material-icons sidebar-material-icons">apps</i>
                    <?php echo tranMsg("Categories", "分类", $this->options->langis) ?>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu" for="show-category-button">
                    <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
                    <?php while ($category->next()): ?>
                    <li>
                        <a href="<?php $category->permalink(); ?>" title="<?php $category->name(); ?>">
                            <?php $category->name(); ?>
                        </a>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </li>

            <!-- divider -->
            <li class="divider"></li>
            <!-- Pages  -->
            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                <?php while ($pages->next()): ?>
                <li>
                    <a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>" tabindex="-1">
                        <?php $pages->title(); ?>
                    </a>
                </li>
            <?php endwhile; ?>

            <?php if (!defined('__TYPECHO_ROOT_DIR__')) {
                    exit;
                }
              Typecho_Widget::widget('Widget_Stat')->to($stat);
            ?>

            <!-- Article Numebr  -->
            <li>
                <a href="#">
                    <?php echo tranMsg("Article Number", "文章总数", $this->options->langis) ?>
                    <span class="sidebar-badge"><?php echo $stat->publishedPostsNum;?></span>
                </a>
            </li>
        </ul>

        <!-- Sidebar Footer -->
                <div class="sidebar-divider"></div>

        <!-- Sidebar bottom text -->
        <a href="https://github.com/idawnlight/typecho-theme-material" target="_blank" class="sidebar-footer-text-a">
            <div class="sidebar-text mdl-button mdl-js-button mdl-js-ripple-effect sidebar-footer-text-div" data-upgraded=",MaterialButton,MaterialRipple">
                <?php echo tranMsg("Theme - Material", "主题 - Material", $this->options->langis) ?>
                <span class="sidebar-badge badge-circle">i</span>
            </div>
        </a>

        <?php if (!empty($this->options->switch) && in_array('ShowPixiv', $this->options->switch)) : ?>
        <center>
            <iframe src="https://cloud.mokeyjay.com/pixiv/" frameborder="0"  style="width:240px; height:380px;"></iframe>
        </center>
        <?php endif; ?>

    </div>

</aside>
