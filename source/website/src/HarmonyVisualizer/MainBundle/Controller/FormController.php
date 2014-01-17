<?php

namespace HarmonyVisualizer\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use HarmonyVisualizer\MainBundle\Entity\Form;
use HarmonyVisualizer\MainBundle\Form\FormType;

/**
 * Form controller.
 *
 */
class FormController extends Controller
{

    /**
     * Lists all Form entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HarmonyVisualizerMainBundle:Form')->findAll();

        return $this->render('HarmonyVisualizerMainBundle:Form:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Form entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Form();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $formType = $entity->getFormType();
            
            if ($formType == "cordova-plugin-contacts matrix") {
                return $this->redirect($this->generateUrl('survey_visu_cordova_plugin_file_transfer'));
            }
            else if ($formType == "cordova-plugin-contacts visu") {
                return $this->redirect($this->generateUrl('survey_matrix_cordova_plugin_file_transfer'));
            }
            return $this->redirect($this->generateUrl('formComplete'));
        }

        return $this->render('HarmonyVisualizerMainBundle:Form:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Form entity.
    *
    * @param Form $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Form $entity)
    {
        $form = $this->createForm(new FormType(), $entity, array(
            'action' => $this->generateUrl('form_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Form entity.
     *
     */
    public function newAction()
    {
        $entity = new Form();
        $form   = $this->createCreateForm($entity);

        return $this->render('HarmonyVisualizerMainBundle:Form:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Form entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HarmonyVisualizerMainBundle:Form')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Form entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HarmonyVisualizerMainBundle:Form:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Form entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HarmonyVisualizerMainBundle:Form')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Form entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HarmonyVisualizerMainBundle:Form:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Form entity.
    *
    * @param Form $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Form $entity)
    {
        $form = $this->createForm(new FormType(), $entity, array(
            'action' => $this->generateUrl('form_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Form entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HarmonyVisualizerMainBundle:Form')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Form entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('form_edit', array('id' => $id)));
        }

        return $this->render('HarmonyVisualizerMainBundle:Form:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Form entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HarmonyVisualizerMainBundle:Form')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Form entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('form'));
    }

    /**
     * Creates a form to delete a Form entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('form_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
