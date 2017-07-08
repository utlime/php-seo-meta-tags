<?php namespace Utlime\SocialMetaTags;

/**
 * Class SearchAbstractBuilder
 * @package Utlime\SocialMetaTags
 */
class CommonBuilder extends AbstractBuilder
{
    /**
     * @inheritdoc
     */
    protected function init()
    {
        $this
            ->addRule('title', [$this, 'ruleTitle']);
    }

    /**
     * @param string $value
     */
    protected function ruleTitle($value)
    {
        $this->getMeta()
            ->addChild('title', $value);
    }
}