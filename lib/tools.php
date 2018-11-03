<?php

Class Comment_Expert {
    protected $struct = '<?xml version="1.0" encoding="UTF-8"?>
      <!-- This is a WordPress eXtended RSS file generated from Typecho by idawnlight/typecho-theme-material as an export of comments of your site. -->
<rss version="2.0"
  xmlns:content="http://purl.org/rss/1.0/modules/content/"
  xmlns:dsq="http://www.disqus.com/"
  xmlns:dc="http://purl.org/dc/elements/1.1/"
  xmlns:wp="http://wordpress.org/export/1.0/"
>
  <channel>
  </channel>
</rss>';

    protected $wxr;

    protected $post_blocks;
    protected $comments_blocks;

    public function getResult() {
        $content = $this->wxr->asXML();
        return $content;
    }

    public function addBlock($post) {
        $this->post_blocks[$post['cid']] = $this->wxr->channel->addChild('item');
        $this->post_blocks[$post['cid']]->addChild('title', $post['title']);
        $widget = new arrayToClass(Typecho_Widget::widget('Widget_Abstract_Contents')->push($post));
        $this->post_blocks[$post['cid']]->addChild('link', $widget->permalink);
        $this->post_blocks[$post['cid']]->addChildWithCDATA('encoded', $widget->text, "http://purl.org/rss/1.0/modules/content/");
        $this->post_blocks[$post['cid']]->addChild('thread_identifier', $post['cid'], "http://www.disqus.com/");
        $this->post_blocks[$post['cid']]->addChild('post_date_gmt', gmdate('Y-m-d h:i:s', $widget->created), "http://wordpress.org/export/1.0/");
        $this->post_blocks[$post['cid']]->addChild('comment_status', $widget->allowComment ? 'open' : 'closed', "http://wordpress.org/export/1.0/");
    }

    public function addComment($comment) {
        $comment = new arrayToClass($comment);
        if (isset($this->post_blocks[$comment->cid])) {
            $block = $this->post_blocks[$comment->cid]->addChild('comment', null, "http://wordpress.org/export/1.0/");
            $block->addChild('comment_id', $comment->coid, "http://wordpress.org/export/1.0/");
            $block->addChild('comment_author', $comment->author, "http://wordpress.org/export/1.0/");
            $block->addChild('comment_author_email', $comment->mail, "http://wordpress.org/export/1.0/");
            $block->addChild('comment_author_url', $comment->url, "http://wordpress.org/export/1.0/");
            $block->addChild('comment_author_IP', $comment->ip, "http://wordpress.org/export/1.0/");
            $block->addChild('comment_date_gmt', gmdate('Y-m-d h:i:s', $comment->created), "http://wordpress.org/export/1.0/");
            $block->addChild('comment_id', $comment->coid, "http://wordpress.org/export/1.0/");
            $block->addChildWithCDATA('comment_content', $comment->text, "http://wordpress.org/export/1.0/");
            $block->addChild('comment_approved', $comment->status === 'approved' ? '1' : '0', "http://wordpress.org/export/1.0/");
            $block->addChild('comment_parent', $comment->parent, "http://wordpress.org/export/1.0/");
        }
    }

    public function __construct() {
        $this->wxr = new SimpleXMLElementExtended($this->struct);
        return false;
    }
}

Class SimpleXMLElementExtended extends SimpleXMLElement {

    /**
     * Adds a child with $value inside CDATA
     * @param string $name
     * @param string $value
     * @param string $namespace
     * @return SimpleXMLElement
     * https://stackoverflow.com/questions/6260224/how-to-write-cdata-using-simplexmlelement
     */
    public function addChildWithCDATA($name, $value = NULL, $namespace = null) {
        $new_child = $this->addChild($name, null, $namespace);

        if ($new_child !== NULL) {
            $node = dom_import_simplexml($new_child);
            $no   = $node->ownerDocument;
            $node->appendChild($no->createCDATASection($value));
        }

        return $new_child;
    }
}

Class arrayToClass {
    private $_data;

    public function __construct(array $properties = []){
        $this->_data = $properties;
    }

    public function __set($property, $value){
        return $this->_data[$property] = $value;
    }

    public function __get($property){
        return array_key_exists($property, $this->_data) ? $this->_data[$property] : null;
    }
}