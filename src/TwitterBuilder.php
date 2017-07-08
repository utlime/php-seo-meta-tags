<?php namespace Utlime\SocialMetaTags;

/**
 * Class TwitterAbstractBuilder
 * @package Utlime\SocialMetaTags
 */
class TwitterBuilder extends AbstractBuilder
{
    /**
     * @inheritdoc
     */
    protected function init()
    {
        $this
            ->addRule('twitter:title', [$this, 'ruleTitle'])
            ->addAlias('title', 'twitter:title')
            ->addRule('twitter:description', [$this, 'ruleDescription'])
            ->addAlias('description', 'twitter:description')
            ->addRule('twitter:card', [$this, 'ruleCard']);
    }

    /**
     * @param string $value
     */
    protected function ruleTitle($value)
    {
        $meta = $this->getMeta()->addChild('meta');

        $meta->addAttribute('name', 'twitter:title');
        $meta->addAttribute('content', $value);
    }

    /**
     * @param string $value
     */
    protected function ruleDescription($value)
    {
        $meta = $this->getMeta()->addChild('meta');

        $meta->addAttribute('name', 'twitter:description');
        $meta->addAttribute('content', $value);
    }

    /**
     * @param string $value
     */
    protected function ruleCard($value)
    {
        $meta = $this->getMeta()->addChild('meta');

        $meta->addAttribute('name', 'twitter:card');
        $meta->addAttribute('content', $value);
    }
}