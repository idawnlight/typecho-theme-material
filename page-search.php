<?php
/**
 * 文章索引
 *
 * @package custom
 */

header("content-type:text/xml");

$this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archive);

echo "<search>";
while ($archive->next()):
    echo "<entry>";
    echo "<title><![CDATA[" . $archive->title .  "]]></title>";
    echo "<url>" . $archive->permalink . "</url>";
    echo "<content type=\"html\"><![CDATA[" . $archive->content . "]]></content>";
    echo "<categories>";
    $archive->category(',', false);
    echo "</categories>";
    echo "<tags>"; $archive->tags(',', false); echo "</tags>";
    echo "</entry>";
endwhile;
echo "</search>";
