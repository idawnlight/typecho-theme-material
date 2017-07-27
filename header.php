<!DOCTYPE HTML>
<html >
    <head>
        <meta charset="utf-8" />

        <!-- Title -->
        <title>
            <?php $this->archiveTitle('', '', ' - '); ?>
            <?php $this->options->title(); ?>
        </title>

        <!-- dns prefetch -->
        <meta http-equiv="x-dns-prefetch-control" content="on">
            <!-- balabalabala -->

        <!-- Meta & Info -->
        <meta http-equiv="X-UA-Compatible">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta name="theme-color" content="<?php $this->options->ChromeThemeColor() ?>">
        <meta name="author" content="<?php $this->options->title() ?>">
        <meta name="description" itemprop="description" content="<?php $this->options->description() ?>">
        <meta name="keywords" content="<?php $this->options->keywords() ?>">

        <!-- Favicons -->
        <link rel="icon shortcut" type="image/ico" href="<?php $this->options->favicon() ?>">
        <link rel="icon" sizes="192x192" href="<?php $this->options->favicon() ?>">
        <link rel="apple-touch-icon" href="<?php $this->options->favicon() ?>">

        <!--iOS -->
        <meta name="apple-mobile-web-app-title" content="Title">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="480">

        <!-- Add to homescreen for Chrome on Android -->
        <meta name="mobile-web-app-capable" content="yes">

        <!-- Tile icon for Win8 (144x144 + tile color) -->
        <!-- <meta name="msapplication-TileImage" content="img/touch/ms-touch-icon-144x144-precomposed.png" /> -->
        <meta name="msapplication-TileColor" content="#FFFFFF" />

        <!-- The Open Graph protocol -->
        <meta property="og:url" content="<?php $this->permalink(); ?>">
        <meta property="og:type" content="blog">
        <meta property="og:title" content="<?php $this->archiveTitle(); ?>">
        <meta property="og:image" content="<?php $this->options->favicon() ?>" />
        <meta property="og:description" content="<?php $this->options->description() ?>">
        <!--<meta property="og:article:tag" content="<%= tag.name %>">-->

        <!-- Block IE -->
        <!--[if lte IE 9]>
            <?php if (!empty($this->options->CDNURL)): ?>
                <link rel="stylesheet" href="<?php $this->options->CDNURL() ?>/MaterialCDN/css/ie-blocker.css">
            <?php else: ?>
                <link rel="stylesheet" href="<?php $this->options->themeUrl('css/ie-blocker.css'); ?>">
            <?php endif; ?>
            <?php if ($this->options->langis == '0'): ?>
                <?php if (!empty($this->options->CDNURL)): ?>
                   <script src="<?php $this->options->CDNURL() ?>/MaterialCDN/js/ie-blocker.en.js" img-path="../img/ie-blocker/"></script>
                <?php else: ?>
                   <script src="<?php $this->options->themeUrl('js/ie-blocker.en.js'); ?>" img-path="../img/ie-blocker/"></script>
                <?php endif; ?>
            <?php elseif ($this->options->langis == '1'): ?>
                <?php if (!empty($this->options->CDNURL)): ?>
                    <script src="<?php $this->options->CDNURL() ?>/MaterialCDN/js/ie-blocker.zhCN.js" img-path="../img/ie-blocker/"></script>
                <?php else: ?>
                    <script src="<?php $this->options->themeUrl('js/ie-blocker.zhCN.js'); ?>" img-path="../img/ie-blocker/"></script>
                <?php endif; ?>
            <?php endif; ?>
       <![endif]-->

        <!-- The Twitter Card protocol -->
        <meta name="twitter:title" content="<?php $this->archiveTitle(); ?>">
        <meta name="twitter:description" content="<?php $this->options->description() ?>">
        <meta name="twitter:image" content="<?php $this->options->favicon() ?>">
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:url" content="<?php $this->permalink(); ?>" />

        <?php $this->header(); ?>

        <!-- Material style -->
        <?php if (!empty($this->options->CDNURL)): ?>
            <link rel="stylesheet" type="text/css" media="all" href="<?php $this->options->CDNURL() ?>/MaterialCDN/css/material.min.css" />
            <link rel="stylesheet" type="text/css" media="all" href="<?php $this->options->CDNURL() ?>/MaterialCDN/css/style.min.css" />
        <?php else: ?>
            <link rel="stylesheet" type="text/css" media="all" href="<?php $this->options->themeUrl('css/material.min.css'); ?>" />
            <link rel="stylesheet" type="text/css" media="all" href="<?php $this->options->themeUrl('css/style.min.css'); ?>" />
        <?php endif; ?>

        <style>
            <?php if (!empty($this->options->footersns) && in_array('ShowFacebook', $this->options->footersns)) : ?>
            .footer-sns-facebook {
                background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0OCIgaGVpZ2h0PSI0OCIgY2xhc3M9Imljb24iIHZpZXdCb3g9IjAgMCAxMDI0IDEwMjQiPjxwYXRoIGQ9Ik0xMzguNiA3OGMtMjIuNCA1LjItNTUuOCA0MC4yLTYwLjYgNjMuNC0xLjQgNi40LTIgMTI5LjgtMS42IDM2Ny42LjYgMjk4LjYgMSAzNTguOCAzLjQgMzYzIDExIDIwLjIgMjEuNiAzMi40IDM3LjIgNDMgMTUgMTAuMiAxNy40IDExLjIgMzMgMTMgMTEuMiAxLjQgMTM2IDIgMzY1IDEuNiAzMTQtLjYgMzQ4LjYtMSAzNTUtMy44IDE1LjgtNy4yIDMzLjgtMjIgNDMuMi0zNS40IDUuMi03LjQgMTAuOC0xNi42IDEyLjYtMjAuNCAyLjgtNi40IDMuMi00MC44IDMuOC0zNTQgLjQtMjIzLS4yLTM1My40LTEuNC0zNjUtMi0xNy0yLjYtMTguNi0xMy0zNC04LjYtMTIuNi0xNC4yLTE4LjQtMjUuMi0yNS44LTcuOC01LjQtMTcuNC0xMS0yMS42LTEyLjQtNi0yLjItNzIuOC0yLjYtMzY1LjQtMi42LTE5Ni44LjItMzYxIC44LTM2NC40IDEuOHptNjU3LjYgODcuOGw0LjggMy44djU1LjJjMCA1NC42IDAgNTUuMi00LjYgNTkuNi00LjQgNC40LTYgNC42LTUwLjIgNS42bC00NS42IDEtNy4yIDUuNmMtMTAuNCA4LTE2LjggMTcuMi0xOS4yIDI3LjQtMSA1LTEuOCAyNC44LTEuOCA0NCAuMiAzOCAxLjYgNDQuNiAxMC44IDQ4IDIuOCAxLjIgMjguNCAyIDU2LjggMiA0Ny44IDAgNTIgLjIgNTYuMiAzLjhsNC44IDMuOHY1NS4yYzAgNTQuNiAwIDU1LjItNC42IDU5LjYtNC40IDQuNi01LjQgNC42LTU3IDUuMi0yOC44LjItNTQuNC44LTU2LjggMS40LTIuNC42LTUuNiAzLTYuOCA1LjQtMS44IDMuMi0yLjQgNDEuNC0yLjYgMTQzLjJsLS4yIDEzOC44LTUuNiA0LjgtNS42IDQuOEg2MDljLTUyLjQgMC01Mi44IDAtNTguMi00LjZsLTUuNC00LjYtLjItMTQwLjYtLjItMTQwLjYtNC44LTMuOGMtNC4yLTMuNC04LTMuOC0zNS42LTMuOC0zMi44IDAtNDEtMS44LTQzLjYtMTAtLjYtMi4yLTEuMi0yNS40LTEuMi01MS40IDAtNjAuOC0uMi01NyAzLjQtNjEuNiAyLjgtMy42IDYtNCAzNy44LTUgMzMtMSAzNS4yLTEuMiAzOS40LTUuNiA0LjYtNC40IDQuNi01LjIgNS44LTcxIDEuMi03My40LjItNjcuMiAxNi42LTk5LjQgOC0xNS44IDEyLjgtMjIgMjgtMzcgMTUuMi0xNS4yIDIxLjQtMTkuNiAzOC4yLTI4IDExLTUuNCAyNC0xMSAyOS0xMi4yIDYuMi0xLjggMjguNi0yLjYgNzEuMi0yLjYgNTguNi0uMiA2Mi42IDAgNjcgMy42eiIvPjwvc3ZnPg==);
            }
            <?php endif; ?>

            <?php if (!empty($this->options->footersns) && in_array('ShowTwitter', $this->options->footersns)) : ?>
            .footer-sns-twitter {
                background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0OCIgaGVpZ2h0PSI0OCIgY2xhc3M9Imljb24iIHZpZXdCb3g9IjAgMCAxMDI0IDEwMjQiPjxwYXRoIGQ9Ik0xMzguNiA3OGMtMjIuNCA1LjItNTUuOCA0MC4yLTYwLjYgNjMuNC0xLjQgNi40LTIgMTI5LjgtMS42IDM2Ny42LjYgMjk4LjYgMSAzNTguOCAzLjQgMzYzIDExIDIwLjIgMjEuNiAzMi40IDM3LjIgNDMgMTUgMTAuMiAxNy40IDExLjIgMzMgMTMgMTEuMiAxLjQgMTM2IDIgMzY1IDEuNiAzMTQtLjYgMzQ4LjYtMSAzNTUtMy44IDE1LjgtNy4yIDMzLjgtMjIgNDMuMi0zNS40IDUuMi03LjQgMTAuOC0xNi42IDEyLjYtMjAuNCAyLjgtNi40IDMuMi00MC44IDMuOC0zNTQgLjQtMjIzLS4yLTM1My40LTEuNC0zNjUtMi0xNy0yLjYtMTguNi0xMy0zNC04LjYtMTIuNi0xNC4yLTE4LjQtMjUuMi0yNS44LTcuOC01LjQtMTcuNC0xMS0yMS42LTEyLjQtNi0yLjItNzIuOC0yLjYtMzY1LjQtMi42LTE5Ni44LjItMzYxIC44LTM2NC40IDEuOHptNTMyLjggMjA1YzEwIDQgMjMgMTAuOCAyOC44IDE1LjIgMTIuNiA5LjIgMTYuNiAxMC42IDI5LjQgOS40IDYuNi0uNiAxMy0zLjIgMjAuNC04LjIgMTEuMi03LjYgMTkuNC05LjIgMjMuNi01IDMuNiAzLjYgMi44IDktMi44IDE4LjYtNy4yIDEyLjQtNiAxOC44IDQuMiAyNC4yIDQuNCAyLjIgOC4yIDUuNiA4LjYgNy40IDEgNC44LTEyLjYgMjQuMi0yMiAzMS44LTExLjggOS4yLTE3LjIgMjIuNi0xOS42IDQ3LjgtNC44IDUwLjQtNy44IDY2LjYtMTYuNCA4NS40LTMgNy03IDE3LjgtOC44IDI0LTEuOCA2LjQtNSAxNC42LTcuNCAxOC40LTIuMiAzLjgtNy40IDEzLTExLjQgMjAuNC0xNy4yIDMwLjgtNDMuNCA2MS40LTcxLjQgODMuOC0yNS42IDIwLjQtNDYgMzMuMi02NC4yIDQwLjItOC40IDMuMi0xOCA3LjYtMjEuNCA5LjYtNy40IDQuNi0yMi40IDguNi01Ny4yIDE1LTYyLjIgMTEuNi03OS4yIDExLjQtMTM1LjYtMS0zMi40LTctMzguNi05LTUyLTE2LjgtMjEuNC0xMi42LTI0LjItMTQuOC0yNC4yLTE5LjQgMC02LjIgMTAuMi05LjIgMzUtMTAuNCAyMi40LTEgMjguNi0yLjYgNTctMTQuMiAyMy44LTkuOCAyOS40LTEyLjggMzAuNC0xNi44IDIuMi04LjItMy0xMy4yLTI2LjgtMjUuNC0yNS44LTEzLjItMzIuMi0xOC40LTQzLjgtMzUuOC05LTEzLjYtMTAtMjEuMi0zLjYtMzMuNiA1LjQtMTAuOCAzLjYtMTUtMTEuOC0yNS40LTktNi0xNC0xMS42LTIwLjgtMjIuNi0yMy40LTM3LjgtMjUtNTAuOC03LjItNTkuOCA0LjgtMi40IDkuNC01LjQgMTAuMi02LjYgMi44LTQuMi0uNC0xNS42LTguNC0yOS0xMS42LTE5LjYtMTMuMi0yNS44LTEzLjItNTUuMiAwLTI4LjggMi42LTM3LjggMTItNDAuMiA5LTIuMiAxNC44IDEgMzUuNiAyMC4yIDI0LjggMjIuOCA0My42IDM2LjYgNjIuOCA0NS44IDggMy44IDE3LjggOS4yIDIyIDEyIDQuMiAyLjggMTQuOCA3IDIzLjQgOS4yIDguNiAyLjIgMjQuMiA2LjggMzQuOCAxMC4yIDEzLjQgNC40IDIzLjYgNi40IDMzIDYuNiAxMi44LjIgMTQuMi0uMiAxOC42LTUuNCA0LTQuOCA0LjgtNy44IDQuOC0xOS4yIDAtMTQuNCA1LjYtMzkuNiAxMS4yLTUwLjYgNC4yLTguNCAyOS4yLTM0LjIgMzkuOC00MS40IDcuOC01LjQgMzUuNi0xNiA1Mi0yMCAxNC4yLTMuNiAzMi42LTEuMiA1Mi40IDYuOHoiLz48L3N2Zz4=);
            }
            <?php endif;?>

            <?php if (!empty($this->options->footersns) && in_array('ShowGooglePlus', $this->options->footersns)) : ?>
            .footer-sns-gplus {
                background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0OCIgaGVpZ2h0PSI0OCIgY2xhc3M9Imljb24iIHZpZXdCb3g9IjAgMCAxMDI0IDEwMjQiPjxwYXRoIGQ9Ik0xMzguNiA3OGMtMjIuNCA1LjItNTUuOCA0MC4yLTYwLjYgNjMuNC0xLjQgNi40LTIgMTI5LjgtMS42IDM2Ny42LjYgMjk4LjYgMSAzNTguOCAzLjQgMzYzIDExIDIwLjIgMjEuNiAzMi40IDM3LjIgNDMgMTUgMTAuMiAxNy40IDExLjIgMzMgMTMgMTEuMiAxLjQgMTM2IDIgMzY1IDEuNiAzMTQtLjYgMzQ4LjYtMSAzNTUtMy44IDE1LjgtNy4yIDMzLjgtMjIgNDMuMi0zNS40IDUuMi03LjQgMTAuOC0xNi42IDEyLjYtMjAuNCAyLjgtNi40IDMuMi00MC44IDMuOC0zNTQgLjQtMjIzLS4yLTM1My40LTEuNC0zNjUtMi0xNy0yLjYtMTguNi0xMy0zNC04LjYtMTIuNi0xNC4yLTE4LjQtMjUuMi0yNS44LTcuOC01LjQtMTcuNC0xMS0yMS42LTEyLjQtNi0yLjItNzIuOC0yLjYtMzY1LjQtMi42LTE5Ni44LjItMzYxIC44LTM2NC40IDEuOHpNNDMwIDI5NS40YzQwLjYgMTUuNCA1Ni42IDIzLjggNzIuNiAzOC40IDYuOCA2LjIgNy4yIDE1LjIgMSAyMy40LTYuMiA4LTMzLjYgMzMuOC0zOSAzNi42LTUuNiAyLjgtMTcuNiAyLjgtMjMuMi0uMi0yLjQtMS4yLTguMi01LjItMTMtOC44LTExLjItOC42LTI0LjYtMTEuMi01NS4yLTExLjItMjcuNCAwLTQwLjYgMi42LTUyLjIgMTAuNC00LjQgMi44LTEyLjIgNy42LTE3LjIgMTAuNi0yMyAxMy4yLTUxLjQgNTUtNTUuOCA4Mi40LTIuNiAxNS42LTIuNCAzNC44LjIgNTEgMi44IDE3LjQgMTkuOCA0OC44IDM1LjIgNjUuMiAxNiAxNi42IDQ1IDMzLjYgNjIuOCAzNi42IDI2LjggNC40IDY1LjggMS42IDc5LjQtNS44IDIwLjYtMTEuNCAzMS0xOSA0MS0zMC40IDE4LjgtMjEuNiAyMy40LTM0LjIgMTUuNi00My44LTMuOC00LjgtNC40LTQuOC01MS01LjgtNjAuOC0xLjItNTYuMiAyLjItNTYuMi00My4yIDAtMzIuNC4yLTMzLjIgNC44LTM3IDQuNC0zLjYgOS0zLjggOTItMy44IDc5IDAgODcuOC40IDk0LjIgMy42IDExLjIgNS42IDEzIDExLjQgMTIuOCA0My40IDAgMjUuNC0uOCAzMC44LTcuNiA1OC00IDE2LjYtOS44IDM0LTEyLjYgMzktMi44IDUtOC4yIDE0LjItMTEuNiAyMC42LTguNCAxNS40LTI3LjIgMzYuOC00MC44IDQ2LjYtNS44IDQuNC0xMy44IDEwLjItMTcuNiAxMy4yLTMuOCAzLTExIDctMTYuMiA4LjgtNS4yIDEuOC0xNi4yIDYuNC0yNC40IDEwLTIyLjQgOS42LTM0LjggMTEuNi03MyAxMS42LTM3LjYuMi00Ny0xLjQtNzEtMTItOC4yLTMuNi0xNy42LTcuMi0yMC44LTgtMTUuOC0zLjgtNjctNDUuMi03Ny44LTYyLjgtMi4yLTMuOC03LjYtMTEuNi0xMS44LTE3LjItNC4yLTUuNC05LTE0LTEwLjYtMTktMS44LTQuOC02LjItMTYtMTAtMjQuOC0zLjYtOC44LTcuOC0yMi4yLTkuMi0yOS42LTMuMi0xOC44LTEuNC03OS40IDIuOC05MS40IDEzLjgtNDAuNiAzNS42LTc4IDU4LjgtMTAwLjIgMTQtMTMuNiA0Ny4yLTM2LjQgNTgtMzkuOCA0LjItMS40IDEzLjQtNS4yIDIwLjYtOC40IDIyLTEwIDMyLjgtMTEuNiA3Ni0xMSAzMy44LjYgNDAuNCAxLjIgNTAgNC44em0zNDAuOCA4MC44YzggMy42IDkuNiAxMS4yIDkuMiAzOS4yLS42IDM0LjQtLjYgMzQgNSAzOS42IDQuOCA1IDUuNCA1IDM3LjYgNSA0My40IDAgNDQuNC44IDQzLjIgMzYuMi0uOCAxNy0xLjIgMTguNC02LjQgMjMtNS40IDQuNi02LjYgNC44LTM3LjYgNC44LTMxLjIgMC0zMiAuMi0zNi44IDUtNS42IDUuNC01LjYgNC40LTUgNDEuMi40IDI2LjQuMiAyNy40LTQuNiAzMy00LjggNS42LTYgNS44LTI0LjQgNi40LTIwLjguOC0yOS42LTEuNC0zMy40LTguNC0xLjQtMi42LTItMTUuNi0xLjgtMzUuNi40LTMxLjIuNC0zMS42LTQuNi0zNi42cy01LjYtNS0zNi01Yy0xOC44IDAtMzMtLjgtMzYtMi4yLTcuNi0zLjYtOS42LTExLjItOC44LTMzLjguOC0yOC4yLjQtMjggNDEtMjggNDUuNCAwIDQ1LjQgMCA0NC42LTQyLjYtLjYtMzMtLjYtMzMgNS0zOC40IDQuNC00LjYgNi4yLTUgMjQuOC01IDExIDAgMjIuMiAxIDI1IDIuMnoiLz48L3N2Zz4=);
            }
            <?php endif;?>

            <?php if (!empty($this->options->footersns) && in_array('ShowWeibo', $this->options->footersns)) : ?>
            .footer-sns-weibo {
                background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0OCIgaGVpZ2h0PSI0OCIgY2xhc3M9Imljb24iIHZpZXdCb3g9IjAgMCAxMDI0IDEwMjQiPjxwYXRoIGQ9Ik0xMzUuMiA3OWMtOC42IDMtMjIuOCAxMi40LTMyLjggMjEuOC04LjIgNy44LTIyLjIgMzEtMjQuNiA0MC42LTEgNC4yLTEuNiAxNjctMS42IDM2NC42IDAgMjg0LjguNCAzNTguNCAyLjYgMzY0IDEuNCAzLjggNi44IDEzIDEyIDIwLjQgOC44IDEyLjggMjQgMjUuNCA0MS44IDM1IDYgMy40IDI3IDMuNiAzNjcuNCAzLjYgMjg2LjIgMCAzNjIuNi0uNiAzNjktMi42IDE5LjgtNi4yIDUxLjItMzcuNiA1Ny40LTU3LjQgMi02LjQgMi42LTgyLjYgMi42LTM2OFYxNDFsLTQuMi05Yy0xMS42LTI0LTM5LjItNDkuOC01OC4yLTU0LjItNC4yLTEtMTY4LjYtMS42LTM2NS42LTEuNi0zMDAgMC0zNTkuMi40LTM2NS44IDIuOHptNTU4LjYgMTY5YzguNiAxLjIgMTYuNCA0IDI0IDguNiA2LjIgMy42IDE1LjIgOC4yIDIwLjIgMTAuMiA1LjggMi4yIDE0LjYgOC44IDI1IDE4LjggMjUuNCAyNC44IDMyLjggMzQuOCAzNy44IDUxIDIuNiA4IDcuNCAxOS44IDEwLjggMjYuNCA3LjggMTQuNiAxMS42IDQyLjYgOS40IDY5LTEgMTQuMi0yLjIgMTguNi03LjQgMjYuNC0zLjIgNS4yLTkgMTIuMi0xMi44IDE1LjYtMTMuOCAxMi0zNCA1LjgtMzguOC0xMi0xLjYtNi0xLjQtMTEuNCAxLjItMjMuNCA0LjItMjAgMy00Ni0yLjYtNTguNi0yLjItNS04LTEyLjYtMTIuOC0xNi44LTQuOC00LjItMTQuNi0xNi40LTIxLjgtMjYuOC03LjItMTAuNi0xNS4yLTIwLjgtMTgtMjIuOC0yLjgtMi0xMi42LTYtMjItOS0xNC40LTQuNC0yMC44LTUuNC00My01LjYtMjgtLjItMzEuNC0xLjItNDIuNC0xMS42LTcuNC03LTguNi0xNS42LTMuOC0yNS4yIDctMTMuMiAxNi40LTE2IDU0LjItMTYgMTYuNiAwIDM1LjguOCA0Mi44IDEuOHptLTIxMy42IDc1LjZjMjAuMiAxNS40IDIwLjYgMTYuNCAyMiA0OCAuNiAxNSAxLjggMjkgMi42IDMxIDIuOCA2LjIgMTEgNi42IDIxLjYuNiA1LjQtMy4yIDE0LTUuOCAyMC02LjQgNS44LS42IDE4LjgtMi40IDI5LTQuMiAxNy4yLTMgMTkuNC0zIDM2IC40IDMyIDYuNiAzNS44IDkuMiA0NC4yIDMxLjYgNS4yIDE0IDUuNCAyMS40IDEuMiAzMi44LTIuMiA1LjQtMi44IDExLTIgMTUuNCAxLjggMTAgMTcuNiAyMy40IDM1IDMwLjIgMTEuMiA0LjIgMTYuMiA3LjYgMjcgMTkgMTkuMiAxOS44IDIwLjIgMjMgMjAgNTktLjIgMzUtLjQgMzUuNC0xOS44IDYzLjYtMTMuOCAxOS44LTMyLjQgMzguNi00OSA1MC01IDMuNC0xMi4yIDguOC0xNS44IDEyLTMuOCAzLjItMTEuNiA4LTE3LjIgMTAuNC01LjYgMi42LTE0LjYgNy40LTE5LjggMTAuNi01LjIgMy40LTE1LjggNy42LTIzLjggOS40LTggMi0yMS4yIDYuNi0yOS42IDEwLjItMjIuNCAxMC0zNi4yIDExLjItMTIxLjggMTAuNGwtNzUtLjYtMTktOC40Yy0xMC42LTQuNi0yNS40LTkuOC0zMy0xMS42LTcuNi0xLjYtMTgtNS44LTIzLTlzLTE0LjItOC0yMC40LTEwLjhjLTE4LTgtNTkuNC00Ni4yLTY2LTYxLjItMi4yLTUtNy40LTE0LjQtMTEuNC0yMC44bC03LjItMTJWNTQ5bDcuNi0xMy42YzQuMi03LjQgOS40LTE4LjYgMTEuNi0yNC44IDMuOC0xMS40IDEzLjQtMjcuOCAyNC44LTQyLjYgMjAuMi0yNi4yIDM4LjQtNDYuOCA1My02MCA5LjItOC4yIDIxLTE4LjYgMjYtMjMuMiA1LTQuNCAxMy4yLTExIDE4LjYtMTQuNiA1LjItMy40IDkuNC03LjIgOS40LTggMC0xIDUuNi00LjYgMTIuNi04LjIgNi44LTMuOCAxNi40LTkuNiAyMS40LTEzLjIgNS0zLjYgMTQuNC04IDIxLTkuOCA2LjYtMiAxNy44LTYuNiAyNS0xMC4yIDEyLTYuMiAxNC40LTYuOCAzMi40LTYuOGgxOS40bDEyLjQgOS42em0yMDMuNiAxMy4yYzMgMS42IDYuNiA0LjQgOCA2IDEuNiAxLjggOS40IDcgMTcuNCAxMS42IDE3IDkuNiAxOSAxMyAyNCA0MiAzLjQgMjAuNCAyLjYgMzIuMi0zLjQgNDMuOC03LjYgMTUuMi0yMi44IDIwLjYtMzEuMiAxMS4yLTctNy42LTkuMi0xMy44LTEwLjYtMjkuNi0xLjItMTMuMi0yLjQtMTYuNC05LjYtMjcuMi0xMS0xNi0xNi44LTIwLjYtMjcuMi0yMC42LTEwIDAtMjQtNi4yLTI3LTExLjYtNS44LTEwLjguNC0yNC42IDEyLjQtMjguNCA4LjYtMi42IDQwLjItLjggNDcuMiAyLjh6Ii8+PHBhdGggZD0iTTQyNCA0NzcuNGMtMzIuNiAzLjYtNDcuOCA3LTYxLjggMTMuOC04IDQtMTkgOC40LTI0LjIgMTAtNS4yIDEuNi0xMi40IDUtMTYuMiA3LjgtMy44IDIuNi0xMSA3LjYtMTYuMiAxMS0xMy40IDguOC0zNSAzMy4yLTM4LjggNDQtMS44IDUtNS40IDE0LjQtOC4yIDIxLTguOCAyMS4yLTguMiAyNi44IDQgNTMgMTAuNiAyMi42IDExIDIzLjIgMjcuNiAzNi40IDIxIDE2LjggMjMuNiAxOC40IDUwLjggMjguMiAyMC4yIDcuMiAyNC42IDggNTQgMTAgMTcuNiAxLjIgNDUuNiAyLjIgNjIgMi4ybDMwIC4yIDE3LjQtOC40YzkuNi00LjYgMjIuNC05LjYgMjguMi0xMS40IDYtMS44IDE1LjQtNi4yIDIwLjgtMTAgNS40LTMuNiAxMy40LTguNiAxNy42LTEwLjggOS4yLTQuNiAzOS0zNC40IDM5LTM5IDAtMS42IDMuOC0xMC4yIDguNC0xOC44IDcuOC0xNC4yIDguNi0xNi44IDguNC0yOS42LS4yLTEyLjgtMS0xNS44LTEwLjYtMzQuNi0xMy40LTI2LjItMzAuNC00My42LTUwLjItNTEuNC03LjItMi44LTE2LjItNy0yMC05LjYtMTEuNC03LjYtMTcuNi05LjItNDguOC0xMi40LTI3LjYtMi44LTU2LjYtMy40LTczLjItMS42em0zOS40IDQ0LjRjMTEuMiAyLjIgMjIuNiA1IDI1IDYuNCA3IDMuNiAyNiAyMS44IDMwLjggMjkuNCA4LjYgMTMuNCAxMSA1NCA0LjYgNzctMi42IDkuNi0xOC44IDI3LjYtMzkuNCA0NC4yLTE1LjYgMTIuNC0xNyAxMy0yOS44IDE0LTcuNi44LTIyLjQgMi4yLTMzIDMuNi0yMi42IDIuNi00NS42IDEtNTMuOC0zLjgtMy4yLTItOC02LjgtMTAuOC0xMC44LTIuNi00LjItOC40LTEwLjQtMTIuOC0xMy44LTguMi02LjgtMTMuNC0xNi40LTE5LjQtMzctMy44LTEzLjItMi44LTIxLjggNS4yLTQ3LjYgMy4yLTEwLjQgNi0xNC42IDE3LjQtMjUuOCAxMi40LTEyLjIgMjMuOC0yMi4yIDMzLjItMjkuNiA0LTMgMzguNi05LjQgNTMuNC05LjggNSAwIDE4LjIgMS42IDI5LjQgMy42eiIvPjxwYXRoIGQ9Ik0zODcuMiA2MDZjLTEyLjIgMy44LTE4LjIgMTMuNC0xNSAyNC42IDUuOCAyMS4yIDI3LjggMjUuOCA0MC42IDguNiA2LjYtOC44IDcuOC0xNi4yIDQuMi0yNC00LjgtMTAuMi0xNS40LTEzLjQtMjkuOC05LjJ6Ii8+PC9zdmc+);
            }
            <?php endif;?>

            <?php if (!empty($this->options->footersns) && in_array('ShowInstagram', $this->options->footersns)) : ?>
            .footer-sns-instagram {
                background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0OCIgaGVpZ2h0PSI0OCIgY2xhc3M9Imljb24iIHZpZXdCb3g9IjAgMCAxMDI0IDEwMjQiPjxwYXRoIGQ9Ik0xNDAuNiA3OGMtOS44IDIuMi0yOC40IDEzLjgtMzguNiAyNC0xMC42IDEwLjgtMjEuNiAyOC44LTI0LjIgMzkuNC0yLjYgMTEuNC0yLjQgNzE0LjguNCA3MjUuMiA1LjIgMjAuNCAyOSA0Ni4yIDUzLjIgNTcuNiA4LjIgMy44IDE1LjQgMy44IDM3MC42IDMuOCAzNTEuOCAwIDM2Mi44LS4yIDM3MS0zLjggMjEtOS4yIDM4LjgtMjcgNTAtNDkuMmw1LTEwLjItLjQtMzYzLjgtLjYtMzY0LTQuNC04Yy0xMC44LTE5LjYtMTgtMjguMi0zMi42LTM4LjQtOS4yLTYuMi0xOC44LTExLjItMjQuNi0xMi40LTExLjItMi42LTcxNC40LTIuOC03MjQuOC0uMnpNNjYyIDIwMi44YzEyLjYgMi44IDYwLjIgMjIuMiA2OC40IDI4IDQuNCAzIDMwLjIgMzEuNCAzOSA0Mi42IDIuOCAzLjYgOS42IDE5LjQgMTUuMiAzNWwxMCAyOC42LjggMTQ2Yy42IDEwNi40LjQgMTQ5LjItMS40IDE1Ny44LTEuMiA2LjYtNiAyMi4yLTEwLjQgMzQuNi05LjggMjcuOC0yMyA0Ni42LTQ4LjIgNjguOC0yMi4yIDE5LjQtMzYuOCAyNi44LTYxLjQgMzAuOC0xMC40IDEuNi0yMi42IDQtMjcgNS4yLTE1IDMuOC0xNDAuNiA2LjItMjEzLjQgNC0zNy44LTEuMi03My0zLTc4LjYtNC01LjQtMS4yLTE2LjItMi44LTIzLjgtNC0yNi44LTQtNjguOC0zMy42LTg5LjgtNjMuOC0xMC4yLTE0LjgtMTktMzYuMi0yNy42LTY4LjQtMy4yLTEyLTMtMjkyLjQuMi0zMDcuMiA0LjYtMjEuMiAxNi42LTUzIDIzLjYtNjMuMiA0LTUuOCAxNS0xOC40IDI0LjQtMjcuOCAxNC0xNC4yIDIwLjQtMTkgMzUuOC0yNi44IDI3LTEzLjQgNDIuOC0xNyA4NC4yLTE5IDU3LjItMi44IDI2NC40LS42IDI4MCAyLjh6Ii8+PHBhdGggZD0iTTM1NiAyNjIuMmMtMi44IDEtMTEuMiA0LjItMTguNiA3LjItMTIuNCA0LjYtMzUuNCAyMS00Mi44IDMwLjYtNi4yIDgtMjEgNDcuOC0yMi44IDYxLS44IDcuNi0xLjQgNzAuMi0xIDEzOSAuNiAxMDguNiAxLjIgMTI2LjQgNCAxMzUuNCA0LjQgMTMuOCAxOC42IDQ0LjYgMjIuOCA0OS40IDQuNCA0LjggMzAuMiAyNCAzNy42IDI3LjggMTMgNi42IDQ4IDguNCAxNjcuOCA4LjQgMTE1LjIgMCAxNTAuOC0xLjYgMTY2LTcuNCA2LjYtMi40IDMyLjgtMjEuNCAzOS4yLTI4LjIgNy42LTguMiAyMy44LTQ0IDI2LTU3LjYgMS4yLTcuOCAxLjgtNjUgMS40LTE0OWwtLjYtMTM2LjItMTItMjMuOGMtMTEuNC0yMi44LTEyLjYtMjQuNC0yNy0zNS4yLTguMi02LjQtMjAuOC0xNC0yOC0xN2wtMTMtNS42LTE0Ny0uNGMtOTEuMi0uMi0xNDkgLjQtMTUyIDEuNnptMzE1LjYgNDFjMTIuMiA2IDE5LjYgMTQuMiAyMi40IDI0LjggNi40IDI0LTE4LjggNTEuNi00MyA0Ny4yLTkuOC0yLTIzLjYtMTQuOC0zMC4yLTI4LjQtNC42LTkuMi00LjgtMTEuNC0zLTE3LjQgMi42LTcuOCAxNi40LTIyLjQgMjYuNC0yNy42IDkuNC01IDE1LjItNC42IDI3LjQgMS40ek01MzYuOCAzMzhjNSAxIDE4LjYgNyAzMC40IDEzLjQgMjUgMTMuMiA0Ny4yIDMyLjggNjMgNTUuNiA1LjQgNy42IDExLjYgMTYuMiAxMy44IDE5IDUuOCA3LjIgMTQuOCA1NSAxMy40IDcxLTEuNiAxNi42LTEwIDUzLjgtMTMuNiA1OC42LTEuNiAyLjItNy40IDEwLjYtMTMuMiAxOC42LTE2LjQgMjMuNi00OC42IDUyLTYzLjIgNTUuOC00LjYgMS40LTE1LjYgNS42LTI0LjQgOS42LTE1LjggNy4yLTE2LjQgNy40LTQwIDcuMi0yMy4yLS4yLTI0LjQtLjQtMzktNy40LTguMi00LTE5LjItOC4yLTI0LjQtOS40LTE2LjYtNC4yLTQ5LTM0LTY5LjItNjMuNi0xNi4yLTI0LTE5LTM1LTE5LTc0LjQgMC0zMyAzLjgtNTQuOCAxMS4yLTY0LjggMi42LTMuNCA3LjItMTAuNiAxMC40LTE2IDguNC0xNC40IDI0LjQtMzEuOCAzOC40LTQyIDIwLjItMTQuOCA1My44LTMxLjIgNjcuNi0zMyAxNC4yLTIgNDUuNi0xIDU3LjggMS44eiIvPjxwYXRoIGQ9Ik00OTEgMzk4Yy00LjQuOC0xNi40IDYtMjYuNiAxMS40LTE2IDguNC0yMCAxMS42LTMxLjQgMjUuNC03LjYgOS4yLTE0IDE5LjItMTUuNCAyNC0zLjIgMTEuMi0zLjIgNTIgMCA2Mi42IDMuMiAxMSAyNC40IDM2LjQgMzUgNDIgMTQuOCA4IDM3IDE2LjYgNDUuOCAxNy44IDYuMi44IDEyIDAgMjAuNi0zLjIgNi42LTIuMiAxNy44LTYuMiAyNC42LTguNiAxMC44LTMuNiAxNS02LjYgMjcuNC0xOS42IDEyLTEyLjYgMTUtMTcgMTcuMi0yNiAzLjQtMTMuMiAzLjYtNTUuNC4yLTY2LjgtNS0xNy40LTI5LjQtNDAuNC01OC40LTU1LjItOC40LTQuMi0yNy44LTYuMi0zOS0zLjh6Ii8+PC9zdmc+);
            }
            <?php endif;?>

            <?php if (!empty($this->options->footersns) && in_array('ShowTumblr', $this->options->footersns)) : ?>
            .footer-sns-tumblr {
                background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0OCIgaGVpZ2h0PSI0OCIgY2xhc3M9Imljb24iIHZpZXdCb3g9IjAgMCAxMDI0IDEwMjQiPjxwYXRoIGQ9Ik0xMzguNCA3OGMtNi4yIDEuNC0yNi4yIDE0LjItMzYuMiAyMi44LTIuNiAyLjQtOSAxMC44LTE0LjIgMTguOC03LjQgMTEtMTAgMTcuMi0xMSAyNS0uNiA1LjgtMSAxNzAuNi0uNiAzNjYuNC42IDI5Ni44IDEgMzU2LjggMy40IDM2MSAxMSAyMC4yIDIxLjYgMzIuNCAzNy4yIDQzIDE1LjYgMTAuNiAxNy4yIDExLjIgMzQuMiAxMy4yIDExLjQgMS4yIDE0My4yIDEuOCAzNjQuOCAxLjQgMzEzLjgtLjYgMzQ3LjYtMSAzNTQtMy44IDIzLjItMTAuNiA0Mi40LTI5LjIgNTMuNi01MS44bDUuNC0xMSAuNi0zNDdjLjQtMjIzLS4yLTM1My40LTEuNC0zNjUtMi0xNy0yLjYtMTguNi0xMy4yLTM0LjItMTAuNi0xNS44LTIyLjQtMjUuOC00My0zNy00LjItMi40LTY1LjQtMi44LTM2Ni0zLjItMTk4LjYgMC0zNjQgLjQtMzY3LjYgMS40em00MDAuNCAxMzEuOGw1LjIgNC44djQ3LjhjMCAzNS40LjYgNDkuNCAyLjYgNTQuMiA1LjQgMTIuNCA0LjggMTIuNCA2Mi42IDEyLjYgNTcuNi4yIDU3IDAgNjIuMiAxMi4yIDMuMiA4IDMuOCA5My42LjYgMTA1LTEuMiA0LTQuNiA5LjQtNy40IDExLjYtNS4yIDQtNy4yIDQuMi01NiAzLjZMNTU4IDQ2MWwtNiA2LjJjLTkuMiA5LjItMTAuNCAyMi42LTkuNiAxMTMuNi42IDcxLjQgMSA3OC44IDQuMiA4NSA1IDkgMTguOCAyMy44IDI1LjYgMjcuNCA2LjYgMy4yIDQyLjYgNCA1MC44LjggMi44LTEgOS42LTYgMTUtMTEuMiA4LjQtNy44IDEwLjYtOSAxNy4yLTguNCA5LjIuOCAxNC44IDcuNiAxNyAyMSAyLjggMTYuOCAyLjIgNjgtMSA3NS4yLTQgOS42LTI1LjIgMjguOC0zMy40IDMwLjQtMy44LjYtNDEuNC44LTgzLjguNi04My42LS42LTgwLjgtLjItOTQtMTIuNi0zLjgtMy42LTEyLTguMi0xOC0xMC0xOC4yLTYtMjctMTguNi0yOS44LTQzLjYtMS4yLTguNi00LTE5LjItNy40LTI2LjQtNy0xNC44LTctMTYuNi03LjgtMTQ1LjgtLjYtMTA4LjguOC0xMDEuMi0xNy40LTEwMS4yLTUuNCAwLTEyLjItMS4yLTE1LjItMi44LTEwLjQtNS40LTExLjQtMTAtMTEuNC01NS4yIDAtMzUuNi42LTQyIDMuNi00Ni42IDUtNy42IDExLTEzIDIzLjQtMjEgMTEuNi03LjQgMjkuMi0yNC42IDM3LTM2LjQgMi40LTMuOCA3LjgtMTAuMiAxMS44LTEzLjggNi42LTYuNCA3LjItOCA3LjItMTguMiAwLTYuMiAxLjItMTUuOCAyLjgtMjEuMiAxLjYtNS40IDMuNC0xMy44IDQuMi0xOC44IDMuMi0yMS42IDktMjQuMiA1NS40LTIzLjQgMzQuMi40IDM1LjQuNiA0MC40IDUuMnoiLz48L3N2Zz4=);
            }
            <?php endif;?>

            <?php if (!empty($this->options->footersns) && in_array('ShowGithub', $this->options->footersns)) : ?>
            .footer-sns-github {
                background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0OCIgaGVpZ2h0PSI0OCIgY2xhc3M9Imljb24iIHZpZXdCb3g9IjAgMCAxMDI0IDEwMjQiPjxwYXRoIGQ9Ik0xMzguNCA3OGMtNi40IDEuNC0yNi40IDE0LjItMzYgMjIuOC04IDcuMi0yMiAyOS44LTI0LjQgMzkuMi0xLjYgNi40LTIgMTEzLjItMS42IDM2OCAuNiAyOTkuNCAxIDM1OS44IDMuNCAzNjQgMTEgMjAuMiAyMS42IDMyLjQgMzcuMiA0MyAxNS42IDEwLjYgMTcuMiAxMS4yIDM0LjIgMTMuMiAxMC42IDEuMiA2My40IDEuNiAxMjcuNiAxLjRsMTA5LjYtLjYgNi02LjggNi4yLTYuOC0xLjItMjUuMmMtLjgtMTUuOC0uMi0zMy40IDEuNC00Ny4yIDMtMjUuNCAxLjQtMzYuMi02LTQzLjItNS00LjYtNi4yLTQuOC0zMC42LTQuMi0yNy42LjgtMjQgMS42LTY4LjgtMTYtOC42LTMuNC0yMi42LTE4LTI4LjQtMjkuOC0xMS40LTIyLjgtMjctNDUtMzkuMi01NS42LTE0LTEyLjItMTkuOC0yMC44LTE5LjgtMjguNiAwLTExLjYgMTMuNi0xMi42IDMzLjItMi40IDE2LjYgOC44IDIwLjggMTIuNCA0MC44IDM2LjIgMjQuMiAyOC42IDMxIDMzLjYgNTQgMzkuNiAxNS4yIDQgNDIuMiAzIDUxLjQtMS44IDktNC42IDE4LTE1LjIgMjQuNC0yOS4yIDExLjQtMjQuMiA3LjQtMzEuMi0yMC42LTM2LjgtOS44LTItMjkuMi04LTQzLjQtMTMuNC00MC40LTE1LjgtNjQuNi0zNy40LTg1LjQtNzYuMi0xMS42LTIxLjgtMTUuNC0zMy0xOC4yLTUzLjYtNC4yLTMyLjItNC44LTYwLjItMS40LTg0IDMuNC0yMy44IDYuOC0zMi44IDIwLjItNTQgNC02IDguOC0xNS42IDExLTIxLjQgMy44LTEwIDMuOC0xMS42IDEtMzAtNS4yLTM0LjItMy4yLTUyLjQgNy42LTcwLjIgNy4yLTEyLjIgMTUtMTcuMiAyNC4yLTE1LjggMTIuOCAyLjIgNTIgMTcuNCA2Ni44IDI2LjIgMjYgMTUgMjkgMTUuNCA4Mi40IDcuMiAyNC42LTMuOCAzMy44LTQuMiA2MC0zLjIgMTcgLjYgNDEuNCAzIDU0IDUuMiAzOC40IDYuNiA0OS42IDUuMiA3My0xMCA2LjYtNC4yIDE3LjQtOS40IDI0LTExLjYgNi42LTIuMiAxNi01LjggMjEtOC4yIDEzLTYgMjgtNS42IDM1LjYuOCAxMi40IDEwLjQgMTguNiA0MS40IDE0LjQgNzEuNi00LjQgMzAuNi0zIDM5LjQgOC40IDUzLjggMy40IDQuNCAxMS4yIDE5LjIgMTcuNCAzMy4yTDc3NSA0NDN2NzhsLTEwIDI4Yy0xNS4yIDQzLjItMzYuOCA3My4yLTY2LjIgOTIuOC0xMy40IDguOC01NyAyNS40LTc2LjggMjktMjguMiA1LjItMzMuMiAxMi42LTIyIDMyLjIgMTEuMiAxOS40IDEyLjQgMzIuOCAxMS42IDEyOS42bC0uNiA4NS44IDUuNCA0LjZjMy42IDMgOS4yIDUuMiAxNiA2IDUuOC44IDYwLjIgMSAxMjAuNi42IDEwOC40LS42IDExMC4yLS42IDExOS01IDI0LTExLjYgNDAtMjcuNCA1MS42LTUwLjZsNS40LTExIC42LTM0N2MuNC0yMjMtLjItMzUzLjQtMS40LTM2NS0yLTE3LTIuNi0xOC42LTEzLTM0LTEwLjYtMTUuNC0yMi44LTI2LjItNDMuMi0zNy4yLTQuMi0yLjQtNjQuNi0yLjgtMzY2LTMuMi0xOTguNiAwLTM2NCAuNC0zNjcuNiAxLjR6Ii8+PC9zdmc+);
            }
            <?php endif;?>

            <?php if (!empty($this->options->footersns) && in_array('ShowLinkedin', $this->options->footersns)) : ?>
            .footer-sns-linkedin {
                background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0OCIgaGVpZ2h0PSI0OCIgY2xhc3M9Imljb24iIHZpZXdCb3g9IjAgMCAxMDI0IDEwMjQiPjxwYXRoIGQ9Ik0xNDEgNzcuOGMtNy40IDEuOC0xMS4yIDMuOC0yNi44IDE0LjItMTIuNCA4LjQtMjEuNiAxOC44LTMxLjYgMzdMNzcgMTM5bC0uNiAzNTljLS40IDI1NC40LjIgMzYxLjYgMS42IDM2Ny44IDMuNiAxNC40IDIwLjYgMzYuOCAzNS44IDQ3LjYgNy4yIDUgMTYuMiAxMC40IDE5LjYgMTIgNS40IDIuMiA2Ny42IDIuNiAzNzEuMiAyLjJsMzY0LjYtLjYgMTEuOC03YzE1LTkgMzAtMjQgMzktMzlsNy0xMS44LjYtMzYyLjZjLjQtMjk3IDAtMzYzLjgtMi4yLTM3MC0xLjQtNC4yLTYuOC0xNC0xMS44LTIyLTcuNi0xMS40LTEyLjQtMTYuMi0yNC40LTI0LjQtOC40LTUuNi0xOS0xMS0yMy44LTEyLjItOS44LTIuMi03MTUtMi40LTcyNC40LS4yek0yOTIuMiAxOTZjMTYgNS40IDI1LjQgMTEuNiAzNS42IDIzLjQgMjYuNCAzMC42IDI3LjYgNjMuNCAzLjggOTgtNi40IDkuNC0yNS4yIDIzLjItMzguMiAyOC0xMi44IDQuNi00MC4yIDQuMi01MS44LS44LTQzLTE5LjItNjIuOC02NC42LTQ1LTEwMy40IDE4LTM5IDU3LjgtNTcuOCA5NS42LTQ1LjJ6bTQwMyAyMDBjMjAuMiAzLjQgMjYgNS40IDM4LjYgMTIuNiAzMy42IDE5LjIgNDguMiAzOS4yIDYwIDgyLjQgNi44IDI0LjQgOCA1MSA4LjQgMTc1LjIuMiAxMzAuMi40IDEyOC4yLTExLjIgMTMzLjQtMy42IDEuNi0yMC40IDIuNC01My42IDIuNC00NC42IDAtNDktLjQtNTQuOC00LTMuNi0yLjItNy02LTcuNi04LjQtLjYtMi42LTEuNC01Mi44LTEuNi0xMTEuNi0uNi0xMDEuMi0xLTEwNy44LTQuOC0xMjEuNC03LTI0LjYtMTkuNi00MS0zOC4yLTQ5LjgtMTcuMi04LjItNDcuOC00LjgtNjYuOCA3LjQtMTguNiAxMi0zMS40IDMzLTM1LjYgNTgtMS4yIDcuNi0yIDUzLjgtMiAxMTMuNCAwIDEwOS4yIDAgMTA5LTExIDExNC0zLjYgMS42LTIwLjYgMi40LTU0LjggMi40LTQ3IDAtNTAtLjItNTQuOC00LTMtMi40LTYtNy02LjgtMTAuNi0uOC0zLjYtMS4yLTkwLjQtLjYtMTkzbDEtMTg2LjggNS42LTQuOGM1LjYtNC44IDUuOC00LjggNTMuNC00LjggMzEuMiAwIDQ5LjYuOCA1Mi44IDIuMiA2IDIuOCA4LjYgOSAxMC40IDI0LjggMi40IDIzIDExLjggMjUuMiAyOC40IDcgMTEuOC0xMi44IDI5LjYtMjUuMiA0NC40LTMwLjggMjUuMi05LjQgNjQuNC0xMS40IDEwMS4yLTUuMnptLTM3NC40IDRjMTIgNC42IDExLjQtNi40IDExLjQgMjAxIC4yIDE4MC44IDAgMTg5LjYtMy42IDE5My40LTIgMi4yLTUuOCA0LjgtOC40IDUuOC0yLjYgMS4yLTI2LjIgMi01Mi42IDItNTEuOCAwLTU2LjYtMS02MS40LTExLjYtMS42LTMuNC0yLjItNjEuNC0yLjItMTkwLjggMC0xNzAuNC4yLTE4Ni42IDMuNC0xOTEuOCAxLjgtMy4yIDUuMi02LjYgNy40LTcuOCA1LjQtMi42IDk5LjItMi44IDEwNi0uMnoiLz48L3N2Zz4=);
            }
            <?php endif;?>

            <?php if (!empty($this->options->footersns) && in_array('ShowZhihu', $this->options->footersns)) : ?>
            .footer-sns-zhihu {
                background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0OCIgaGVpZ2h0PSI0OCIgY2xhc3M9Imljb24iIHZpZXdCb3g9IjAgMCAxMDI0IDEwMjQiPjxwYXRoIGQ9Ik0xMzYuOCA3OC44Yy04LjYgMi44LTI0IDEyLjQtMzMuNiAyMS04LjYgNy44LTIxLjQgMjcuOC0yNC40IDM3LjgtNC4yIDE0LTQgNzIzLjQgMCA3MzMuNCA4LjYgMjAuNiAzNi44IDQ4LjYgNTYgNTUuNiA5IDMuNCA3NDcuNCAzLjQgNzU2LjQgMCAxOS44LTcuMiA0OS0zNi42IDU2LTU2LjIgMi4yLTYgMi42LTc1LjYgMi44LTM2Ni40IDAtMjMzLjgtLjYtMzYxLjQtMi0zNjYtMS4yLTMuOC02LjYtMTMuOC0xMi4yLTIyLjItOC4yLTEyLjItMTMuNC0xNy40LTI1LjgtMjUuNi04LjQtNS44LTE5LTExLjQtMjMuMi0xMi4yLTQuNi0xLjItMTYzLjItMS44LTM3NC44LTEuOC0yOTMgMC0zNjguNi42LTM3NS4yIDIuNnptMTkwIDE0NS42YzUuNCA3LjYgNCAxNy40LTQuOCAzMS42LTkuOCAxNi0xMC44IDI3LjQtMyAzNSAyLjYgMi44IDYuNCA1IDguNCA1czM3LjguNCA3OS42LjZjNjggLjQgNzYuNi44IDgyLjQgMy44IDkuMiA1IDEyLjYgMTEgMTIuNiAyMiAwIDctMS4yIDEwLjgtNC44IDE1bC00LjggNS40LTM4IC4yYy01My44IDAtNTMuOCAwLTU1LjQgNTEuMi0uNiAxOC0xLjYgNDIuOC0yLjIgNTUtMS4yIDIyLjguNiAzMS42IDcuNiAzNi4yIDEuNC44IDIyLjIgMiA0NiAyLjZsNDMuMiAxIDguOCA2YzE1LjQgMTAuOCAxNy44IDI5LjIgNSAzNy01LjggMy42LTEwLjIgNC01MS44IDQtMzEgMC00NyAuOC01MC42IDIuNC03IDMuMi0xNC4yIDE3LjYtMTcuMiAzNC40LTMuMiAxNi42LTEgMjEuOCA5LjYgMjUuMiAxMy40IDQuMiAyMS44IDExLjIgNDkgNDEuNCAzNSAzOC44IDM2LjYgNDEgNDEuOCA1OC44IDcgMjMuOCAyLjIgNDEuOC0xMS40IDQxLjgtNy42IDAtMTItMy0yMS0xNC42LTEzLjgtMTcuNC01NC40LTY1LjgtNjItNzMuOC0xNS4yLTE2LTI5LjQtNS44LTM4LjggMjcuNC0xLjggNi42LTguOCAyMy4yLTE1LjYgMzctMTAuOCAyMi0xNCAyNi44LTI3LjQgMzkuNi0xOS42IDE5LjItMjYuNCAyMy01My42IDI5LjYtMjcuMiA2LjQtMzcgNS42LTM4LTMuNi0xLTguNCA0LjQtMTYuNCAyMC0yOSAxNi0xMyAzNi44LTM2LjYgNDUuMi01MS40IDMtNS4yIDguMi0xMy44IDExLjYtMTkgMy40LTUgMTEuOC0yMC40IDE4LjYtMzQuMiAxMC0yMCAxMy42LTI5LjQgMTcuMi00NyAyLjYtMTIuMiA2LjItMjUuNCA3LjgtMjkuNCA0LTkuNCA0LTIxLjQuMi0yNy01LjItNy40LTE2LTguOC02Mi42LTguNC01MC40LjQtNTUuMi0uOC01Ny42LTEzLjItMS44LTEwLjQgNS44LTI0LjQgMTYuMi0yOS44IDcuNC0zLjggMTEuOC00LjIgNTYuMi00LjhsNDguNC0uOCA0LjYtNWM0LjgtNSA0LjgtNSA1LTYxLjYgMC0zNS4yLS44LTU5LjItMi02My4yLTMuOC0xMS4yLTExLTE0LjgtMzAuMi0xNC44cy0yMS40IDEuNC0zMS4yIDE4LjJjLTguMiAxNC40LTIwLjYgMjguOC0zMy4yIDM4LjgtMTMuMiAxMC40LTIxLjYgMTMtMjggOS04LjQtNS42LTUuMi0yMy4yIDguMi00My4yIDQtNi40IDkuMi0xOC42IDEyLjItMjkuNiAzLTEwLjIgNy40LTIzLjIgMTAtMjkgMi40LTUuNiA2LTE2LjggOC0yNC42IDUuNi0yMy42IDI0LTUwLjggMzkuNC01OC40IDExLjItNS40IDE4LjYtNS40IDIyLjQuMnptNDUyIDY4LjJjMTEuOCA3LjggMTEuNC0uOCAxMC44IDIxNi0uNiAxODEtLjggMTk4LjgtNCAyMDMtNy42IDEwLjgtOS44IDExLjQtNTMuNiAxMi40bC00MSAxLTE0IDcuOGMtNy42IDQuMi0yMS4yIDEzLTI5LjggMTkuNC0yNS44IDE5LjItMzUgMTkuOC00My40IDMuMi0xMS44LTIzLjItMjMuNi0zMy4yLTM5LjQtMzMuNC04LjggMC0xMy42LTIuOC0xNy4yLTkuOC0yLjYtNC44LTMtMzMuOC0yLjYtMjA4LjguNC0xOTkuOC40LTIwMyA0LjQtMjA3LjQgMi4yLTIuNCA1LjgtNS4yIDgtNi4yIDIuMi0uOCA1MS44LTEuNCAxMTAtMS4yIDk5IC40IDEwNi42LjYgMTExLjggNHoiLz48cGF0aCBkPSJNNjA2LjggMzM3LjRjLTIuNC40LTYuNCAzLTkgNS44bC00LjggNS4yLS42IDE1Ni40LS40IDE1Ni40IDYuNCA5LjRjMy42IDUuMiA5LjggMTUuMiAxMy42IDIxLjggOCAxNC4yIDE2LjggMjAuNiAyNS42IDE4LjYgMy4yLS42IDEzLjgtNyAyMy42LTE0LjIgMjMtMTcgMjcuOC0xOSA1MC4yLTIwLjIgMTYuNC0xIDE5LjItMS44IDIzLjYtNi4yIDIuOC0yLjggNS02LjQgNS4yLTguMlY1MDUuNmMwLTExNi0uNi0xNTQuNC0yLjYtMTU4LjYtNC44LTEwLjQtOC40LTExLTcwLTEwLjgtMzEuMi4yLTU4LjYuOC02MC44IDEuMnoiLz48L3N2Zz4=);
            }
            <?php endif;?>

            <?php if (!empty($this->options->footersns) && in_array('ShowBilibili', $this->options->footersns)) : ?>
            .footer-sns-bilibili {
                background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0OCIgaGVpZ2h0PSI0OCIgY2xhc3M9Imljb24iIHZpZXdCb3g9IjAgMCAxMDI0IDEwMjQiPjxwYXRoIGQ9Ik0xMzguOCA3Ny44Yy03LjggMi0zMiAxNy44LTM4LjggMjUuNi05LjYgMTAuNi0xOC40IDI1LTIxLjIgMzQtNC4yIDE0LjItNC4yIDcyMy42IDAgNzMzLjYgOC40IDIwLjIgMjkuNCA0MS42IDUzLjIgNTQuMiA2LjggMy42IDE4LjggMy44IDM3MCAzLjhoMzYzbDktNC4yYzE0LTYuOCAzMS42LTIyLjQgNDIuNi0zOCA5LjQtMTMuOCAxMC0xNS4yIDExLjYtMzIuNiAxLjItMTAuNCAxLjYtMTY2LjggMS40LTM2NS42LS42LTMxNy44LS44LTM0OC4yLTMuOC0zNTQuNi05LjItMTkuMi0yMC44LTMzLTM4LjYtNDVsLTE3LjYtMTItMzYyLjQtLjRjLTE5OS4yIDAtMzY1IC40LTM2OC40IDEuMnpNMzcxLjIgMjUxYzQuMiAxLjYgMjIuNiAxOC4yIDQ0LjYgMzkuOCAyOS44IDI5LjIgMzkgMzcuMiA0NS40IDM5IDEwLjYgMyA3My4yIDIuOCA4My4yLS4yIDYtMS44IDE1LjgtMTAuNCA0My40LTM3LjggMTkuOC0xOS42IDM5LjQtMzcuNCA0NC0zOS42IDE1LjItNy44IDMxLjYtNCA0MSA5LjQgMTAuNCAxNS4yIDguOCAyOC02IDQ0LjYtMTUgMTYuOC0xMSAyNC40IDE0LjIgMjYuOCAxOC44IDEuNiAyNS4yIDMuOCA0My44IDE0LjggMTkuMiAxMS4yIDI4IDIxIDQwLjYgNDQuOEw3NzUgNDExdjI1MGwtOS44IDE5LjZjLTEwLjQgMjAuNi0yMy44IDM1LjYtNDMgNDcuNi0xOC44IDEyLTE4LjYgMTItMjI2LjIgMTEuNGwtMTg5LS42LTExLjgtNC44Yy02LjQtMi42LTE4LjYtMTAuMi0yNi44LTE3LTE2LTEyLjgtMjUuNi0yNi40LTM1LTQ5LjItNC40LTExLTQuNC0xMS40LTQuNC0xMzIuMlY0MTQuNmwxMC40LTIxYzguNC0xNi44IDEzLTIzLjQgMjIuNi0zMi4yIDE3LjItMTYgMzkuMi0yNi40IDU5LjItMjguNCAyNy4yLTIuNCAzMS4yLTkuMiAxNS44LTI3LjItNS01LjgtOS42LTEzLjQtMTAuMi0xNy4yLTUuMi0yNy40IDE5LjQtNDguMiA0NC40LTM3LjZ6Ii8+PHBhdGggZD0iTTMzMC4yIDQwMC40Yy05IDEuNi0xNSA1LjQtMjMgMTUtMTEuNCAxMy40LTExLjIgMTItMTEuMiAxMjAuNnMtLjIgMTA1LjYgMTEuMiAxMjIuNEMzMTggNjczLjggMzA3IDY3MyA0OTIgNjczLjZjOTAuOC40IDE3MC42IDAgMTc3LjQtLjYgMTUuNi0xLjYgMjMuNi02LjggMzIuMi0yMWw2LjQtMTAuOFY1MzcuOGMwLTY4LS44LTEwNS40LTIuMi0xMDkuMi0zLTgtMTUuMi0yMi4yLTIyLjItMjUuOC01LjItMi42LTI2LjYtMy4yLTE3NS42LTMuNC05My40LS4yLTE3My40LjItMTc3LjggMXptNzguNCA3MC40YzkuNiA0IDIyLjggMTcuOCAyNS4yIDI2LjYgMi44IDkuOCAyLjggMzMuNCAwIDQzLjItMi40IDguNi0xMS44IDIwLjItMjAgMjQuNi04IDQtMjMuNiAzLjYtMzEtMS0zLjYtMi4yLTguNC04LTExLTEzLjYtNC4yLTguNC00LjgtMTIuNC00LjgtMzEuOCAwLTIxIC4yLTIyLjYgNi0zMS44IDQtNi40IDktMTEuMiAxNC44LTE0LjQgMTAuMi01LjQgMTIuMi01LjYgMjAuOC0xLjh6bTIwNiAwYzIwIDguMiAyOS4yIDM2LjQgMjIuMiA2Ny40LTIuOCAxMi00LjggMTYuMi0xMC44IDIyLjItNyA3LTguNCA3LjYtMTguOCA3LjYtMTkgMC0zMC42LTkuMi0zNi40LTI5LjItMy42LTEyLjQtMi40LTM3LjggMi4yLTQ2LjggNS05LjYgMjQtMjQgMzEuNi0yNCAyIDAgNi40IDEuMiAxMCAyLjh6Ii8+PC9zdmc+);
            }
            <?php endif;?>

            <?php if (!empty($this->options->footersns) && in_array('ShowTelegram', $this->options->footersns)) : ?>
            .footer-sns-telegram {
                background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0OCIgaGVpZ2h0PSI0OCIgY2xhc3M9Imljb24iIHZpZXdCb3g9IjAgMCAxMDI0IDEwMjQiPjxwYXRoIGQ9Ik0xMjMuNCA4MC4yYy0xMC42IDUuNi0zOS4yIDM1LTQzLjYgNDQuOC0zLjYgNy42LTMuOCAyMy42LTMuOCAzNzcuNiAwIDMyNy4yLjQgMzcwLjQgMyAzNzYuOCAzLjYgOC40IDM1IDQwLjQgNDUuMiA0NS44IDYuNiAzLjYgMTkuOCAzLjggMzc3LjggMy44aDM3MWw5LjQtNS42YzEyLjItNyAzNC0yOC44IDQxLTQxbDUuNi05LjRWNTAyYzAtMzU5LjItLjItMzcxLjItMy44LTM3OC01LjItOS44LTM3LjgtNDEuNi00Ni4yLTQ1LjItNi0yLjQtNTguMi0yLjgtMzc3LjQtMi44LTM2Ny40LjItMzcwLjYuMi0zNzguMiA0LjJ6bTY3NSAxNjQuNmMyIDIuMiA0LjIgNy40IDUgMTEuMiAxLjggOS4yLTMuNCA0NC0xMy4yIDkwLTQuNCAyMC40LTkuNCA0OC40LTExLjIgNjIuMi0yLjIgMTguMi01LjIgMzEuOC0xMSA0OC01LjQgMTYtOC40IDI4LjgtOS44IDQzLjItMS40IDEzLjgtNC42IDI3LjgtMTAgNDRzLTguOCAzMS42LTExIDQ4LjZjLTEuNiAxMy44LTYuOCA0Mi0xMS4yIDYyLjYtNC40IDIwLjgtOS40IDQ4LjgtMTEgNjIuNi0zLjIgMjYuOC01LjYgMzMuNi0xNSA0MS42LTEyLjYgMTAuNi0yMC40IDkuNi0zOC40LTQuOC03LTUuNi0xOC40LTE0LTI1LjYtMTktMzAuNC0yMC44LTU0LjQtMzguNC03MC4yLTUxLjQtMTMuMi0xMC44LTM2LjItMjMuNi00Mi40LTIzLjYtOSAwLTI2LjYgMTEuNi01NCAzNS40LTM4IDMzLjItNDcuMiAzNy40LTU5LjQgMjcuNC04LjQtNy4yLTExLjItMTMuMi0xNS44LTM0LjYtMi42LTExLjQtNi44LTIzLTExLTMwLjgtNC42LTgtOC4yLTE4LjQtMTAuMi0yOC40LTEuNi04LjgtNi0yMi40LTkuOC0zMC4yLTMuOC03LjgtNy40LTE3LjQtOC4yLTIxLTIuOC0xNC42LTcuNC0yNS40LTEyLjYtMzAuNC03LjYtNy4yLTMyLjItMTguMi01Mi40LTIzLjQtOS40LTIuNC0yMi40LTcuNC0yOC44LTExLjItNi40LTMuOC0xNi44LTguMi0yMy05LjYtMTQuMi0zLjQtMjIuOC03LjYtMjcuOC0xNC4yLTEwLjYtMTMuNi02LjQtMjcgMTAtMzIgNS42LTEuNiAxNC40LTUuNiAxOS40LTguOCA1LTMuMiAxNS44LTcuOCAyNC05LjggOC0yLjIgMTctNS44IDIwLTggOS02LjYgMTctMTAgMzMuNi0xNC4yIDguOC0yLjIgMjIuNC02LjggMzAtMTAuMiA3LjgtMy4yIDIxLjItNy44IDI5LjgtMTAuMiA4LjgtMi4yIDIxLjYtNy42IDI4LjgtMTEuOCA3LjItNC4yIDE4LTguNiAyNC0xMCA2LTEuNCAxNi01LjYgMjItOS4yIDYtMy42IDE4LjYtOC44IDI4LTExLjQgOS40LTIuOCAyNC4yLTcuOCAzMy0xMS40IDguOC0zLjYgMjIuOC04LjIgMzEtMTAuMiA4LjItMi4yIDIwLTcgMjYtMTAuNiA2LTMuOCAxNi44LTguNCAyNC0xMC4yIDcuMi0yIDE4LTYuNiAyNC0xMC4yIDYtMy44IDE5LTkgMjguOC0xMS44IDkuOC0yLjggMjQtNy44IDMxLjgtMTEgNy42LTMuNCAyMS4yLTggMzAuMi0xMC4yIDktMi4yIDIxLjItNy4yIDI3LjQtMTEgNi4yLTQgMTcuNi04LjggMjUtMTAuOCA3LjYtMiAxNi42LTQuNiAxOS44LTUuNiA3LjYtMi42IDEzLTEuMiAxNy40IDQuNHoiLz48cGF0aCBkPSJNNjQ1LjYgMzYwLjhjLTIzLjQgMTIuNi0zMyAxOC4yLTM3LjYgMjIuNC0yLjggMi42LTExIDgtMTguNCAxMi4yLTMzLjYgMTkuMi02My40IDM3LjgtODMuNiA1Mi4yLTYgNC40LTE2IDEwLjQtMjIgMTMuNHMtMTMuNiA3LjYtMTcgMTBjLTMuMiAyLjYtMTEuMiA3LTE3LjYgMTAtNi4yIDMtMTQgNy40LTE3IDEwLTMgMi42LTExIDcuOC0xNy42IDExLjgtMTEuNCA2LjYtMjMgMTguNC0yOC40IDI4LjYtMy42IDYuNi0yLjggMTkuMiAxLjYgMzAuNiAyLjIgNS42IDYuOCAyMyAxMCAzOC42IDYuOCAzMS44IDkuNiAzOCAxNy40IDM3IDgtMSAxMi4yLTguNiAxOC40LTM0LjIgMy42LTE0LjggNy44LTI2LjQgMTEtMzEuMiA3LjYtMTAuOCA3Ny03Ny40IDExOC4yLTExMy4yIDEwLTguNiAyNy42LTI0LjYgMzkuNC0zNS42IDExLjgtMTEgMjQuNi0yMiAyOC40LTI0LjZDNjM5LjQgMzkzIDY2MCAzNjcgNjYwIDM2MmMwLTUuOC01LTYuMi0xNC40LTEuMnoiLz48L3N2Zz4=);
            }
            <?php endif;?>
        </style>

       <?php if ($this->options->RobotoSource == '0'): ?>
            <link href='https://fonts.lug.ustc.edu.cn/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
            <link href="https://fonts.proxy.ustclug.org/icon?family=Material+Icons" rel="stylesheet">
        <?php elseif ($this->options->RobotoSource == '1'): ?>
            <link href='https://fonts.css.network/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
            <link href="https://fonts.css.network/icon?family=Material+Icons" rel="stylesheet">
        <?php elseif ($this->options->RobotoSource == '2'): ?>
           <style>
               <?php if (!empty($this->options->CDNURL)): ?>
                   @font-face {
                       font-family: Roboto;
                       src: url('<?php $this->options->CDNURL()?>/MaterialCDN/fonts/Roboto.ttf');
                   }
                   @font-face {
                       font-family: Roboto;
                       font-weight: 700;
                       src: url('<?php $this->options->CDNURL()?>/MaterialCDN/fonts/Roboto-700.ttf');
                   }
               <?php else: ?>
                   @font-face {
                       font-family: Roboto;
                       src: url('<?php $this->options->themeUrl('fonts/Roboto.ttf'); ?>');
                   }
                   @font-face {
                       font-family: Roboto;
                       font-weight: 700;
                       src: url('<?php $this->options->themeUrl('fonts/Roboto-700.ttf'); ?>');
                   }
               <?php endif; ?>
           </style>
       <?php elseif ($this->options->RobotoSource == '3'): ?>
       <?php endif; ?>

        <!-- Config CSS -->

        <!-- Other Styles -->
        <style>
        body, html {
            font-family: <?php $this->options->CustomFonts() ?>;
        }

        a {
            color: <?php $this->options->alinkcolor(); ?>;
        }

        .mdl-card__media,
        #search-label,
        #search-form-label:after,
        #scheme-Paradox .hot_tags-count,
        #scheme-Paradox .sidebar_archives-count,
        #scheme-Paradox .sidebar-colored .sidebar-header,
        #scheme-Paradox .sidebar-colored .sidebar-badge{
            background-color: <?php $this->options->ThemeColor() ?> !important;
        }

        /* Sidebar User Drop Down Menu Text Color */
        #scheme-Paradox .sidebar-colored .sidebar-nav>.dropdown>.dropdown-menu>li>a:hover,
        #scheme-Paradox .sidebar-colored .sidebar-nav>.dropdown>.dropdown-menu>li>a:focus {
            color: <?php $this->options->ThemeColor() ?> !important;
        }

        #post_entry-right-info,
        .sidebar-colored .sidebar-nav li:hover > a,
        .sidebar-colored .sidebar-nav li:hover > a i,
        .sidebar-colored .sidebar-nav li > a:hover,
        .sidebar-colored .sidebar-nav li > a:hover i,
        .sidebar-colored .sidebar-nav li > a:focus i,
        .sidebar-colored .sidebar-nav > .open > a,
        .sidebar-colored .sidebar-nav > .open > a:hover,
        .sidebar-colored .sidebar-nav > .open > a:focus,
        #ds-reset #ds-ctx .ds-ctx-entry .ds-ctx-head a {
            color: <?php $this->options->ThemeColor() ?> !important;
        }

        .toTop {
            background: <?php $this->options->ButtonThemeColor() ?> !important;
        }

        .material-layout .material-post .material-nav,
        .material-layout .material-index .material-nav,
        .material-nav a {
            color: <?php $this->options->ButtonThemeColor() ?>;
        }

        #scheme-Paradox .MD-burger-layer {
            background-color: <?php $this->options->ButtonThemeColor() ?>;
        }

        #scheme-Paradox #post-toc-trigger-btn {
            color: <?php $this->options->ButtonThemeColor() ?>;
        }

        .post-toc a:hover {
            color: <?php $this->options->alinkcolor(); ?>;
            text-decoration: underline;
        }

</style>


        <!-- Theme Background Related-->
        <?php if ($this->options->BGtype =='0') : ?>
            <style>
                body{
                    <?php if (!empty($this->options->bgcolor)): ?>
                        background-color: <?php $this->options->bgcolor() ?>;
                    <?php else: ?>
                        background-color: #F5F5F5;
                    <?php endif; ?>
                }
                .demo-blog .something-else .mdl-card__supporting-text{
                    background-color: #fff;
                }
                .MD-burger-layer{
                    background-color: #666;
                }
                .demo-blog .demo-blog__posts>.demo-nav,
                .demo-nav a,
                .demo-blog--blogpost .demo-back{
                    color: #666;
                }
            </style>
        <?php elseif ($this->options->BGtype == '2'): ?>
            <style>
            body{
                <?php if ($this->options->GradientType == '0'): ?>
                    background-image:
                        -moz-radial-gradient(0% 100%, ellipse cover, #96DEDA 10%,rgba(255,255,227,0) 40%),
                        -moz-linear-gradient(-45deg,  #1fddff 0%,#FFEDBC 100%)
                        ;
                    background-image:
                        -o-radial-gradient(0% 100%, ellipse cover, #96DEDA 10%,rgba(255,255,227,0) 40%),
                        -o-linear-gradient(-45deg,  #1fddff 0%,#FFEDBC 100%)
                        ;
                    background-image:
                        -ms-radial-gradient(0% 100%, ellipse cover, #96DEDA 10%,rgba(255,255,227,0) 40%),
                        -ms-linear-gradient(-45deg,  #1fddff 0%,#FFEDBC 100%)
                        ;
                    background-image:
                        -webkit-radial-gradient(0% 100%, ellipse cover, #96DEDA    10%,rgba(255,255,227,0) 40%),
                        -webkit-linear-gradient(-45deg,  #1fddff 0%,#FFEDBC 100%)
                        ;
                <?php elseif ($this->options->GradientType == '1'): ?>
                    background-image:
                        -moz-radial-gradient(-20% 140%, ellipse ,  rgba(255,144,187,.6) 30%,rgba(255,255,227,0) 50%),
                        -moz-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%),
                        -moz-radial-gradient(60% 40%,ellipse,   #d9e3e5 10%,rgba(44,70,76,.0) 60%),
                        -moz-linear-gradient(-45deg,  rgba(18,101,101,.8) -10%,#d9e3e5 80% )
                        ;
                    background-image:
                        -o-radial-gradient(-20% 140%, ellipse ,  rgba(255,144,187,.6) 30%,rgba(255,255,227,0) 50%),
                        -o-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%),
                        -o-radial-gradient(60% 40%,ellipse,   #d9e3e5 10%,rgba(44,70,76,.0) 60%),
                        -o-linear-gradient(-45deg,  rgba(18,101,101,.8) -10%,#d9e3e5 80% )
                        ;
                    background-image:
                        -ms-radial-gradient(-20% 140%, ellipse ,  rgba(255,144,187,.6) 30%,rgba(255,255,227,0) 50%),
                        -ms-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%),
                        -ms-radial-gradient(60% 40%,ellipse,   #d9e3e5 10%,rgba(44,70,76,.0) 60%),
                        -ms-linear-gradient(-45deg,  rgba(18,101,101,.8) -10%,#d9e3e5 80% )
                        ;
                    background-image:
                        -webkit-radial-gradient(-20% 140%, ellipse ,  rgba(255,144,187,.6) 30%,rgba(255,255,227,0) 50%),
                        -webkit-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%),
                        -webkit-radial-gradient(60% 40%,ellipse,   #d9e3e5 10%,rgba(44,70,76,.0) 60%),
                        -webkit-linear-gradient(-45deg,  rgba(18,101,101,.8) -10%,#d9e3e5 80% )
                        ;
                <?php elseif ($this->options->GradientType == '2'): ?>
                    background-image:
                        -moz-radial-gradient(-20% 140%, ellipse ,  rgba(235,167,171,.6) 30%,rgba(255,255,227,0) 50%),
                        -moz-radial-gradient(60% 40%,ellipse,   #d9e3e5 10%,rgba(44,70,76,.0) 60%),
                        -moz-linear-gradient(-45deg,  rgba(62,70,92,.8) -10%,rgba(220,230,200,.8) 80% )
                        ;
                    background-image:
                        -o-radial-gradient(-20% 140%, ellipse ,  rgba(235,167,171,.6) 30%,rgba(255,255,227,0) 50%),
                        -o-radial-gradient(60% 40%,ellipse,   #d9e3e5 10%,rgba(44,70,76,.0) 60%),
                        -o-linear-gradient(-45deg,  rgba(62,70,92,.8) -10%,rgba(220,230,200,.8) 80% )
                        ;
                    background-image:
                        -ms-radial-gradient(-20% 140%, ellipse ,  rgba(235,167,171,.6) 30%,rgba(255,255,227,0) 50%),
                        -ms-radial-gradient(60% 40%,ellipse,   #d9e3e5 10%,rgba(44,70,76,.0) 60%),
                        -ms-linear-gradient(-45deg,  rgba(62,70,92,.8) -10%,rgba(220,230,200,.8) 80% )
                        ;
                    background-image:
                        -webkit-radial-gradient(-20% 140%, ellipse ,  rgba(235,167,171,.6) 30%,rgba(255,255,227,0) 50%),
                        -webkit-radial-gradient(60% 40%,ellipse,   #d9e3e5 10%,rgba(44,70,76,.0) 60%),
                        -webkit-linear-gradient(-45deg,  rgba(62,70,92,.8) -10%,rgba(220,230,200,.8) 80% )
                        ;
                <?php elseif ($this->options->GradientType =='3'): ?>
                    background-image:
                        -moz-radial-gradient(-20% 140%, ellipse ,  rgba(143,192,193,.6) 30%,rgba(255,255,227,0) 50%),
                        -moz-radial-gradient(60% 40%,ellipse,   #d9e3e5 10%,rgba(44,70,76,.0) 60%),
                        -moz-linear-gradient(-45deg,  rgba(143,181,158,.8) -10%,rgba(213,232,211,.8) 80% )
                    ;
                    background-image:
                        -o-radial-gradient(-20% 140%, ellipse ,  rgba(143,192,193,.6) 30%,rgba(255,255,227,0) 50%),
                        -o-radial-gradient(60% 40%,ellipse,   #d9e3e5 10%,rgba(44,70,76,.0) 60%),
                        -o-linear-gradient(-45deg,  rgba(143,181,158,.8) -10%,rgba(213,232,211,.8) 80% )
                    ;
                    background-image:
                        -ms-radial-gradient(-20% 140%, ellipse ,  rgba(143,192,193,.6) 30%,rgba(255,255,227,0) 50%),
                        -ms-radial-gradient(60% 40%,ellipse,   #d9e3e5 10%,rgba(44,70,76,.0) 60%),
                        -ms-linear-gradient(-45deg,  rgba(143,181,158,.8) -10%,rgba(213,232,211,.8) 80% )
                    ;
                    background-image:
                        -webkit-radial-gradient(-20% 140%, ellipse ,  rgba(143,192,193,.6) 30%,rgba(255,255,227,0) 50%),
                        -webkit-radial-gradient(60% 40%,ellipse,   #d9e3e5 10%,rgba(44,70,76,.0) 60%),
                        -webkit-linear-gradient(-45deg,  rgba(143,181,158,.8) -10%,rgba(213,232,211,.8) 80% )
                        ;
                <?php elseif ($this->options->GradientType =='4'): ?>
                    background-image:
                        -moz-radial-gradient(-20% 140%, ellipse ,  rgba(214,195,224,.6) 30%,rgba(255,255,227,0) 50%),
                        -moz-radial-gradient(60% 40%,ellipse,   #d9e3e5 10%,rgba(44,70,76,.0) 60%),
                        -moz-linear-gradient(-45deg, rgba(97,102,158,.8) -10%,rgba(237,187,204,.8) 80% )
                        ;
                    background-image:
                        -o-radial-gradient(-20% 140%, ellipse ,  rgba(214,195,224,.6) 30%,rgba(255,255,227,0) 50%),
                        -o-radial-gradient(60% 40%,ellipse,   #d9e3e5 10%,rgba(44,70,76,.0) 60%),
                        -o-linear-gradient(-45deg, rgba(97,102,158,.8) -10%,rgba(237,187,204,.8) 80% )
                        ;
                    background-image:
                        -ms-radial-gradient(-20% 140%, ellipse ,  rgba(214,195,224,.6) 30%,rgba(255,255,227,0) 50%),
                        -ms-radial-gradient(60% 40%,ellipse,   #d9e3e5 10%,rgba(44,70,76,.0) 60%),
                        -ms-linear-gradient(-45deg, rgba(97,102,158,.8) -10%,rgba(237,187,204,.8) 80% )
                        ;
                    background-image:
                        -webkit-radial-gradient(-20% 140%, ellipse ,  rgba(214,195,224,.6) 30%,rgba(255,255,227,0) 50%),
                        -webkit-radial-gradient(60% 40%,ellipse,   #d9e3e5 10%,rgba(44,70,76,.0) 60%),
                        -webkit-linear-gradient(-45deg, rgba(97,102,158,.8) -10%,rgba(237,187,204,.8) 80% )
                        ;
                <?php elseif ($this->options->GradientType =='5'): ?>
                    background-image: #DAD299; /* fallback for old browsers */
                    background-image: -webkit-linear-gradient(to left, #DAD299 , #B0DAB9); /* Chrome 10-25, Safari 5.1-6 */
                    background-image: linear-gradient(to left, #DAD299 , #B0DAB9); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                <?php elseif ($this->options->GradientType =='6'): ?>
                    background-image: linear-gradient(-20deg, #d0b782 20%, #a0cecf 80%);
                <?php elseif ($this->options->GradientType =='7'): ?>
                    background: #F1F2B5; /* fallback for old browsers */
                    background: -webkit-linear-gradient(to left, #F1F2B5 , #135058); /* Chrome 10-25, Safari 5.1-6 */
                    background: linear-gradient(to left, #F1F2B5 , #135058); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ *
                <?php elseif ($this->options->GradientType =='8'): ?>
                    background: #02AAB0; /* fallback for old browsers */
                    background: -webkit-linear-gradient(to left, #02AAB0 , #00CDAC); /* Chrome 10-25, Safari 5.1-6 */
                    background: linear-gradient(to left, #02AAB0 , #00CDAC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                <?php elseif ($this->options->GradientType =='9'): ?>
                    background: #C9FFBF; /* fallback for old browsers */
                    background: -webkit-linear-gradient(to left, #C9FFBF , #FFAFBD); /* Chrome 10-25, Safari 5.1-6 */
                    background: linear-gradient(to left, #C9FFBF , #FFAFBD); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                <?php endif; ?>
            }
            </style>
        <?php elseif ($this->options->BGtype == '1'): ?>
            <style>
                body{
                    <?php if (!empty($this->options->bgcolor)): ?>
                        background-image: url(<?php $this->options->bgcolor() ?>);
                    <?php else: ?>
                        <?php if (!empty($this->options->CDNURL)): ?>
                            background-image: url(<?php $this->options->CDNURL() ?>/MaterialCDN/img/bg.png);
                        <?php else: ?>
                            background-image: url(<?php $this->options->themeUrl('img/bg.png'); ?>);
                        <?php endif; ?>
                    <?php endif; ?>
                }
            </style>
        <?php endif; ?>



        <!-- Fade Effect -->
        <?php if (!empty($this->options->switch) && in_array('ShowLoadingLine', $this->options->switch)): ?>
            <style>
                .fade {
                  transition: all <?php $this->options->loadingbuffer(); ?>ms linear;
                  -webkit-transform: translate3d(0,0,0);
                  -moz-transform: translate3d(0,0,0);
                  -ms-transform: translate3d(0,0,0);
                  -o-transform: translate3d(0,0,0);
                  transform: translate3d(0,0,0);
                  opacity: 1;
                }

                .fade.out {
                  opacity: 0;
                }
            </style>
        <?php endif; ?>

    </head>

    <body id="scheme-Paradox" class="lazy">
