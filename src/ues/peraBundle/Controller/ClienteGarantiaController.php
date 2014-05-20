<?php

namespace ues\peraBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ues\peraBundle\Entity\ClienteGarantia;
use ues\peraBundle\Form\ClienteGarantiaType;

/**
 * ClienteGarantia controller.
 *
 * @Route("/clientegarantia")
 */
class ClienteGarantiaController extends Controller
{

    /**
     * Lists all ClienteGarantia entities.
     *
     * @Route("/", name="clientegarantia")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('uesperaBundle:ClienteGarantia')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new ClienteGarantia entity.
     *
     * @Route("/", name="clientegarantia_create")
     * @Method("POST")
     * @Template("uesperaBundle:ClienteGarantia:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new ClienteGarantia();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('clientegarantia_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a ClienteGarantia entity.
    *
    * @param ClienteGarantia $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(ClienteGarantia $entity)
    {
        $form = $this->createForm(new ClienteGarantiaType(), $entity, array(
            'action' => $this->generateUrl('clientegarantia_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ClienteGarantia entity.
     *
     * @Route("/new", name="clientegarantia_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ClienteGarantia();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a ClienteGarantia entity.
     *
     * @Route("/{id}", name="clientegarantia_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uesperaBundle:ClienteGarantia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ClienteGarantia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ClienteGarantia entity.
     *
     * @Route("/{id}/edit", name="clientegarantia_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uesperaBundle:ClienteGarantia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ClienteGarantia entity.');
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
    * Creates a form to edit a ClienteGarantia entity.
    *
    * @param ClienteGarantia $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ClienteGarantia $entity)
    {
        $form = $this->createForm(new ClienteGarantiaType(), $entity, array(
            'action' => $this->generateUrl('clientegarantia_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ClienteGarantia entity.
     *
     * @Route("/{id}", name="clientegarantia_update")
     * @Method("PUT")
     * @Template("uesperaBundle:ClienteGarantia:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uesperaBundle:ClienteGarantia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ClienteGarantia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('clientegarantia_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ClienteGarantia entity.
     *
     * @Route("/{id}", name="clientegarantia_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('uesperaBundle:ClienteGarantia')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ClienteGarantia entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('clientegarantia'));
    }

    /**
     * Creates a form to delete a ClienteGarantia entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('clientegarantia_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
