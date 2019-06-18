<?php

namespace Tohidhabiby\HtmlToImage;

class ShellExec
{
    /**
     * @param string $string
     * @return string|null
     */
    public function exec(string $string)
    {
        return shell_exec($string);
    }
}
