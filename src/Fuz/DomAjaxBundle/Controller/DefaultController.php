<?php

namespace Fuz\DomAjaxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class DefaultController extends Controller
{

   public function indexAction()
   {
      return $this->render('FuzDomAjaxBundle:Default:index.html.twig');
   }

   public function menuAction()
   {
      $context = array(
              'options' => $this->container->getParameter('domajax-options'),
              'events' => $this->container->getParameter('domajax-events'),
      );

      return $this->render('FuzDomAjaxBundle:Default:menu.html.twig', $context);
   }

   public function tableOfContentsAction()
   {
      $context = array(
              'options' => $this->container->getParameter('domajax-options'),
              'events' => $this->container->getParameter('domajax-events'),
      );

      return $this->render('FuzDomAjaxBundle:Default:contents.html.twig', $context);
   }

   public function documentationAction($option)
   {
      $options = $this->container->getParameter('domajax-options');
      $events = $this->container->getParameter('domajax-events');

      if ((!array_key_exists($option, $options)) && (!array_key_exists($option, $events))) {
         throw new AccessDeniedException();
      }

      $doc = array_merge($options, $events);

      $context = array(
              'option' => $option,
              'details' => $doc[$option],
      );

      return $this->render('FuzDomAjaxBundle:Default:document.html.twig', $context);
   }

   public function completeHTMLAction($demo, $extension)
   {
      if (preg_match('/^[a-zA-Z0-9_]+$/', $demo) === false) {
         return new Response();
      }

      if (preg_match('/^(php|html)$/', $extension) === false) {
         return new Response();
      }

      $file = $this->get('kernel')->getRootDir() . '/../web/demo/' . $demo . '-view.' . $extension;
      if (!is_file($file)) {
         throw new FileNotFoundException($demo . ' (complete html)');
      }

      $context = array(
              'demo' => $demo,
              'extension' => $extension,
      );

      return $this->render('FuzDomAjaxBundle:Default:complete-html.html.twig', $context);
   }

   public function phpHandlerAction($demo)
   {
      if (preg_match('/^[a-zA-Z0-9_]+$/', $demo) === false) {
         return new Response();
      }

      $file = $this->get('kernel')->getRootDir() . '/../web/demo/' . $demo . '-handler.php';
      if (!is_file($file)) {
         throw new FileNotFoundException($demo . ' (php handler)');
      }

      $context = array(
              'demo' => $demo,
      );

      return $this->render('FuzDomAjaxBundle:Default:php-handler.html.twig', $context);
   }

}
