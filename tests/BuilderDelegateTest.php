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
        yield [[], __DIR__ . '/assets/EmptyBuilder0.xml'];

        yield [
            [
                'title'        => 'stub title',
                'description'  => 'stub description',
                'language'     => 'stub language',
                'canonical'    => 'stub canonical',
                'image'        => 'stub image',
                'og:image'     => 'stub og:image',
            ],
            __DIR__ . '/assets/BuilderDelegate1.xml',
        ];
    }
}
