<?php namespace Utlime\SocialMetaTags;

/**
 * Class TwitterAbstractBuilder
 * @package Utlime\SocialMetaTags
 * @link https://dev.twitter.com/cards/markup - specification
 */
class TwitterBuilder extends AbstractBuilder
{
    /**
     * @inheritdoc
     */
    protected function init()
    {
        $this
            ->addRule('twitter:title', [$this, 'ruleCommon'])
            ->addAlias('title', 'twitter:title')
            ->addRule('twitter:description', [$this, 'ruleCommon'])
            ->addAlias('description', 'twitter:description')
            ->addRule('twitter:card', [$this, 'ruleCommon'])
            ->addRule('twitter:site', [$this, 'ruleCommon'])
            ->addRule('twitter:site:id', [$this, 'ruleCommon'])
            ->addRule('twitter:creator', [$this, 'ruleCommon'])
            ->addRule('twitter:creator:id', [$this, 'ruleCommon'])
            ->addRule('twitter:image', [$this, 'ruleCommon'])
            ->addAlias('image', 'twitter:image')
            ->addRule('twitter:image:alt', [$this, 'ruleCommon'])
            ->addRule('twitter:player', [$this, 'ruleCommon'])
            ->addRule('twitter:player:width', [$this, 'ruleCommon'])
            ->addRule('twitter:player:height', [$this, 'ruleCommon'])
            ->addRule('twitter:player:stream', [$this, 'ruleCommon'])
            ->addRule('twitter:app:name:iphone', [$this, 'ruleCommon'])
            ->addRule('twitter:app:id:iphone', [$this, 'ruleCommon'])
            ->addRule('twitter:app:url:iphone', [$this, 'ruleCommon'])
            ->addRule('twitter:app:name:ipad', [$this, 'ruleCommon'])
            ->addRule('twitter:app:id:ipad', [$this, 'ruleCommon'])
            ->addRule('twitter:app:url:ipad', [$this, 'ruleCommon'])
            ->addRule('twitter:app:name:googleplay', [$this, 'ruleCommon'])
            ->addRule('twitter:app:id:googleplay', [$this, 'ruleCommon'])
            ->addRule('twitter:app:url:googleplay', [$this, 'ruleCommon'])
        ;
    }

    /**
     * @param string $content
     * @param string $name
     */
    protected function ruleCommon($content, $name)
    {
        $meta = $this->getMeta()->addChild('meta');

        $meta->addAttribute('name', $name);
        $meta->addAttribute('content', $content);
    }
}