<?php $this->need('header.php'); ?>

<div class="material-layout  mdl-js-layout has-drawer is-upgraded">

    <main class="material-layout__content" id="main">
        <div id="top"></div>

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
                        <h3>The requested resource is not available</h3>
                        <br><br>
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
<?php if (!empty($this->options->CDNURL)): ?>
<script src="<?php $this->options->CDNURL() ?>/MaterialCDN/js/jquery.min.js"></script>
<script src="<?php $this->options->CDNURL() ?>/MaterialCDN/js/js.min.js"></script>
<script src="<?php $this->options->CDNURL() ?>/MaterialCDN/js/jquery.pjax.min.js"></script>
<?php else: ?>
<script src="<?php $this->options->themeUrl('js/jquery.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('js/js.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('js/jquery.pjax.min.js'); ?>"></script>
<?php endif; ?>


<?php if (!empty($this->options->switch) && in_array('ShowLoadingLine', $this->options->switch)): ?>
<?php if (!empty($this->options->CDNURL)): ?>
<script src="<?php $this->options->CDNURL() ?>/MaterialCDN/js/nprogress.js"></script>
<?php else: ?>
<script src="<?php $this->options->themeUrl('js/nprogress.js'); ?>"></script>
<?php endif; ?>

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

<?php if (!empty($this->options->switch) && in_array('SmoothScroll', $this->options->switch)): ?>
<?php if (!empty($this->options->CDNURL)): ?>
<script src="<?php $this->options->CDNURL() ?>/MaterialCDN/js/smoothscroll.js" async></script>
<?php else: ?>
<script src="<?php $this->options->themeUrl('js/smoothscroll.js'); ?>" async></script>
<?php endif; ?>
<?php endif; ?>


<!-- Pangu js -->
<?php if (!empty($this->options->switch) && in_array('Pangu', $this->options->switch)): ?>
  <?php if (!empty($this->options->CDNURL)): ?>
      <script src="<?php $this->options->CDNURL() ?>/MaterialCDN/js/pangu.min.js"></script>
  <?php else: ?>
      <script src="<?php $this->options->themeUrl('js/pangu.min.js'); ?>"></script>
  <?php endif; ?>
  <script> pangu.spacingPage(); </script>
<?php endif; ?>


<?php $this->footer(); ?>

</html>
