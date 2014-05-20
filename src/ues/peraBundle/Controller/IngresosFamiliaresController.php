<?php

namespace ues\peraBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ues\peraBundle\Entity\IngresosFamiliares;
use ues\peraBundle\Form\IngresosFamiliaresType;

/**
 * IngresosFamiliares controller.
 *
 * @Route("/ingresosfamiliares")
 */
class IngresosFamiliaresController extends Controller
{

    /**
     * Lists all IngresosFamiliares entities.
     *
     * @Route("/", name="ingresosfamiliares")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('uesperaBundle:IngresosFamiliares')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new IngresosFamiliares entity.
     *
     * @Route("/", name="ingresosfamiliares_create")
     * @Method("POST")
     * @Template("uesperaBundle:IngresosFamiliares:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new IngresosFamiliares();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ingresosfamiliares_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a IngresosFamiliares entity.
    *
    * @param IngresosFamiliares $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(IngresosFamiliares $entity)
    {
        $form = $this->createForm(new IngresosFamiliaresType(), $entity, array(
            'action' => $this->generateUrl('ingresosfamiliares_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new IngresosFamiliares entity.
     *
     * @Route("/new", name="ingresosfamiliares_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new IngresosFamiliares();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a IngresosFamiliares entity.
     *
     * @Route("/{id}", name="ingresosfamiliares_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uesperaBundle:IngresosFamiliares')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find IngresosFamiliares entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing IngresosFamiliares entity.
     *
     * @Route("/{id}/edit", name="ingresosfamiliares_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uesperaBundle:IngresosFamiliares')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find IngresosFamiliares entity.');
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
    * Creates a form to edit a IngresosFamiliares entity.
    *
    * @param IngresosFamiliares $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(IngresosFamiliares $entity)
    {
        $form = $this->createForm(new IngresosFamiliaresType(), $entity, array(
            'action' => $this->generateUrl('ingresosfamiliares_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing IngresosFamiliares entity.
     *
     * @Route("/{id}", name="ingresosfamiliares_update")
     * @Method("PUT")
     * @Template("uesperaBundle:IngresosFamiliares:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uesperaBundle:IngresosFamiliares')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find IngresosFamiliares entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('ingresosfamiliares_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a IngresosFamiliares entity.
     *
     * @Route("/{id}", name="ingresosfamiliares_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('uesperaBundle:IngresosFamiliares')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find IngresosFamiliares entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ingresosfamiliares'));
    }

    /**
     * Creates a form to delete a IngresosFamiliares entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ingresosfamiliares_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
