<?php namespace Utlime\SocialMetaTags;

use PHPUnit\Framework\TestCase;

/**
 * Class BuilderDelegateTest
 * @package Utlime\SocialMetaTags
 */
class BuilderDelegateTest extends TestCase
{
    /**
     * @var BuilderInterface
     */
    protected $builder;

    public function setUp()
    {
        $this->builder = new BuilderDelegate(
            new CommonBuilder(),
            new SearchBuilder(),
            new GoogleBuilder(),
            new TwitterBuilder(),
            new OpenGraphBuilder()
        );
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
                'title'        => 'stub title',
                'description'  => 'stub description',
            ],
            __DIR__ . '/assets/BuilderDelegate1.xml',
        ];
    }
}
