<?php
/**
 * 标签云页面
 *
 * @package custom
 */
$this->need('header.php'); ?>

<style>
.tagscloud,body,html{height:100%}
.tagscloud{margin:4rem 1.2rem 3rem;padding:0 1rem}
@media screen and (max-width:480px){.tagscloud{padding:0}}
@media screen and (min-width:480px){.tagscloud{margin-right:99px;margin-bottom:199px;margin-left:99px}}
.tagscloud a{margin:.8rem;padding:.8rem;text-decoration:none;white-space:nowrap;line-height:5rem;opacity:.85;transition:.6s}
.tagscloud a:hover{padding:.75rem;background-color:#fafafa;box-shadow:0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);opacity:1;transition:.6s}
</style>

<div class="material-layout  mdl-js-layout has-drawer is-upgraded">

    <main class="material-layout__content" id="main">

        <!-- Top Anchor -->
        <div id="top"></div>

        <!-- Hamburger Button -->
        <button class="MD-burger-icon sidebar-toggle">
            <span id="MD-burger-id" class="MD-burger-layer"></span>
        </button>
        
        <?php
            function randomFloat($min = 20, $max = 27) {
                return $min + mt_rand() / mt_getrandmax() * ($max - $min);
            }
        ?>

        <?php $this->widget('Widget_Metas_Tag_Cloud', 'ignoreZeroCount=1&limit=300')->to($tags); ?>
        <div class="tagscloud">
            <?php while($tags->next()): ?>
            <a style="font-size:<?php $num=randomFloat(); $newNum  = sprintf("%.2f",$num); echo $newNum; ?>px;color:rgb(<?php echo(rand(0, 255)); ?>, <?php echo(rand(0,255)); ?>, <?php echo(rand(0, 255)); ?>);margin-top:10px;padding-top:10px;" href="<?php $tags->permalink(); ?>" title='<?php $tags->name(); ?>'><?php $tags->name(); ?></a>
            <?php endwhile; ?>
        </div>


        <?php include('sidebar.php'); ?>
        <?php include('footer.php'); ?>
