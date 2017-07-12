<?php namespace Utlime\SeoMetaTags;

use PHPUnit\Framework\TestCase;

/**
 * Class TwitterBuilderTest
 * @package Utlime\SeoMetaTags
 */
class TwitterBuilderTest extends TestCase
{
    /**
     * @var BuilderInterface
     */
    protected $builder;

    public function setUp()
    {
        $this->builder = new TwitterBuilder();
    }

    public function tearDown()
    {
        $this->builder = null;
    }

    /**
     * @dataProvider dataBuildSet
     * @param array  $set
     * @param string $result
     */
    public function testBuild(array $set, $result)
    {
        foreach ($set as $name => $value) {
            $this->builder->add($name, $value);
        }

        $this->assertXmlStringEqualsXmlFile($result, '<head>' . $this->builder->build() . '</head>');
    }

    public function dataBuildSet()
    {
        yield [[], __DIR__ . '/assets/EmptyBuilder0.xml'];

        yield [
            [
                'twitter:card' => 'summary',
                'title'        => 'stub title',
                'description'  => 'stub description',
            ],
            __DIR__ . '/assets/TwitterBuilder1.xml',
        ];
    }
}
