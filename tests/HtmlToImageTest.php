<?php

namespace Tohidhabiby\HtmlToImage\Tests;

use Mockery;
use PHPUnit\Framework\TestCase;
use Tohidhabiby\HtmlToImage\HtmlToImage;
use Tohidhabiby\HtmlToImage\ShellExec;

class HtmlToImageTest extends TestCase
{
    /** @test */
    public function itCanSetCoordinateY()
    {
        $htmlToImage = new HtmlToImage();
        $coordinateY = 100;
        $htmlToImage->coordinateY($coordinateY);
        $this->assertEquals($coordinateY, $htmlToImage->getCoordinateY());
    }

    /** @test */
    public function itCanSetCoordinateX()
    {
        $htmlToImage = new HtmlToImage();
        $coordinateX = 100;
        $htmlToImage->coordinateX($coordinateX);
        $this->assertEquals($coordinateX, $htmlToImage->getCoordinateX());
    }

    /** @test */
    public function itCanSetCropHeight()
    {
        $htmlToImage = new HtmlToImage();
        $height = 100;
        $htmlToImage->cropHeight($height);
        $this->assertEquals($height, $htmlToImage->getCropHeight());
    }

    /** @test */
    public function itCanSetCropWidth()
    {
        $htmlToImage = new HtmlToImage();
        $width = 100;
        $htmlToImage->cropWidth($width);
        $this->assertEquals($width, $htmlToImage->getCropWidth());
    }

    /** @test */
    public function itCanSetUrl()
    {
        $url = 'http://google.com';
        $htmlToImage = new HtmlToImage();
        $htmlToImage->url($url);
        $this->assertEquals('\'' . $url . '\'', $htmlToImage->getUrl());
    }

    /** @test */
    public function itCanSetPath()
    {
        $path = '~/test';
        $htmlToImage = new HtmlToImage();
        $htmlToImage->path($path);
        $this->assertEquals('\'' . $path . '\'', $htmlToImage->getPath());
    }

    /** @test */
    public function itCanConvertHtmlToImage()
    {
        Mockery::close();
        $url = 'http://google.com';
        $path = '~/test/';
        $command = 'wkhtmltoimage \'' . $url . '\' \'' . $path . '\'';
        $returnPath = '/home/image.jpg';
        $mock = Mockery::mock(ShellExec::class);
        $mock->shouldReceive('exec')->with($command)->once()->andReturn($returnPath);

        $htmlToImage = new HtmlToImage($mock);
        $htmlToImage->url($url);
        $data = $htmlToImage->path($path)->generate();
        $this->assertEquals($returnPath, $data);
    }

    /** @test */
    public function itCanConvertHtmlToImageByParams()
    {
        Mockery::close();
        $url = 'http://google.com';
        $path = '~/test/';
        $height = 100;
        $width = 200;
        $coordinateX = 300;
        $coordinateY = 400;
        $command = sprintf(
            'wkhtmltoimage --crop-h %s --crop-w %s --crop-x %s --crop-y %s \'%s\' \'%s\'',
            $height,
            $width,
            $coordinateX,
            $coordinateY,
            $url,
            $path
        );
        $mock = Mockery::mock(ShellExec::class);
        $mock->shouldReceive('exec')->with($command)->once()->andReturn(true);

        $htmlToImage = new HtmlToImage($mock);
        $data = $htmlToImage->url($url)
            ->path($path)
            ->cropHeight($height)
            ->cropWidth($width)
            ->coordinateY($coordinateY)
            ->coordinateX($coordinateX)
            ->generate();
        $this->assertEquals(true, $data);
    }
}
