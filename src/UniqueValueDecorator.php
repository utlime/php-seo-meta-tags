<?php namespace Utlime\SeoMetaTags;

/**
 * Class BuilderUniqueDecorator
 * @package Utlime\SeoMetaTags
 * @todo write unit tests
 */
class UniqueValueDecorator implements BuilderInterface
{
    /**
     * @var array
     */
    private $unique = [];

    /**
     * @var BuilderInterface
     */
    private $builder;

    /**
     * UniqueWrapperBuilder constructor.
     *
     * @param BuilderInterface $builder
     */
    public function __construct(BuilderInterface $builder)
    {
        $this->builder = $builder;
    }

    /**
     * Add property to builder
     * @param string $name
     * @param string $value
     * @return $this
     */
    public function add($name, $value)
    {
        $this->unique[$name] = $value;

        return $this;
    }

    /**
     * Build content which based on properties
     * @return string
     */
    public function build()
    {
        foreach ($this->unique as $name => $value) {
            $this->builder->add($name, $value);
        }

        return $this->builder->build();
    }
}