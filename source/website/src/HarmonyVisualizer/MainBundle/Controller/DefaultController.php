<?php

namespace HarmonyVisualizer\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('HarmonyVisualizerMainBundle:Default:index.html.twig');
    }
    public function startSurveyAction()
    {
        $em = $this->getDoctrine()->getManager();
        $formType1 = $em->getRepository('HarmonyVisualizerMainBundle:Form')->findBy(
            array('formType' => 'cordova-plugin-contacts visu')
        );
        $formType2 = $em->getRepository('HarmonyVisualizerMainBundle:Form')->findBy(
            array('formType' => 'cordova-plugin-contacts matrix')
        );

        $nbVisu1 = sizeof($formType1);
        $nbVisu2 = sizeof($formType2);

        if ( $nbVisu1 < $nbVisu2 ) {
            return $this->redirect($this->generateUrl('survey_visu_cordova_plugin_contacts'));
        } else {
            return $this->redirect($this->generateUrl('survey_matrix_cordova_plugin_contacts'));
        }
    }
    public function surveyResultsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $conn = $this->get('database_connection');
        $sql = '
            SELECT *
            FROM Form f
            JOIN Userdata u ON u.id = f.userid
            ORDER BY u.id, f.formType
        ';
        $resSql = $conn->fetchAll($sql);

        $answerContacts = array(
            'q1' => 'Piotr Zalewa',
            'q2' => 'Steven Gill',
            'q3' => '/',
            'q4' => '/',
            'q5' => 'src/wp',
            'q6' => 'Steven Gill',
            'q7' => 'src/firefoxos',
            'q8' => '13',
            'q9' => '2',
            'q10' => '4',
            'q11' => '3',
            'q12' => 'Steven Gill'
        );
        $answerFile = array(
            'q1' => 'Andrew Grieve',
            'q2' => 'Steven Gill',
            'q3' => '/',
            'q4' => '/',
            'q5' => 'www/windows8',
            'q6' => 'Steven Gill',
            'q7' => '/',
            'q8' => '8',
            'q9' => '2',
            'q10' => '2',
            'q11' => '2',
            'q12' => 'Steven Gill'
        );

        $questions = array();
        $data = array();
        $data['cordova-plugin-contacts matrix']['q1'] = 0;
        $data['cordova-plugin-contacts matrix']['q2'] = 0;
        $data['cordova-plugin-contacts matrix']['q3'] = 0;
        $data['cordova-plugin-contacts matrix']['q4'] = 0;
        $data['cordova-plugin-contacts matrix']['q5'] = 0;
        $data['cordova-plugin-contacts matrix']['q6'] = 0;
        $data['cordova-plugin-contacts matrix']['q7'] = 0;
        $data['cordova-plugin-contacts matrix']['q8'] = 0;
        $data['cordova-plugin-contacts matrix']['q9'] = 0;
        $data['cordova-plugin-contacts matrix']['q10'] = 0;
        $data['cordova-plugin-contacts matrix']['q11'] = 0;
        $data['cordova-plugin-contacts matrix']['q12'] = 0;
        $data['cordova-plugin-contacts visu']['q1'] = 0;
        $data['cordova-plugin-contacts visu']['q2'] = 0;
        $data['cordova-plugin-contacts visu']['q3'] = 0;
        $data['cordova-plugin-contacts visu']['q4'] = 0;
        $data['cordova-plugin-contacts visu']['q5'] = 0;
        $data['cordova-plugin-contacts visu']['q6'] = 0;
        $data['cordova-plugin-contacts visu']['q7'] = 0;
        $data['cordova-plugin-contacts visu']['q8'] = 0;
        $data['cordova-plugin-contacts visu']['q9'] = 0;
        $data['cordova-plugin-contacts visu']['q10'] = 0;
        $data['cordova-plugin-contacts visu']['q11'] = 0;
        $data['cordova-plugin-contacts visu']['q12'] = 0;
        $data['cordova-plugin-file-transfer matrix']['q1'] = 0;
        $data['cordova-plugin-file-transfer matrix']['q2'] = 0;
        $data['cordova-plugin-file-transfer matrix']['q3'] = 0;
        $data['cordova-plugin-file-transfer matrix']['q4'] = 0;
        $data['cordova-plugin-file-transfer matrix']['q5'] = 0;
        $data['cordova-plugin-file-transfer matrix']['q6'] = 0;
        $data['cordova-plugin-file-transfer matrix']['q7'] = 0;
        $data['cordova-plugin-file-transfer matrix']['q8'] = 0;
        $data['cordova-plugin-file-transfer matrix']['q9'] = 0;
        $data['cordova-plugin-file-transfer matrix']['q10'] = 0;
        $data['cordova-plugin-file-transfer matrix']['q11'] = 0;
        $data['cordova-plugin-file-transfer matrix']['q12'] = 0;
        $data['cordova-plugin-file-transfer visu']['q1'] = 0;
        $data['cordova-plugin-file-transfer visu']['q2'] = 0;
        $data['cordova-plugin-file-transfer visu']['q3'] = 0;
        $data['cordova-plugin-file-transfer visu']['q4'] = 0;
        $data['cordova-plugin-file-transfer visu']['q5'] = 0;
        $data['cordova-plugin-file-transfer visu']['q6'] = 0;
        $data['cordova-plugin-file-transfer visu']['q7'] = 0;
        $data['cordova-plugin-file-transfer visu']['q8'] = 0;
        $data['cordova-plugin-file-transfer visu']['q9'] = 0;
        $data['cordova-plugin-file-transfer visu']['q10'] = 0;
        $data['cordova-plugin-file-transfer visu']['q11'] = 0;
        $data['cordova-plugin-file-transfer visu']['q12'] = 0;

        $total = array();
        $total['cordova-plugin-contacts matrix'] = 0;
        $total['cordova-plugin-contacts visu'] = 0;
        $total['cordova-plugin-file-transfer matrix'] = 0;
        $total['cordova-plugin-file-transfer visu'] = 0;
        foreach ($resSql as $k => $val) {
            if ($val['formType'] == 'cordova-plugin-contacts matrix' || $val['formType'] == 'cordova-plugin-contacts visu') {
                foreach ($answerContacts as $key => $value) {
                    if ($value == $val[$key]) {
                        $data[$val['formType']][$key] += 1;
                    }
                }
            }
            else if ($val['formType'] == 'cordova-plugin-file-transfer matrix' || $val['formType'] == 'cordova-plugin-file-transfer visu') {
                foreach ($answerFile as $key => $value) {
                    if ($value == $val[$key]) {
                        $data[$val['formType']][$key] += 1;
                    }
                }
            }

            if ($val['formType'] == 'cordova-plugin-contacts matrix') {
                $total['cordova-plugin-contacts matrix']++;
            }
            else if ($val['formType'] == 'cordova-plugin-contacts visu') {
                $total['cordova-plugin-contacts visu']++;
            }
            else if ($val['formType'] == 'cordova-plugin-file-transfer matrix') {
                $total['cordova-plugin-file-transfer matrix']++;
            }
            else if ($val['formType'] == 'cordova-plugin-file-transfer visu') {
                $total['cordova-plugin-file-transfer visu']++;
            }
        }

        //var_dump($resSql);
        //var_dump($data);
        //var_dump($questions);

        $questions = array(
            'q1' => "Find the most active developer (in terms of contributions).",
            'q2' => "Find the developer who contributed to the highest number of components.",
            'q3' => "Find the component which has the highest amount of developers.",
            'q4' => "Find the component which received the highest amount of contributions.",
            'q5' => "Find the component which received the highest amount of contributions by purplecabbage.",
            'q6' => "Find the most active developer on the root (“/”) component.",
            'q7' => "Find a component to which one developer contributed much more than the other developers.",
            'q8' => "Indicate the total number of contributions of Anis Kadri.",
            'q9' => "On a scale of 1 to 5, indicate whether the workload is equally divided amongst developers (5/5 being perfectly equal).",
            'q10' => "On a scale of 1 to 5, does it seems that developers work on the same components (5/5), or is there only one developer per component (1/5) ?",
            'q11' => "On a scale of 1 to 5, rate the development team’s composition: is it composed of isolated groups which tend to work together (1/5), or is the team one large group in which all members seem to work together (5/5) ?",
            'q12' => "According to you, which developer has the most knowledge on the project (i.e. the one which contributed the most to the project globally)?"
        );

        return $this->render('HarmonyVisualizerMainBundle:Default:surveyResults.html.twig', array(
            'resSql' => $resSql,
            'data' => $data,
            'questions' => $questions,
            'total' => $total
        ));
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
