<?php $this->need('header.php'); ?>

<div class="material-layout mdl-js-layout has-drawer is-upgraded">

    <main class="material-layout__content" id="main">
        <div id="top"></div>

        <!-- Post module -->
        <div class="material-post_container">
            <div class="material-post mdl-grid">

                <!-- Article title -->
                <div class="mdl-card mdl-shadow--4dp mdl-cell mdl-cell--12-col">
                    <div class="post_thumbnail-custom mdl-card__media mdl-color-text--grey-50" style="background-image: url(<?php getThemeFile('img/daily_pic.png', true); ?>);">
                        <p class="article-headline-p">
                            <?php $this->options->title(); ?>
                        </p>
                    </div>

                    <!-- Articel content -->
                    <div id="post-content" class="mdl-color-text--grey-700 mdl-card__supporting-text fade out">
                        <h1 style="margin-top: 25px!important;">404 - Not Found</h1>
                        <h3 style="padding-bottom: 20px;">The requested resource is not available</h3>
                    </div>

                </div>

            </div>

    </main>
    <div class="mdl-layout__obfuscator"></div>
</div>


<!--Analysis code-->
<?php $this->options->analysis(); ?>
</body>

<!-- Material js -->
<script src="<?php getThemeFile('js/jquery.min.js', true); ?>"></script>
<script src="<?php getThemeFile('js/js.min.js', true); ?>"></script>

<?php if (!empty($this->options->switch) && in_array('ShowLoadingLine', $this->options->switch)): ?>
    <script src="<?php getThemeFile('js/nprogress.js', true); ?>"></script>

    <script type="text/javascript">
        NProgress.configure({
            showSpinner: true
        });
        NProgress.start();
        $('#nprogress .bar').css({
            'background': '<?php $this->options->loadingcolor(); ?>'
        });
        $('#nprogress .peg').css({
            'box-shadow': '0 0 10px <?php $this->options->loadingcolor(); ?>, 0 0 15px <?php $this->options->loadingcolor(); ?>'
        });
        $('#nprogress .spinner-icon').css({
            'border-top-color': '<?php $this->options->loadingcolor(); ?>',
            'border-left-color': '<?php $this->options->loadingcolor(); ?>'
        });
        setTimeout(function() {
            NProgress.done();
            $('.fade').removeClass('out');
        }, <?php $this->options->loadingbuffer(); ?>);
    </script>
<?php endif; ?>


<?php $this->footer(); ?>

</html>
