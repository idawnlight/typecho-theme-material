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
                    <div class="post_thumbnail-custom mdl-card__media mdl-color-text--grey-50" style="background-image: url(<?php $this->options->themeUrl('img/daily_pic.png'); ?>);">
                        <p class="article-headline-p">
                            <?php $this->options->title(); ?>
                        </p>
                    </div>

                <!-- Articel content -->
                <div id="post-content" class="mdl-color-text--grey-700 mdl-card__supporting-text fade out">
                    <br>
                    <h1>404 - Not Found</h1>
                    <h3><?php echo tranMsg("The requested resource is not available", "您所请求的资源不可用", $this->options->langis) ?></h3>
                    <br><br>
                </div>

                <!-- Search -->
                <div class="mdl-color-text--primary-contrast mdl-card__supporting-text comments">
                    <form method="post" action="">
                        <!-- Input search content -->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="comment-input-div">
                            <textarea name="text" rows="1" id="comment" class="mdl-textfield__input"></textarea>
                            <label for="comment" class="mdl-textfield__label">
                                <?php echo tranMsg("Search Engine may help you find out new pages", "试试搜索...", $this->options->langis) ?>
                            </label>
                        </div>
                    </form>
                </div>

            </div>

        </div>

        <?php include('sidebar.php'); ?>
        <?php include('footer.php'); ?>
