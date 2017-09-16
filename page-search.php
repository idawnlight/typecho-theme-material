<?php
/**
 * 评论索引
 *
 * @package custom
 */
 
header("content-type:text/xml");
$this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archive);
echo "<search>\n";
foreach ($archive->stack as $info) {
    echo "<entry>\n";
    echo "<title>\n<![CDATA[{$info["title"]}]]>\n</title>\n";
    echo "<url>\n{$info["permalink"]}\n</url>\n";
    echo "<content type=\"html\">\n<![CDATA[{$info["text"]}]]>\n</content>\n";
    echo "<categories>\n";
    foreach ($info["categories"] as $categories) {
        echo "\n<category>\n{$categories["name"]}\n</category>";
    }
    echo "\n</categories>\n";
    echo "<tags></tags>";
    echo "</entry>\n";
}
echo "</search>";