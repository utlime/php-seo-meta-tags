<?php namespace Utlime\SocialMetaTags;

/**
 * Interface BuilderInterface
 * @package Utlime\SocialMetaTags
 */
interface BuilderInterface
{
    /**
     * Add property to builder
     * @param string $name
     * @param string $value
     * @return $this
     */
    public function add($name, $value);

    /**
     * Build content which based on properties
     * @return string
     */
    public function build();
}