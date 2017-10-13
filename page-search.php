<?php
/**
 * 文章索引
 *
 * @package custom
 */

header("content-type:text/xml");

$this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archive);

echo "<search>\n";
while ($archive->next()):
    echo "\t<entry>\n";
    echo "\t\t<title>\n\t\t\t<![CDATA["; $archive->title(); echo "]]>\n\t\t</title>\n";
    echo "\t\t<url>\n\t\t\t"; $archive->permalink(); echo "\n\t\t</url>\n";
    echo "\t\t<content type=\"html\">\n\t\t<![CDATA["; $archive->content(); echo "]]>\n\t\t</content>\n";
    echo "\t\t<categories>\n\t\t\t";
    $archive->category(',', false);
    echo "\n\t\t</categories>\n";
    echo "\t\t<tags>\n\t\t\t"; $archive->tags(',', false); echo "\n\t\t</tags>\n";
    echo "\t</entry>\n";
endwhile;
echo "</search>";
