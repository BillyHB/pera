<?php

namespace ues\peraBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ues\peraBundle\Entity\CreditoDestino;
use ues\peraBundle\Form\CreditoDestinoType;

/**
 * CreditoDestino controller.
 *
 * @Route("/creditodestino")
 */
class CreditoDestinoController extends Controller
{

    /**
     * Lists all CreditoDestino entities.
     *
     * @Route("/", name="creditodestino")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('uesperaBundle:CreditoDestino')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new CreditoDestino entity.
     *
     * @Route("/", name="creditodestino_create")
     * @Method("POST")
     * @Template("uesperaBundle:CreditoDestino:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new CreditoDestino();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('creditodestino_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a CreditoDestino entity.
    *
    * @param CreditoDestino $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(CreditoDestino $entity)
    {
        $form = $this->createForm(new CreditoDestinoType(), $entity, array(
            'action' => $this->generateUrl('creditodestino_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new CreditoDestino entity.
     *
     * @Route("/new", name="creditodestino_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new CreditoDestino();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a CreditoDestino entity.
     *
     * @Route("/{id}", name="creditodestino_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uesperaBundle:CreditoDestino')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CreditoDestino entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing CreditoDestino entity.
     *
     * @Route("/{id}/edit", name="creditodestino_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uesperaBundle:CreditoDestino')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CreditoDestino entity.');
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
    * Creates a form to edit a CreditoDestino entity.
    *
    * @param CreditoDestino $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(CreditoDestino $entity)
    {
        $form = $this->createForm(new CreditoDestinoType(), $entity, array(
            'action' => $this->generateUrl('creditodestino_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing CreditoDestino entity.
     *
     * @Route("/{id}", name="creditodestino_update")
     * @Method("PUT")
     * @Template("uesperaBundle:CreditoDestino:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uesperaBundle:CreditoDestino')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CreditoDestino entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('creditodestino_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a CreditoDestino entity.
     *
     * @Route("/{id}", name="creditodestino_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('uesperaBundle:CreditoDestino')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CreditoDestino entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('creditodestino'));
    }

    /**
     * Creates a form to delete a CreditoDestino entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('creditodestino_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
