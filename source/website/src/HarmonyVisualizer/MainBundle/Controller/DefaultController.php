<?php

namespace HarmonyVisualizer\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('HarmonyVisualizerMainBundle:Default:index.html.twig');
    }
    public function visuContactAction()
    {
        return $this->render('HarmonyVisualizerMainBundle:Default:visu_cordova_plugin_contacts.html.twig');
    }
    public function visuFileTransferAction()
    {
        return $this->render('HarmonyVisualizerMainBundle:Default:visu_cordova_plugin_file_transfer.html.twig');
    }
    public function formAction()
    {
        return $this->render('HarmonyVisualizerMainBundle:Default:form.html.twig');
    }
}
