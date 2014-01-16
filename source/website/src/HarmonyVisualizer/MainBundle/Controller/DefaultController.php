<?php

namespace HarmonyVisualizer\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('HarmonyVisualizerMainBundle:Default:index.html.twig');
    }
    public function visuContactsAction()
    {
        return $this->render('HarmonyVisualizerMainBundle:Default:visu_cordova_plugin_contacts.html.twig');
    }
    public function visuFileTransferAction()
    {
        return $this->render('HarmonyVisualizerMainBundle:Default:visu_cordova_plugin_file_transfer.html.twig');
    }
    public function matrixContactsAction()
    {
        return $this->render('HarmonyVisualizerMainBundle:Default:matrix-contacts.html.twig');
    }
    public function matrixFileTransferAction()
    {
        return $this->render('HarmonyVisualizerMainBundle:Default:matrix-file.html.twig');
    }
    public function formAction()
    {
        return $this->render('HarmonyVisualizerMainBundle:Default:form.html.twig');
    }
    public function formCompleteAction()
    {
        return $this->render('HarmonyVisualizerMainBundle:Default:formComplete.html.twig');
    }


    public function visuContactsFormAction()
    {
        return $this->render('HarmonyVisualizerMainBundle:Default:survey-visu-contacts.html.twig');
    }
    public function visuFileTransferFormAction()
    {
        return $this->render('HarmonyVisualizerMainBundle:Default:survey-visu-file.html.twig');
    }
    public function matrixContactsFormAction()
    {
        return $this->render('HarmonyVisualizerMainBundle:Default:survey-matrix-contacts.html.twig');
    }
    public function matrixFileTransferFormAction()
    {
        return $this->render('HarmonyVisualizerMainBundle:Default:survey-matrix-file.html.twig');
    }
}
