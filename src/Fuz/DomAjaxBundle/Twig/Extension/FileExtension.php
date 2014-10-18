<?php

namespace Fuz\DomAjaxBundle\Twig\Extension;

use Symfony\Component\HttpKernel\KernelInterface;

use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;

/**
 * Extension permettant de lire et renvoyer le contenu d'un fichier.
 */
class FileExtension extends \Twig_Extension
{

    private $kernel;

    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    public function getFunctions()
    {
        return array(
                'template_contents' => new \Twig_Function_Method($this, 'templateContents'),
                'asset_contents' => new \Twig_Function_Method($this, 'assetContents'),
                'asset_demo' => new \Twig_Function_Method($this, 'assetDemo'),
        );
    }

    /**
     * Accès à un fichier situé dans un bundle.
     *
     * Exemple d'utilisation:
     * {{ template_contents('@FuzDomAjaxBundle/Resources/views/Default/index.html.twig') }}
     */
    public function templateContents($path)
    {
        $path = $this->kernel->locateResource($path, null, true);

        return file_get_contents($path);
    }

    /**
     * Accès à un fichier situé dans web.
     *
     * Exemple d'utilisation:
     * {{ asset_contents('demo/introduction-handler.php') }}
     */
    public function assetContents($path)
    {
        $file = $this->kernel->getRootDir() . '/../web/' . $path;
        if ((!is_file($file)) || (!is_readable($file))) {
            throw new FileNotFoundException($file);
        }

        return file_get_contents($path);
    }

    /**
     * Ne récupere que le contenu HTML spécifique à une démo.
     */
    public function assetDemo($path)
    {
        $content = $this->assetContents($path);
        $start = '<!-- demo starts here -->';
        $end = '<!-- demo ends here -->';
        $content = substr($content, strpos($content, $start) + strlen($start));
        $content = substr($content, 0, strpos($content, $end));
        $content = trim($content, " ");

        return $content;
    }

    public function getName()
    {
        return 'file';
    }

}
