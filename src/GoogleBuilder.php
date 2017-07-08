<?php namespace Utlime\SocialMetaTags;

/**
 * Class SearchAbstractBuilder
 * @package Utlime\SocialMetaTags
 */
class GoogleBuilder extends AbstractBuilder
{
    /**
     * @inheritdoc
     */
    protected function init()
    {
        $this
            ->addRule('google:name', [$this, 'ruleName'])
            ->addAlias('title', 'google:name')
            ->addRule('google:description', [$this, 'ruleDescription'])
            ->addAlias('description', 'google:description');
    }

    /**
     * @param string $value
     */
    protected function ruleName($value)
    {
        $meta = $this->getMeta()->addChild('meta');

        $meta->addAttribute('itemprop', 'name');
        $meta->addAttribute('content', $value);
    }

    /**
     * @param string $value
     */
    protected function ruleDescription($value)
    {
        $meta = $this->getMeta()->addChild('meta');

        $meta->addAttribute('itemprop', 'description');
        $meta->addAttribute('content', $value);
    }
}