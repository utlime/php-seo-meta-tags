<?php namespace Utlime\SeoMetaTags;

use PHPUnit\Framework\TestCase;

/**
 * Class GoogleBuilderTest
 * @package Utlime\SeoMetaTags
 */
class CommonBuilderTest extends TestCase
{
    /**
     * @var BuilderInterface
     */
    protected $builder;

    public function setUp()
    {
        $this->builder = new CommonBuilder();
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
                'title' => 'stub title',
            ],
            __DIR__ . '/assets/CommonBuilder1.xml',
        ];
    }
}
