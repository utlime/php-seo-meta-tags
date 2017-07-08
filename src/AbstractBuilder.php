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
    public function __construct()
    {
        $this->meta = new \SimpleXMLElement('<meta/>');
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
            call_user_func($this->rules[$name], $this->meta, $name, $value);
        }

        return $this;
    }

    /**
     * @inheritdoc
     */
    public final function build()
    {
        return $this->meta->children()->asXML();
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
}