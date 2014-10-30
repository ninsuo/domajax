<?php

namespace Fuz\DomAjaxBundle\Twig\Extension;

class FileExtension extends \Twig_Extension
{

    public function getFunctions()
    {
        return array(
                'random' => new \Twig_Function_Method($this, 'random'),
        );
    }

    public function random($size = 8, $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ01234567890_')
    {
        $correct = $size > 0 ? $size : 8;
        $base = strlen($chars);
        $string = '';
        while ($correct--)
        {
            $string .= $chars[rand() % $base];
        }
        return $string;
    }

    public function getName()
    {
        return 'file';
    }

}
