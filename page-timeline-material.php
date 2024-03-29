<?php
/**
 * 时间轴归档 Material
 *
 * @package custom
 */
$this->need('header.php'); ?>

<style>

    .md-container {
        width: 90%;
        max-width: 1170px;
        margin: 0 auto;
    }
    .md-container::after {
        content: '';
        display: table;
        clear: both;
    }
    #md-timeline {
        position: relative;
        padding: 2em 0;
        margin-top: 2em;
        margin-bottom: 2em;
    }
    @media screen and (max-device-width:480px){
        #md-timeline {
            margin-top: 6em;
        }
    }
    #md-timeline::before {
        content: '';
        position: absolute;
        top: 0;
        left: 18px;
        height: 100%;
        width: 2px;
        background: #d7e4ed;
    }
    .md-timeline-title {
        font-size: 20px;
        line-height: 24px;
    }
    .md-timeline-content a {
        text-decoration: none;
    }
    .md-timeline-info {
        height: 20px;
        width: 100%;
        margin: 10px 0px;
    }
    .md-timeline-info-span {
        float: right;
        margin-right: 10px;
    }
    .md-timeline-excerpt {}
    @media only screen and (min-width: 1170px) {
        #md-timeline {
            margin-top: 3em;
            margin-bottom: 3em;
        }
        #md-timeline::before {
            left: 50%;
            margin-left: -2px;
        }
    }
    .md-timeline-block {
        position: relative;
        margin: 2em 0;
    }
    .md-timeline-block:after {
        content: "";
        display: table;
        clear: both;
    }
    .md-timeline-block:first-child {
        margin-top: 0;
    }
    .md-timeline-block:last-child {
        margin-bottom: 0;
    }
    @media only screen and (min-width: 1170px) {
        .md-timeline-block {
            margin: 4em 0;
        }
        .md-timeline-block:first-child {
            margin-top: 0;
        }
        .md-timeline-block:last-child {
            margin-bottom: 0;
        }
    }
    .md-timeline-date {
        position: absolute;
        top: 0;
        left: 0;
        width: 60px;
        height: 40px;
        border-radius: box-shadow: 0 0 0 4px white, inset 0 2px 0 rgba(0, 0, 0, 0.08), 0 3px 0 4px rgba(0, 0, 0, 0.05);
    }
    .md-timeline-date.blue {
        background: #0D395F;
        -webkit-box-shadow: 0px 4px 15px 0px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: 0px 4px 15px 0px rgba(0, 0, 0, 0.75);
        box-shadow: 0px 4px 15px 0px rgba(0, 0, 0, 0.75);
    }
    @media only screen and (min-width: 1170px) {
        .md-timeline-date {
            width: 60px;
            height: 60px;
            left: 50%;
            margin-left: -30px;
            /* Force Hardware Acceleration in WebKit */
            -webkit-transform: translateZ(0);
            -webkit-backface-visibility: hidden;
        }
        .cssanimations .md-timeline-date.is-hidden {
            visibility: hidden;
        }
        .cssanimations .md-timeline-date.bounce-in {
            visibility: visible;
            -webkit-animation: md-bounce-1 0.6s;
            -moz-animation: md-bounce-1 0.6s;
            animation: md-bounce-1 0.6s;
        }
    }
    @-webkit-keyframes md-bounce-1 {
        0% {
            opacity: 0;
            -webkit-transform: scale(0.5);
        }
        60% {
            opacity: 1;
            -webkit-transform: scale(1.2);
        }
        100% {
            -webkit-transform: scale(1);
        }
    }
    @-moz-keyframes md-bounce-1 {
        0% {
            opacity: 0;
            -moz-transform: scale(0.5);
        }
        60% {
            opacity: 1;
            -moz-transform: scale(1.2);
        }
        100% {
            -moz-transform: scale(1);
        }
    }
    @keyframes md-bounce-1 {
        0% {
            opacity: 0;
            -webkit-transform: scale(0.5);
            -moz-transform: scale(0.5);
            -ms-transform: scale(0.5);
            -o-transform: scale(0.5);
            transform: scale(0.5);
        }
        60% {
            opacity: 1;
            -webkit-transform: scale(1.2);
            -moz-transform: scale(1.2);
            -ms-transform: scale(1.2);
            -o-transform: scale(1.2);
            transform: scale(1.2);
        }
        100% {
            -webkit-transform: scale(1);
            -moz-transform: scale(1);
            -ms-transform: scale(1);
            -o-transform: scale(1);
            transform: scale(1);
        }
    }
    .md-timeline-content {
        position: relative;
        margin-left: 60px;
        background: white;
        padding: 1em;
        -webkit-box-shadow: 0px 4px 15px 0px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: 0px 4px 15px 0px rgba(0, 0, 0, 0.75);
        box-shadow: 0px 4px 15px 0px rgba(0, 0, 0, 0.75);
    }
    .md-timeline-content:after {
        content: "";
        display: table;
        clear: both;
    }
    .md-timeline-content h2 {
        color: #303e49;
    }
    .md-timeline-content p, .md-timeline-content .md-read-more, .md-timeline-content .md-date {
        font-size: 13px;
        font-size: 0.8125rem;
    }
    .md-timeline-content .md-read-more, .md-timeline-content .md-date {
        display: inline-block;
    }
    .md-timeline-content p {
        margin: 1em 0;
        line-height: 1.6;
    }
    .md-timeline-content .md-read-more {
        float: right;
        padding: .8em 1em;
        background: #acb7c0;
        color: white;
        border-radius: 0.25em;
    }
    .md-date {
        color: white;
        text-align: center;
    }
    .no-touch .md-timeline-content .md-read-more:hover {
        background-color: #bac4cb;
    }
    .md-timeline-content::before {
        content: '';
        position: absolute;
        top: 16px;
        right: 100%;
        height: 0;
        width: 0;
        border: 7px solid transparent;
        border-right: 7px solid white;
    }
    @media only screen and (min-width: 768px) {
        .md-timeline-content h2 {
            font-size: 20px;
            font-size: 1.25rem;
        }
        .md-timeline-content p {
            font-size: 16px;
            font-size: 1rem;
        }
        .md-timeline-content .md-read-more {
            font-size: 14px;
            font-size: 0.875rem;
        }
    }
    @media only screen and (min-width: 1170px) {
        .md-date {
            text-align: center;
            margin-top: 10px;
            line-height: 20px;
        }
        .md-timeline-content {
            margin-left: 0;
            padding: 1.6em;
            width: 45%;
        }
        .md-timeline-content::before {
            top: 24px;
            left: 100%;
            border-color: transparent;
            border-left-color: white;
        }
        .md-timeline-content .md-read-more {
            float: left;
        }
        .md-timeline-block:nth-child(even) .md-timeline-content {
            float: right;
        }
        .md-timeline-block:nth-child(even) .md-timeline-content::before {
            top: 24px;
            left: auto;
            right: 100%;
            border-color: transparent;
            border-right-color: white;
        }
        .md-timeline-block:nth-child(even) .md-timeline-content .md-read-more {
            float: right;
        }
        .cssanimations .md-timeline-content.is-hidden {
            visibility: hidden;
        }
        .cssanimations .md-timeline-content.bounce-in {
            visibility: visible;
            -webkit-animation: md-bounce-2 0.6s;
            -moz-animation: md-bounce-2 0.6s;
            animation: md-bounce-2 0.6s;
        }
    }
    @media only screen and (min-width: 1170px) {
        /* inverse bounce effect on even content blocks */
        .cssanimations .md-timeline-block:nth-child(even) .md-timeline-content.bounce-in {
            -webkit-animation: md-bounce-2-inverse 0.6s;
            -moz-animation: md-bounce-2-inverse 0.6s;
            animation: md-bounce-2-inverse 0.6s;
        }
    }
    @-webkit-keyframes md-bounce-2 {
        0% {
            opacity: 0;
            -webkit-transform: translateX(-100px);
        }
        60% {
            opacity: 1;
            -webkit-transform: translateX(20px);
        }
        100% {
            -webkit-transform: translateX(0);
        }
    }
    @-moz-keyframes md-bounce-2 {
        0% {
            opacity: 0;
            -moz-transform: translateX(-100px);
        }
        60% {
            opacity: 1;
            -moz-transform: translateX(20px);
        }
        100% {
            -moz-transform: translateX(0);
        }
    }
    @keyframes md-bounce-2 {
        0% {
            opacity: 0;
            -webkit-transform: translateX(-100px);
            -moz-transform: translateX(-100px);
            -ms-transform: translateX(-100px);
            -o-transform: translateX(-100px);
            transform: translateX(-100px);
        }
        60% {
            opacity: 1;
            -webkit-transform: translateX(20px);
            -moz-transform: translateX(20px);
            -ms-transform: translateX(20px);
            -o-transform: translateX(20px);
            transform: translateX(20px);
        }
        100% {
            -webkit-transform: translateX(0);
            -moz-transform: translateX(0);
            -ms-transform: translateX(0);
            -o-transform: translateX(0);
            transform: translateX(0);
        }
    }
    @-webkit-keyframes md-bounce-2-inverse {
        0% {
            opacity: 0;
            -webkit-transform: translateX(100px);
        }
        60% {
            opacity: 1;
            -webkit-transform: translateX(-20px);
        }
        100% {
            -webkit-transform: translateX(0);
        }
    }
    @-moz-keyframes md-bounce-2-inverse {
        0% {
            opacity: 0;
            -moz-transform: translateX(100px);
        }
        60% {
            opacity: 1;
            -moz-transform: translateX(-20px);
        }
        100% {
            -moz-transform: translateX(0);
        }
    }
    @keyframes md-bounce-2-inverse {
        0% {
            opacity: 0;
            -webkit-transform: translateX(100px);
            -moz-transform: translateX(100px);
            -ms-transform: translateX(100px);
            -o-transform: translateX(100px);
            transform: translateX(100px);
        }
        60% {
            opacity: 1;
            -webkit-transform: translateX(-20px);
            -moz-transform: translateX(-20px);
            -ms-transform: translateX(-20px);
            -o-transform: translateX(-20px);
            transform: translateX(-20px);
        }
        100% {
            -webkit-transform: translateX(0);
            -moz-transform: translateX(0);
            -ms-transform: translateX(0);
            -o-transform: translateX(0);
            transform: translateX(0);
        }
    }
</style>
<!-- Hamburger Button -->
<button class="MD-burger-icon sidebar-toggle">
    <span id="MD-burger-id" class="MD-burger-layer"></span>
</button>

<section id="md-timeline" class="md-container">
    <?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archive); ?>
    <?php while ($archive->next()):?>
        <div class="md-timeline-block">
            <div class="md-timeline-date blue">
                <div class="md-date">
                    <?php $archive->date('M j'); ?><br />
                    <?php $archive->date('Y'); ?>
                </div>
            </div>

            <div class="md-timeline-content">
                <div class="md-timeline-title"><a href="<?php $archive->permalink() ?>"><?php $archive->title() ?></a></div>
                <div class="md-timeline-info">
                    <span class="md-timeline-info-span">Tags: <?php $archive->tags(' ', true, null); ?></span>
                    <span class="md-timeline-info-span">Categorias: <?php $archive->category(' '); ?></span>
                </div>
                <p class="md-timeline-excerpt"><?php $archive->excerpt(100, '...'); ?></p>
            </div>
        </div>
    <?php endwhile; ?>
</section>

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
