<?php

namespace HarmonyVisualizer\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('HarmonyVisualizerMainBundle:Default:index.html.twig');
    }
    public function visualizerAction()
    {
        return $this->render('HarmonyVisualizerMainBundle:Default:harmony-visualizer.html.twig');
    }
    public function formAction()
    {
        return $this->render('HarmonyVisualizerMainBundle:Default:form.html.twig');
    }
}
