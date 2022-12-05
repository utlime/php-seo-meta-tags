<?php namespace Utlime\SeoMetaTags;

use PHPUnit\Framework\TestCase;

/**
 * Class OpenGraphBuilderTest
 * @package Utlime\SeoMetaTags
 */
class OpenGraphBuilderTest extends TestCase
{
    /**
     * @var BuilderInterface
     */
    protected $builder;

    public function setUp(): void
    {
        $this->builder = new OpenGraphBuilder();
    }

    public function tearDown(): void
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
                'og:type'     => 'website',
                'title'       => 'stub title',
                'description' => 'stub description',
            ],
            __DIR__ . '/assets/OpenGraphBuilder1.xml',
        ];
    }
}
