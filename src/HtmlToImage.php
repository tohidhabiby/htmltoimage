<?php

namespace Tohidhabiby\HtmlToImage;

class HtmlToImage implements HtmlToImageInterface
{
    protected $url;
    protected $path;
    protected $shellExec;
    protected $height;
    protected $width;
    protected $coordinateX;
    protected $coordinateY;
    protected $command = 'wkhtmltoimage';

    /**
     * HtmlToImage constructor.
     * @param null|ShellExec $shellExec
     * @param string|null $command
     */
    public function __construct(?ShellExec $shellExec = null, ?string $command = null)
    {
        $this->shellExec = $shellExec ?? new ShellExec;
        if (!empty($command)) {
            $this->command = $command;
        }
    }

    /**
     * set html url
     * @param string $url
     * @return HtmlToImageInterface
     */
    public function url(string $url): HtmlToImageInterface
    {
        $this->url = '\'' . $url . '\'';

        return $this;
    }

    /**
     * get html url
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * set html path
     * @param string $path
     * @return HtmlToImageInterface
     */
    public function path(string $path): HtmlToImageInterface
    {
        $this->path = '\'' . $path . '\'';

        return $this;
    }

    /**
     * get html path
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * generate image
     *
     * @return string
     */
    public function generate(): string
    {
        return $this->shellExec->exec($this->getCommand());
    }

    /**
     * get bash command
     *
     * @return string
     */
    public function getCommand() : string
    {
        return sprintf(
            '%s%s%s%s%s %s %s',
            $this->command,
            $this->getCropHeight() ? sprintf(' --crop-h %s', $this->height) : '',
            $this->getCropWidth() ? sprintf(' --crop-w %s', $this->width) : '',
            $this->getCoordinateX() ? sprintf(' --crop-x %s', $this->coordinateX) : '',
            $this->getCoordinateY() ? sprintf(' --crop-y %s', $this->coordinateY) : '',
            $this->url,
            $this->path
        );
    }

    /**
     * @param int $value
     * @return HtmlToImageInterface
     */
    public function cropHeight(int $value) : HtmlToImageInterface
    {
        $this->height = $value;

        return $this;
    }

    /**
     * get height crop
     *
     * @return int|null
     */
    public function getCropHeight(): ?int
    {
        return $this->height;
    }

    /**
     * set width for cropping
     *
     * @param int $value
     * @return HtmlToImageInterface
     */
    public function cropWidth(int $value): HtmlToImageInterface
    {
        $this->width = $value;

        return $this;
    }

    /**
     * get width crop
     *
     * @return int|null
     */
    public function getCropWidth(): ?int
    {
        return $this->width;
    }

    /**
     * set X coordinate
     *
     * @param int $value
     * @return HtmlToImageInterface
     */
    public function coordinateX(int $value): HtmlToImageInterface
    {
        $this->coordinateX = $value;

        return $this;
    }

    /**
     * get X coordinate
     *
     * @return int|null
     */
    public function getCoordinateX(): ?int
    {
        return $this->coordinateX;
    }

    /**
     * set Y coordinate
     *
     * @param int $value
     * @return HtmlToImageInterface
     */
    public function coordinateY(int $value): HtmlToImageInterface
    {
        $this->coordinateY = $value;

        return $this;
    }

    /**
     * get Y coordinate
     *
     * @return int|null
     */
    public function getCoordinateY(): ?int
    {
        return $this->coordinateY;
    }
}
