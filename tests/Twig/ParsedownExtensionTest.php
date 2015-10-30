<?php

namespace Demontpx\ParsedownBundle\Twig;

/**
 * Class ParsedownExtensionTest
 *
 * @author    Bert Hekman <demontpx@gmail.com>
 * @copyright 2015 Bert Hekman
 */
class ParsedownExtensionTest extends \PHPUnit_Framework_TestCase 
{
    /** @var ParsedownExtension */
    private $extension;

    /** @var \PHPUnit_Framework_MockObject_MockObject|\Parsedown */
    private $parsedown;

    protected function setUp()
    {
        $this->parsedown = $this->createMockParsedown();
        $this->extension = new ParsedownExtension($this->parsedown);
    }

    public function testParsedown()
    {
        $text = 'Some random text';
        $parsedText = 'This is some parsed text';

        $this->parsedown->expects($this->once())
            ->method('text')
            ->with($text)
            ->willReturn($parsedText);

        $result = $this->extension->parsedown($text);

        $this->assertSame($parsedText, $result);
    }

    public function testStrip()
    {
        $text = 'Some *random* text';
        $parsedText = 'Some <em>random</em> text';
        $expectedResult = 'Some random text';

        $this->parsedown->expects($this->once())
            ->method('text')
            ->with($text)
            ->willReturn($parsedText);

        $result = $this->extension->strip($text);

        $this->assertSame($expectedResult, $result);
    }

    public function testGetFilters()
    {
        $expectedResult = [
            new \Twig_SimpleFilter('markdown', [$this->extension, 'parsedown'], ['is_safe' => ['html']]),
        ];

        $this->assertEquals($expectedResult, $this->extension->getFilters());
    }


    public function testGetName()
    {
        $this->assertSame('demontpx_parsedown', $this->extension->getName());
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\Parsedown
     */
    public function createMockParsedown()
    {
        return $this->getMockBuilder('Parsedown')
            ->disableOriginalConstructor()
            ->getMock();
    }
}
