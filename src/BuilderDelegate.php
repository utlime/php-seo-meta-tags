<?php namespace Utlime\SeoMetaTags;

/**
 * Class BuilderDelegate
 * @package Utlime\SeoMetaTags
 */
class BuilderDelegate implements BuilderInterface
{
    /** @var BuilderInterface[] */
    protected $builders;

    /**
     * BuilderDelegate constructor.
     * @param BuilderInterface[] $builders
     */
    public function __construct(BuilderInterface ...$builders)
    {
        $this->builders = $builders;
    }

    /**
     * @inheritdoc
     */
    public function add($name, $value)
    {
        foreach ($this->builders as $builder) {
            $builder->add($name, $value);
        }

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function build()
    {
        $build = '';

        foreach ($this->builders as $builder) {
            $build .= $builder->build();
        }

        return $build;
    }
}