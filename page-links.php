<?php
/**
 * 友情链接页面
 *
 * @package custom
 */
$this->need('header.php'); ?>

<style>
    .md-links {
        min-height: calc(100% - 120px - 5pc - 6em);
        text-align: center;
        overflow: auto;
        padding: 0;
        margin: 0 auto;
        max-width: 320px;
    }

    @media screen and (min-width: 680px) {
        .md-links {
            max-width: 640px;
        }
    }

    @media screen and (min-width: 1000px) {
        .md-links {
            max-width: 960px;
        }
    }

    @media screen and (min-width: 1320px) {
        .md-links {
            max-width: 1280px;
        }
    }

    @media screen and (min-width: 1640px) {
        .md-links {
            max-width: 1600px;
        }
    }

    @media screen and (max-width: 480px) {
        .md-links {
            min-height: calc(100% - 200px - 5pc - 6em);
            margin-top: 6em;
        }
    }

    .md-links-item {
        background: #fff;
        box-shadow: 0 2px 2px 0 rgba(0, 0, 0, .14), 0 3px 1px -2px rgba(0, 0, 0, .2), 0 1px 5px 0 rgba(0, 0, 0, .12);
        height: 72px;
        line-height: 15px;
        margin: 20px 10px;
        padding: 0px 0px;
        transition: box-shadow 0.25s;
    }

    .md-links a {
        color: #333;
        text-decoration: none;
    }

    .md-links li {
        width: 300px;
        float: left;
        list-style: none;
    }

    .md-links-item img {
        float: left;
        box-shadow: 0 2px 2px 0 rgba(0, 0, 0, .14), 0 3px 11px -2px rgba(0, 0, 0, .2), 0 1px 5px 0 rgba(0, 0, 0, .12);
    }

    .md-links-item:hover {
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    }

    .md-links-item a:hover{
        cursor: pointer;
    }

    .md-links-title {
        font-size: 20px;
        line-height: 50px;
    }

    #scheme-Paradox .mdl-mini-footer{
        clear: left;
    }
    #bottom{
        position: relative;
    }
</style>

<div class="material-layout  mdl-js-layout has-drawer is-upgraded">

    <main class="material-layout__content" id="main">

        <!-- Top Anchor -->
        <div id="top"></div>

        <!-- Hamburger Button -->
        <button class="MD-burger-icon sidebar-toggle">
            <span id="MD-burger-id" class="MD-burger-layer"></span>
        </button>

        <div class="md-links">
            <?php if (class_exists("Links_Plugin")): ?>
                <?php Links_Plugin::output('
                <a href="{url}" title="{title}" target="_blank">
                    <li class="md-links-item">
                        <img src="{image}" alt="{name}" width="72px"/>
                        <span  class="md-links-title">{name}</span><br />
                        <span>{description}</span>
                    </li>
                </a>
                '); ?>
            <?php endif; ?>
        </div>


        <?php include('sidebar.php'); ?>
        <?php include('footer.php'); ?>
