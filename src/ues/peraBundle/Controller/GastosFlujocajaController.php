<?php

namespace ues\peraBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ues\peraBundle\Entity\GastosFlujocaja;
use ues\peraBundle\Form\GastosFlujocajaType;

/**
 * GastosFlujocaja controller.
 *
 * @Route("/gastosflujocaja")
 */
class GastosFlujocajaController extends Controller
{

    /**
     * Lists all GastosFlujocaja entities.
     *
     * @Route("/", name="gastosflujocaja")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('uesperaBundle:GastosFlujocaja')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new GastosFlujocaja entity.
     *
     * @Route("/", name="gastosflujocaja_create")
     * @Method("POST")
     * @Template("uesperaBundle:GastosFlujocaja:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new GastosFlujocaja();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('gastosflujocaja_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a GastosFlujocaja entity.
    *
    * @param GastosFlujocaja $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(GastosFlujocaja $entity)
    {
        $form = $this->createForm(new GastosFlujocajaType(), $entity, array(
            'action' => $this->generateUrl('gastosflujocaja_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new GastosFlujocaja entity.
     *
     * @Route("/new", name="gastosflujocaja_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new GastosFlujocaja();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a GastosFlujocaja entity.
     *
     * @Route("/{id}", name="gastosflujocaja_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uesperaBundle:GastosFlujocaja')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find GastosFlujocaja entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing GastosFlujocaja entity.
     *
     * @Route("/{id}/edit", name="gastosflujocaja_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uesperaBundle:GastosFlujocaja')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find GastosFlujocaja entity.');
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
    * Creates a form to edit a GastosFlujocaja entity.
    *
    * @param GastosFlujocaja $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(GastosFlujocaja $entity)
    {
        $form = $this->createForm(new GastosFlujocajaType(), $entity, array(
            'action' => $this->generateUrl('gastosflujocaja_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing GastosFlujocaja entity.
     *
     * @Route("/{id}", name="gastosflujocaja_update")
     * @Method("PUT")
     * @Template("uesperaBundle:GastosFlujocaja:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uesperaBundle:GastosFlujocaja')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find GastosFlujocaja entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('gastosflujocaja_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a GastosFlujocaja entity.
     *
     * @Route("/{id}", name="gastosflujocaja_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('uesperaBundle:GastosFlujocaja')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find GastosFlujocaja entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('gastosflujocaja'));
    }

    /**
     * Creates a form to delete a GastosFlujocaja entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('gastosflujocaja_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
