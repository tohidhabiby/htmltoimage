<?php

namespace Tohidhabiby\HtmlToImage;

interface HtmlToImageInterface
{
    /**
     * set html url
     * @param string $url
     * @return HtmlToImageInterface
     */
    public function url(string $url) : HtmlToImageInterface;

    /**
     * get html url
     * @return string
     */
    public function getUrl() : string;

    /**
     * set html path
     * @param string $path
     * @return HtmlToImageInterface
     */
    public function path(string $path) : HtmlToImageInterface;

    /**
     * get html path
     * @return string
     */
    public function getPath() : string;

    /**
     * generate image
     *
     * @return string
     */
    public function generate() : string;

    /**
     * set height for cropping
     *
     * @param int $value
     * @return HtmlToImageInterface
     */
    public function cropHeight(int $value) : HtmlToImageInterface;

    /**
     * get height crop
     *
     * @return int|null
     */
    public function getCropHeight() : ?int ;

    /**
     * set width for cropping
     *
     * @param int $value
     * @return HtmlToImageInterface
     */
    public function cropWidth(int $value) : HtmlToImageInterface;

    /**
     * get width crop
     *
     * @return int|null
     */
    public function getCropWidth() : ?int ;

    /**
     * set X coordinate
     *
     * @param int $value
     * @return HtmlToImageInterface
     */
    public function coordinateX(int $value) : HtmlToImageInterface;

    /**
     * get X coordinate
     *
     * @return int|null
     */
    public function getCoordinateX() : ?int ;

    /**
     * set Y coordinate
     *
     * @param int $value
     * @return HtmlToImageInterface
     */
    public function coordinateY(int $value) : HtmlToImageInterface;

    /**
     * get Y coordinate
     *
     * @return int|null
     */
    public function getCoordinateY() : ?int ;
}
