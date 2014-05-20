<?php

namespace ues\peraBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ues\peraBundle\Entity\ReferenciaFamiliar;
use ues\peraBundle\Form\ReferenciaFamiliarType;

/**
 * ReferenciaFamiliar controller.
 *
 * @Route("/referenciafamiliar")
 */
class ReferenciaFamiliarController extends Controller
{

    /**
     * Lists all ReferenciaFamiliar entities.
     *
     * @Route("/", name="referenciafamiliar")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('uesperaBundle:ReferenciaFamiliar')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new ReferenciaFamiliar entity.
     *
     * @Route("/", name="referenciafamiliar_create")
     * @Method("POST")
     * @Template("uesperaBundle:ReferenciaFamiliar:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new ReferenciaFamiliar();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('referenciafamiliar_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a ReferenciaFamiliar entity.
    *
    * @param ReferenciaFamiliar $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(ReferenciaFamiliar $entity)
    {
        $form = $this->createForm(new ReferenciaFamiliarType(), $entity, array(
            'action' => $this->generateUrl('referenciafamiliar_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ReferenciaFamiliar entity.
     *
     * @Route("/new", name="referenciafamiliar_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ReferenciaFamiliar();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a ReferenciaFamiliar entity.
     *
     * @Route("/{id}", name="referenciafamiliar_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uesperaBundle:ReferenciaFamiliar')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ReferenciaFamiliar entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ReferenciaFamiliar entity.
     *
     * @Route("/{id}/edit", name="referenciafamiliar_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uesperaBundle:ReferenciaFamiliar')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ReferenciaFamiliar entity.');
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
    * Creates a form to edit a ReferenciaFamiliar entity.
    *
    * @param ReferenciaFamiliar $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ReferenciaFamiliar $entity)
    {
        $form = $this->createForm(new ReferenciaFamiliarType(), $entity, array(
            'action' => $this->generateUrl('referenciafamiliar_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ReferenciaFamiliar entity.
     *
     * @Route("/{id}", name="referenciafamiliar_update")
     * @Method("PUT")
     * @Template("uesperaBundle:ReferenciaFamiliar:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uesperaBundle:ReferenciaFamiliar')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ReferenciaFamiliar entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('referenciafamiliar_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ReferenciaFamiliar entity.
     *
     * @Route("/{id}", name="referenciafamiliar_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('uesperaBundle:ReferenciaFamiliar')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ReferenciaFamiliar entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('referenciafamiliar'));
    }

    /**
     * Creates a form to delete a ReferenciaFamiliar entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('referenciafamiliar_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
