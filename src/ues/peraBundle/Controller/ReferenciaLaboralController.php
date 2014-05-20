<?php

namespace ues\peraBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ues\peraBundle\Entity\ReferenciaLaboral;
use ues\peraBundle\Form\ReferenciaLaboralType;

/**
 * ReferenciaLaboral controller.
 *
 * @Route("/referencialaboral")
 */
class ReferenciaLaboralController extends Controller
{

    /**
     * Lists all ReferenciaLaboral entities.
     *
     * @Route("/", name="referencialaboral")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('uesperaBundle:ReferenciaLaboral')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new ReferenciaLaboral entity.
     *
     * @Route("/", name="referencialaboral_create")
     * @Method("POST")
     * @Template("uesperaBundle:ReferenciaLaboral:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new ReferenciaLaboral();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('referencialaboral_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a ReferenciaLaboral entity.
    *
    * @param ReferenciaLaboral $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(ReferenciaLaboral $entity)
    {
        $form = $this->createForm(new ReferenciaLaboralType(), $entity, array(
            'action' => $this->generateUrl('referencialaboral_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ReferenciaLaboral entity.
     *
     * @Route("/new", name="referencialaboral_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ReferenciaLaboral();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a ReferenciaLaboral entity.
     *
     * @Route("/{id}", name="referencialaboral_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uesperaBundle:ReferenciaLaboral')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ReferenciaLaboral entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ReferenciaLaboral entity.
     *
     * @Route("/{id}/edit", name="referencialaboral_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uesperaBundle:ReferenciaLaboral')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ReferenciaLaboral entity.');
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
    * Creates a form to edit a ReferenciaLaboral entity.
    *
    * @param ReferenciaLaboral $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ReferenciaLaboral $entity)
    {
        $form = $this->createForm(new ReferenciaLaboralType(), $entity, array(
            'action' => $this->generateUrl('referencialaboral_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ReferenciaLaboral entity.
     *
     * @Route("/{id}", name="referencialaboral_update")
     * @Method("PUT")
     * @Template("uesperaBundle:ReferenciaLaboral:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uesperaBundle:ReferenciaLaboral')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ReferenciaLaboral entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('referencialaboral_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ReferenciaLaboral entity.
     *
     * @Route("/{id}", name="referencialaboral_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('uesperaBundle:ReferenciaLaboral')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ReferenciaLaboral entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('referencialaboral'));
    }

    /**
     * Creates a form to delete a ReferenciaLaboral entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('referencialaboral_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
