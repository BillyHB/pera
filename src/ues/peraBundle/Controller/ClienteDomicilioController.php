<?php

namespace ues\peraBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ues\peraBundle\Entity\ClienteDomicilio;
use ues\peraBundle\Form\ClienteDomicilioType;

/**
 * ClienteDomicilio controller.
 *
 * @Route("/clientedomicilio")
 */
class ClienteDomicilioController extends Controller
{

    /**
     * Lists all ClienteDomicilio entities.
     *
     * @Route("/", name="clientedomicilio")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('uesperaBundle:ClienteDomicilio')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new ClienteDomicilio entity.
     *
     * @Route("/", name="clientedomicilio_create")
     * @Method("POST")
     * @Template("uesperaBundle:ClienteDomicilio:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new ClienteDomicilio();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('clientedomicilio_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a ClienteDomicilio entity.
    *
    * @param ClienteDomicilio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(ClienteDomicilio $entity)
    {
        $form = $this->createForm(new ClienteDomicilioType(), $entity, array(
            'action' => $this->generateUrl('clientedomicilio_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ClienteDomicilio entity.
     *
     * @Route("/new", name="clientedomicilio_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ClienteDomicilio();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a ClienteDomicilio entity.
     *
     * @Route("/{id}", name="clientedomicilio_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uesperaBundle:ClienteDomicilio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ClienteDomicilio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ClienteDomicilio entity.
     *
     * @Route("/{id}/edit", name="clientedomicilio_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uesperaBundle:ClienteDomicilio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ClienteDomicilio entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a ClienteDomicilio entity.
    *
    * @param ClienteDomicilio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ClienteDomicilio $entity)
    {
        $form = $this->createForm(new ClienteDomicilioType(), $entity, array(
            'action' => $this->generateUrl('clientedomicilio_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ClienteDomicilio entity.
     *
     * @Route("/{id}", name="clientedomicilio_update")
     * @Method("PUT")
     * @Template("uesperaBundle:ClienteDomicilio:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uesperaBundle:ClienteDomicilio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ClienteDomicilio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('clientedomicilio_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ClienteDomicilio entity.
     *
     * @Route("/{id}", name="clientedomicilio_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('uesperaBundle:ClienteDomicilio')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ClienteDomicilio entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('clientedomicilio'));
    }

    /**
     * Creates a form to delete a ClienteDomicilio entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('clientedomicilio_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
