<?php

namespace Fuz\DomAjaxBundle\Twig\Extension;

/**
 * Extension permettant de lire et renvoyer le contenu d'un fichier.
 */
class Text2ImgExtension extends \Twig_Extension
{

    public function getFunctions()
    {
        return array(
                'text2img' => new \Twig_Function_Method($this, 'text2img', array('is_safe' => array('html'))),
        );
    }

    public function text2img($text, $color = '#000000', $size = 12)
    {
        // devil error handler
        if (strlen($color) != 7)
        {
            $color = "#000000";
        }

        // looking for target image size
        $font = realpath(__DIR__ . '/../../Resources/font.ttf');
        $rect = imagettfbbox($size, 0, $font, $text);
        $minX = min(array($rect[0], $rect[2], $rect[4], $rect[6]));
        $maxX = max(array($rect[0], $rect[2], $rect[4], $rect[6]));
        $minY = min(array($rect[1], $rect[3], $rect[5], $rect[7]));
        $maxY = max(array($rect[1], $rect[3], $rect[5], $rect[7]));
        $width = $maxX - $minX;
        $height = $maxY - $minY;

        // selecting an unused color for transparency
        $trans = 254;
        if (hexdec(substr($color, 1, 2)) == 254)
        {
            $trans = 255;
        }

        // creating image with transparent background
        $gdh = imagecreatetruecolor($width, $height);
        $transparent = imagecolorallocate($gdh, $trans, $trans, $trans);
        imagecolortransparent($gdh, $transparent);
        imagefill($gdh, 0, 0, $transparent);

        // recovering text color as rgb and drawing text
        $red = hexdec(substr($color, 1, 2));
        $green = hexdec(substr($color, 3, 2));
        $blue = hexdec(substr($color, 5, 2));
        $foreground = imagecolorallocate($gdh, $red, $green, $blue);
        imagettftext($gdh, $size, 0, abs($minX), abs($minY), $foreground, $font, $text);

        // exporting image as base64 stream
        ob_start();
        imagepng($gdh);
        $b64stream = base64_encode(ob_get_clean());
        return '<img src="data:image/png;base64,'.$b64stream.'" />';
    }

    public function getName()
    {
        return 'text2img';
    }

}