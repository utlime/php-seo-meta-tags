<?php namespace Utlime\SeoMetaTags;

/**
 * Class SearchAbstractBuilder
 * @package Utlime\SeoMetaTags
 */
class CommonBuilder extends AbstractBuilder
{
    /**
     * @inheritdoc
     */
    protected function init()
    {
        $this
            ->addRule('title', [$this, 'ruleTitle'])
            ->addRule('description', [$this, 'ruleCommon'])
            ->addRule('robots', [$this, 'ruleCommon'])
            ->addRule('canonical', [$this, 'ruleLink'])
            ->addRule('prev', [$this, 'ruleLink'])
            ->addRule('next', [$this, 'ruleLink'])
            ->addRule('alternate', [$this, 'ruleLink'])
            ->addRule('rss', [$this, 'ruleRSS'])
            ->addRule('viewport', [$this, 'ruleCommon'])
            ->addRule('content-language', [$this, 'ruleHTTPEquiv'])
            ->addAlias('language', 'content-language')
            ->addRule('content-type', [$this, 'ruleHTTPEquiv'])
            ->addRule('charset', [$this, 'ruleCharset'])
            ->addRule('keywords', [$this, 'ruleCommon'])
            ->addRule('geo.position', [$this, 'ruleCommon'])
            ->addRule('geo.placename', [$this, 'ruleCommon'])
            ->addRule('geo.region', [$this, 'ruleCommon']);
    }

    /**
     * @param string $value
     */
    protected function ruleTitle($value)
    {
        $this->getMeta()
            ->addChild('title', $value);
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

    /**
     * @param string $charset
     */
    protected function ruleCharset($charset)
    {
        $this->getMeta()
            ->addChild('meta')
            ->addAttribute('charset', $charset);
    }

    /**
     * @param string $content
     */
    protected function ruleHTTPEquiv($content, $http_equiv)
    {
        $meta = $this->getMeta()->addChild('meta');

        $meta->addAttribute('http-equiv', $http_equiv);
        $meta->addAttribute('content', $content);
    }

    /**
     * @param string      $href
     * @param string      $rel
     * @param null|string $type
     */
    protected function ruleLink($href, $rel, $type = null)
    {
        $meta = $this->getMeta()->addChild('link');

        $meta->addAttribute('rel', $rel);
        $meta->addAttribute('href', $href);

        if ($type !== null) {
            $meta->addAttribute('type', $type);
        }
    }

    /**
     * @param string $href
     * @param string $rel
     */
    protected function ruleRSS($href, $rel)
    {
        $this->ruleLink($href, $rel, 'application/rss+xml');
    }
}