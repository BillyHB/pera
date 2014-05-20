<?php

namespace ues\peraBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ues\peraBundle\Entity\GastosFamiliares;
use ues\peraBundle\Form\GastosFamiliaresType;

/**
 * GastosFamiliares controller.
 *
 * @Route("/gastosfamiliares")
 */
class GastosFamiliaresController extends Controller
{

    /**
     * Lists all GastosFamiliares entities.
     *
     * @Route("/", name="gastosfamiliares")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('uesperaBundle:GastosFamiliares')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new GastosFamiliares entity.
     *
     * @Route("/", name="gastosfamiliares_create")
     * @Method("POST")
     * @Template("uesperaBundle:GastosFamiliares:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new GastosFamiliares();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('gastosfamiliares_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a GastosFamiliares entity.
    *
    * @param GastosFamiliares $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(GastosFamiliares $entity)
    {
        $form = $this->createForm(new GastosFamiliaresType(), $entity, array(
            'action' => $this->generateUrl('gastosfamiliares_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new GastosFamiliares entity.
     *
     * @Route("/new", name="gastosfamiliares_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new GastosFamiliares();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a GastosFamiliares entity.
     *
     * @Route("/{id}", name="gastosfamiliares_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uesperaBundle:GastosFamiliares')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find GastosFamiliares entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing GastosFamiliares entity.
     *
     * @Route("/{id}/edit", name="gastosfamiliares_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uesperaBundle:GastosFamiliares')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find GastosFamiliares entity.');
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
    * Creates a form to edit a GastosFamiliares entity.
    *
    * @param GastosFamiliares $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(GastosFamiliares $entity)
    {
        $form = $this->createForm(new GastosFamiliaresType(), $entity, array(
            'action' => $this->generateUrl('gastosfamiliares_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing GastosFamiliares entity.
     *
     * @Route("/{id}", name="gastosfamiliares_update")
     * @Method("PUT")
     * @Template("uesperaBundle:GastosFamiliares:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uesperaBundle:GastosFamiliares')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find GastosFamiliares entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('gastosfamiliares_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a GastosFamiliares entity.
     *
     * @Route("/{id}", name="gastosfamiliares_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('uesperaBundle:GastosFamiliares')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find GastosFamiliares entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('gastosfamiliares'));
    }

    /**
     * Creates a form to delete a GastosFamiliares entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('gastosfamiliares_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
