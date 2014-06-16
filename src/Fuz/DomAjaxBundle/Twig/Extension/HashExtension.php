<?php

// src/Fuz/DomAjaxBundle/Twig/Extension/HashExtension.php

namespace Fuz\DomAjaxBundle\Twig\Extension;

/**
 * hash(string, taille)
 *
 * Cette extension implémente une nouvelle fonction "hash" à Twig.
 *
 * Elle permet de créer un hash de la taille désirée à l'aide de la chaîne de
 * caractères passée en paramètre.
 *
 * @author alain tiemblo <alain@fuz.org>
 */
class HashExtension extends \Twig_Extension
{

    public function getFunctions()
    {
        return array (
                'hash' => new \Twig_Function_Method($this, 'hash'),
        );
    }

    public function hash($string, $size = 10)
    {
        return $this->createHash($size, $string);
    }

    public function createHash($size)
    {
        $hash = '';
        $args = func_get_args();
        $size = array_shift($args);
        foreach ($args as $arg)
        {
            $toHash = var_export($arg, true) . rand() . microtime();
            $hash .= str_shuffle(base_convert(str_shuffle(sha1(str_shuffle(md5($toHash)))), 16, 36));
        }
        return $this->randomHash($size, $hash);
    }

    public function randomHash($size = 10, $string = null)
    {
        $hash = '';
        while (strlen($hash) < $size)
        {
            $toHash = $string . rand() . microtime();
            $hash .= str_shuffle(base_convert(str_shuffle(sha1(str_shuffle(md5($toHash)))), 16, 36));
        }
        return substr($hash, 0, $size);
    }

    public function getName()
    {
        return 'hash';
    }

}