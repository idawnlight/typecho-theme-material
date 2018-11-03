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
        return $this->wxr->asXML();
    }

    public function addBlock($post) {
        $this->post_blocks[$post['cid']] = $this->wxr->channel->addChild('item');
        $this->post_blocks[$post['cid']]->addChild('title', $post['title']);
        $widget = new arrayToClass(Typecho_Widget::widget('Widget_Abstract_Contents')->push($post));
        $this->post_blocks[$post['cid']]->addChild('link', $widget->permalink);
        $this->post_blocks[$post['cid']]->addChild('content:encoded', $widget->content);
        $this->post_blocks[$post['cid']]->addChild('dsq:thread_identifier', $post['cid']);
        $this->post_blocks[$post['cid']]->addChild('wp:post_date_gmt', gmdate('Y-m-d h:i:s', $widget->created));
        $this->post_blocks[$post['cid']]->addChild('wp:comment_status', $widget->allowComment ? 'open' : 'closed');
    }

    public function addComment($comment) {
        $comment = new arrayToClass($comment);
        if (isset($this->post_blocks[$comment->cid])) {
            $block = $this->post_blocks[$comment->cid]->addChild('comment');
            $block->addChild('wp:comment_id', $comment->coid);
            $block->addChild('wp:comment_author', $comment->author);
            $block->addChild('wp:comment_author_email', $comment->mail);
            $block->addChild('wp:comment_author_url', $comment->url);
            $block->addChild('wp:comment_author_IP', $comment->ip);
            $block->addChild('wp:comment_date_gmt', gmdate('Y-m-d h:i:s', $comment->created));
            $block->addChild('wp:comment_id', $comment->coid);
            $block->addChild('wp:comment_content', $comment->text);
            $block->addChild('wp:comment_approved', $comment->status === 'approved' ? '1' : '0');
            $block->addChild('wp:comment_parent', $comment->parent);
        }
    }

    public function __construct() {
        $this->wxr = new SimpleXMLElement($this->struct);
        return false;
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