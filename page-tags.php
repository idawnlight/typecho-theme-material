<?php
/**
 * 标签云页面
 *
 * @package custom
 */
$this->need('header.php'); ?>

<style>
    #bottom{
        position: relative;
    }
    @media screen and (max-width: 480px) {
        .material-tagscloud{
            margin: 6em 2em 0;
        }
    }
    .material-tagscloud a{
        text-decoration:none;
        padding: 1px 9px;
        margin: 9px 1px;
        line-height: 40px;
        white-space: nowrap;
        transition: .6s;
        opacity: .85;
    }
    .material-tagscloud a:hover{
        transition: .6s;
        opacity: 1;
        background: #FAFAFA;
        box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);
    }
</style>

<div class="material-layout mdl-js-layout has-drawer is-upgraded">
    <main class="material-layout__content" id="main">

        <!-- Top Anchor -->
        <div id="top"></div>

        <!-- Hamburger Button -->
        <button class="MD-burger-icon sidebar-toggle">
            <span id="MD-burger-id" class="MD-burger-layer"></span>
        </button>

        <div class=" material-tagscloud">
            <div class="material-post mdl-grid">
            <?php $this->widget('Widget_Metas_Tag_Cloud','sort=name&ignoreZeroCount=1&desc=0')->to($tag);$max = 0; ?>
            <?php while ($tag->next()) if ($tag->count > $max) $max = $tag->count; ?>
            <?php while ($tag->next()): ?>
                <a href="<?php $tag->permalink(); ?>" style="font-size: <?php echo round($tag->count/$max*15+15,2); ?>px;color: #<?php $color = base_convert(round(117-84*$tag->count/$max),10,16);echo $color.$color.$color; ?>"><?php $tag->name(); ?></a>
            <?php endwhile; ?>
            </div>
        </div>

        <?php include('sidebar.php'); ?>
        <?php include('footer.php'); ?>