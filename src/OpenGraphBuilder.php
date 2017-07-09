<?php namespace Utlime\SocialMetaTags;

/**
 * Class OpenGraphAbstractBuilder
 * @package Utlime\SocialMetaTags
 * @link http://ogp.me/ - specification
 */
class OpenGraphBuilder extends AbstractBuilder
{
    /**
     * @inheritdoc
     */
    protected function init()
    {
        $this
            ->addRule('og:title', [$this, 'ruleCommon'])
            ->addAlias('title', 'og:title')
            ->addRule('og:description', [$this, 'ruleCommon'])
            ->addAlias('description', 'og:description')
            ->addRule('og:type', [$this, 'ruleCommon'])
            ->addRule('og:url', [$this, 'ruleCommon'])
            ->addAlias('canonical', 'og:url')
            ->addRule('og:determiner', [$this, 'ruleCommon'])
            ->addRule('og:locale', [$this, 'ruleCommon'])
            ->addAlias('language', 'og:locale')
            ->addRule('og:locale:alternate', [$this, 'ruleCommon'])
            ->addRule('og:site_name', [$this, 'ruleCommon'])
            ->addRule('og:image', [$this, 'ruleCommon'])
            ->addAlias('og:image:url', 'og:image')
            ->addAlias('image', 'og:image')
            ->addRule('og:image:secure_url', [$this, 'ruleCommon'])
            ->addRule('og:image:type', [$this, 'ruleCommon'])
            ->addRule('og:image:width', [$this, 'ruleCommon'])
            ->addRule('og:image:height', [$this, 'ruleCommon'])
            ->addRule('og:audio', [$this, 'ruleCommon'])
            ->addRule('og:audio:secure_url', [$this, 'ruleCommon'])
            ->addRule('og:audio:type', [$this, 'ruleCommon'])
            ->addRule('og:video', [$this, 'ruleCommon'])
            ->addRule('og:video:secure_url', [$this, 'ruleCommon'])
            ->addRule('og:video:type', [$this, 'ruleCommon'])
            ->addRule('og:video:width', [$this, 'ruleCommon'])
            ->addRule('og:video:height', [$this, 'ruleCommon'])
            ->addRule('article:published_time', [$this, 'ruleCommon'])
            ->addRule('article:modified_time', [$this, 'ruleCommon'])
            ->addRule('article:expiration_time', [$this, 'ruleCommon'])
            ->addRule('article:author', [$this, 'ruleCommon'])
            ->addRule('article:section', [$this, 'ruleCommon'])
            ->addRule('article:tag', [$this, 'ruleCommon'])
            ->addRule('book:author', [$this, 'ruleCommon'])
            ->addRule('book:isbn', [$this, 'ruleCommon'])
            ->addRule('book:release_date', [$this, 'ruleCommon'])
            ->addRule('book:tag', [$this, 'ruleCommon'])
            ->addRule('profile:first_name', [$this, 'ruleCommon'])
            ->addRule('profile:last_name', [$this, 'ruleCommon'])
            ->addRule('profile:username', [$this, 'ruleCommon'])
            ->addRule('profile:gender', [$this, 'ruleCommon'])
            ->addRule('music:duration', [$this, 'ruleCommon'])
            ->addRule('music:album', [$this, 'ruleCommon'])
            ->addRule('music:album:disc', [$this, 'ruleCommon'])
            ->addRule('music:album:track', [$this, 'ruleCommon'])
            ->addRule('music:musician', [$this, 'ruleCommon'])
            ->addRule('music:song', [$this, 'ruleCommon'])
            ->addRule('music:song:disc', [$this, 'ruleCommon'])
            ->addRule('music:song:track', [$this, 'ruleCommon'])
            ->addRule('music:release_date', [$this, 'ruleCommon'])
            ->addRule('music:creator', [$this, 'ruleCommon'])
            ->addRule('video:actor', [$this, 'ruleCommon'])
            ->addRule('video:actor:role', [$this, 'ruleCommon'])
            ->addRule('video:director', [$this, 'ruleCommon'])
            ->addRule('video:writer', [$this, 'ruleCommon'])
            ->addRule('video:duration', [$this, 'ruleCommon'])
            ->addRule('video:release_date', [$this, 'ruleCommon'])
            ->addRule('video:tag', [$this, 'ruleCommon'])
            ->addRule('video:series', [$this, 'ruleCommon']);
    }

    /**
     * @param string $content
     * @param string $name
     */
    protected function ruleCommon($content, $name)
    {
        $meta = $this->getMeta()->addChild('meta');

        $meta->addAttribute('property', $name);
        $meta->addAttribute('content', $content);
    }
}