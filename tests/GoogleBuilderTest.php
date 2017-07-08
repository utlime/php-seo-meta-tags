<?php namespace Utlime\SocialMetaTags;

use PHPUnit\Framework\TestCase;

/**
 * Class GoogleBuilderTest
 * @package Utlime\SocialMetaTags
 */
class GoogleBuilderTest extends TestCase
{
    /**
     * @var BuilderInterface
     */
    protected $builder;

    public function setUp()
    {
        $this->builder = new GoogleBuilder();
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
        yield [
            [
                'name'        => 'stub title',
                'description' => 'stub description',
            ],
            __DIR__ . '/assets/GoogleBuilder1.xml',
        ];
    }
}
