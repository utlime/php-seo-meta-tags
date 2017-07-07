<?php namespace Utlime\SocialMetaTags;

/**
 * Class AbstractBuilder
 * @package Utlime\SocialMetaTags
 */
abstract class AbstractBuilder implements BuilderInterface
{
    /**
     * @inheritdoc
     */
    public function add($name, $value)
    {
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function build()
    {
        return '';
    }
}