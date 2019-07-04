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
        exec($string, $output, $returnVar);

        return empty($output) && empty($returnVar);
    }
}
