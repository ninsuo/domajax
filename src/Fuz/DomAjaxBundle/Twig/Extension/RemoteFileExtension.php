<?php

namespace Fuz\DomAjaxBundle\Twig\Extension;

use Symfony\Component\HttpKernel\KernelInterface;

/**
 * Extension that downloads a remote file and returns a twig path.
 */
class RemoteFileExtension extends \Twig_Extension
{

    private $kernel;

    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    public function getFunctions()
    {
        return array(
                'remote_file' => new \Twig_Function_Method($this, 'remote_file'),
        );
    }

    public function remote_file($url)
    {
        $contents = file_get_contents($url);
        $file = $this->kernel->getRootDir() . "/Resources/views/temp/" . sha1($contents) . '.html.twig';
        if (!is_file($file))
        {
            file_put_contents($file, $contents);
        }
        return ':temp:' . basename($file);
    }

    public function getName()
    {
        return 'remote_file';
    }

}