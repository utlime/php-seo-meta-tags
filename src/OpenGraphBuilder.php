<?php namespace Utlime\SocialMetaTags;

/**
 * Class OpenGraphAbstractBuilder
 * @package Utlime\SocialMetaTags
 */
class OpenGraphBuilder extends AbstractBuilder
{
    /**
     * @inheritdoc
     */
    protected function init()
    {
        $this
            ->addRule('og:title', [$this, 'ruleTitle'])
            ->addAlias('title', 'og:title')
            ->addRule('og:description', [$this, 'ruleDescription'])
            ->addAlias('description', 'og:description')
            ->addRule('og:type', [$this, 'ruleType']);
    }

    /**
     * @param string $value
     */
    protected function ruleTitle($value)
    {
        $meta = $this->getMeta()->addChild('meta');

        $meta->addAttribute('name', 'og:title');
        $meta->addAttribute('content', $value);
    }

    /**
     * @param string $value
     */
    protected function ruleDescription($value)
    {
        $meta = $this->getMeta()->addChild('meta');

        $meta->addAttribute('name', 'og:description');
        $meta->addAttribute('content', $value);
    }

    /**
     * @param string $value
     */
    protected function ruleType($value)
    {
        $meta = $this->getMeta()->addChild('meta');

        $meta->addAttribute('name', 'og:type');
        $meta->addAttribute('content', $value);
    }
}