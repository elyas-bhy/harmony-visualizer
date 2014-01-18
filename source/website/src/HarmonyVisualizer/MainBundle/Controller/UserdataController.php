<?php

namespace HarmonyVisualizer\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use HarmonyVisualizer\MainBundle\Entity\Userdata;
use HarmonyVisualizer\MainBundle\Form\UserdataType;

/**
 * Userdata controller.
 *
 */
class UserdataController extends Controller
{

    /**
     * Lists all Userdata entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HarmonyVisualizerMainBundle:Userdata')->findAll();

        return $this->render('HarmonyVisualizerMainBundle:Userdata:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Userdata entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Userdata();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            //------------------------------------------------------------
            
            $formType1 = $em->getRepository('HarmonyVisualizerMainBundle:Form')->findBy(
                array('formType' => 'cordova-plugin-contacts visu')
            );
            $formType2 = $em->getRepository('HarmonyVisualizerMainBundle:Form')->findBy(
                array('formType' => 'cordova-plugin-contacts matrix')
            );

            $nbVisu1 = sizeof($formType1);
            $nbVisu2 = sizeof($formType2);

            if ( $nbVisu1 < $nbVisu2 ) {
                return $this->render('HarmonyVisualizerMainBundle:Default:survey-visu-contacts.html.twig', array(
                    'id' => $entity->getId()
                ));
            } else {
                return $this->render('HarmonyVisualizerMainBundle:Default:survey-matrix-contacts.html.twig', array(
                    'id' => $entity->getId()
                ));
            }

            //------------------------------------------------------------
            
            //return $this->redirect($this->generateUrl('userdata_show', array('id' => $entity->getId())));
        }

        return $this->render('HarmonyVisualizerMainBundle:Userdata:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Userdata entity.
    *
    * @param Userdata $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Userdata $entity)
    {
        $form = $this->createForm(new UserdataType(), $entity, array(
            'action' => $this->generateUrl('userdata_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Userdata entity.
     *
     */
    public function newAction()
    {
        $entity = new Userdata();
        $form   = $this->createCreateForm($entity);

        return $this->render('HarmonyVisualizerMainBundle:Userdata:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Userdata entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HarmonyVisualizerMainBundle:Userdata')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Userdata entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HarmonyVisualizerMainBundle:Userdata:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Userdata entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HarmonyVisualizerMainBundle:Userdata')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Userdata entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HarmonyVisualizerMainBundle:Userdata:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Userdata entity.
    *
    * @param Userdata $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Userdata $entity)
    {
        $form = $this->createForm(new UserdataType(), $entity, array(
            'action' => $this->generateUrl('userdata_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Userdata entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HarmonyVisualizerMainBundle:Userdata')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Userdata entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('userdata_edit', array('id' => $id)));
        }

        return $this->render('HarmonyVisualizerMainBundle:Userdata:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Userdata entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HarmonyVisualizerMainBundle:Userdata')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Userdata entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('userdata'));
    }

    /**
     * Creates a form to delete a Userdata entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('userdata_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
