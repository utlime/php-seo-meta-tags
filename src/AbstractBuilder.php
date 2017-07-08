<?php namespace Utlime\SocialMetaTags;

/**
 * Class AbstractBuilder
 * @package Utlime\SocialMetaTags
 */
abstract class AbstractBuilder implements BuilderInterface
{
    /**
     * @var \SimpleXMLElement
     */
    private $meta;

    /**
     * @var array
     */
    private $rules = [];

    /**
     * @var array
     */
    private $aliases = [];

    /**
     * AbstractBuilder constructor.
     */
    public final function __construct()
    {
        $this->meta = new \SimpleXMLIterator('<meta/>');

        $this->init();
    }

    /**
     * @inheritdoc
     */
    public final function add($name, $value)
    {
        if (array_key_exists($name, $this->aliases)) {
            $name = $this->aliases[$name];
        }

        if (array_key_exists($name, $this->rules)) {
            call_user_func($this->rules[$name], $value, $name);
        }

        return $this;
    }

    /**
     * @inheritdoc
     */
    public final function build()
    {
        $build = '';

        for($this->meta->rewind(); $this->meta->valid(); $this->meta->next() ) {
            $build .= $this->meta->current()->asXML();
        }

        return $build;
    }

    /**
     * @param string $alias
     * @param string $name
     * @return $this
     */
    protected final function addAlias($alias, $name)
    {
        $this->aliases[$alias] = $name;

        return $this;
    }

    /**
     * @param string   $name
     * @param callable $callable
     * @return $this
     */
    protected final function addRule($name, callable $callable)
    {
        $this->rules[$name] = $callable;

        return $this;
    }

    /**
     * @return \SimpleXMLElement
     */
    protected final function getMeta()
    {
        return $this->meta;
    }

    /**
     * Init rules and aliases
     */
    protected function init()
    {

    }
}