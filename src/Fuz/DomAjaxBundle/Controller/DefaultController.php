<?php

namespace Fuz\DomAjaxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

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

      if ((!array_key_exists($option, $options)) && (!array_key_exists($option, $events)))
      {
         throw new AccessDeniedHttpException();
      }

      $doc = array_merge($options, $events);

      $context = array(
              'option' => $option,
              'details' => $doc[$option],
      );

      return $this->render('FuzDomAjaxBundle:Default:document.html.twig', $context);
   }

}
