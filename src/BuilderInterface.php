<?php namespace Utlime\SeoMetaTags;

/**
 * Interface BuilderInterface
 * @package Utlime\SeoMetaTags
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