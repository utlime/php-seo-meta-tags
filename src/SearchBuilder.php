<?php namespace Utlime\SocialMetaTags;

/**
 * Class SearchAbstractBuilder
 * @package Utlime\SocialMetaTags
 */
class SearchBuilder extends AbstractBuilder
{
    protected function init()
    {
        $this
            ->addRule('search:description', [$this, 'ruleDescription'])
            ->addAlias('description', 'search:description');
    }

    /**
     * @param string $value
     */
    protected function ruleDescription($value)
    {
        $meta = $this->getMeta()->addChild('meta');

        $meta->addAttribute('name', 'description');
        $meta->addAttribute('content', $value);
    }
}