<?php

namespace ues\peraBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ues\peraBundle\Entity\Credito;
use ues\peraBundle\Form\CreditoType;

/**
 * Credito controller.
 *
 * @Route("/credito")
 */
class CreditoController extends Controller
{

    /**
     * Lists all Credito entities.
     *
     * @Route("/", name="credito")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('uesperaBundle:Credito')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Credito entity.
     *
     * @Route("/", name="credito_create")
     * @Method("POST")
     * @Template("uesperaBundle:Credito:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Credito();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('credito_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Credito entity.
    *
    * @param Credito $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Credito $entity)
    {
        $form = $this->createForm(new CreditoType(), $entity, array(
            'action' => $this->generateUrl('credito_create'),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => 'Guardar', 'attr' => array('class' => 'guardar')));

        return $form;
    }

    /**
     * Displays a form to create a new Credito entity.
     *
     * @Route("/new", name="credito_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Credito();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Credito entity.
     *
     * @Route("/{id}", name="credito_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uesperaBundle:Credito')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Credito entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Credito entity.
     *
     * @Route("/{id}/edit", name="credito_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uesperaBundle:Credito')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Credito entity.');
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
    * Creates a form to edit a Credito entity.
    *
    * @param Credito $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Credito $entity)
    {
        $form = $this->createForm(new CreditoType(), $entity, array(
            'action' => $this->generateUrl('credito_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        //$form->add('submit', 'submit', array('label' => 'Guardar', 'attr' => array('class' => 'guardar')));
        
        return $form;
    }
    /**
     * Edits an existing Credito entity.
     *
     * @Route("/{id}", name="credito_update")
     * @Method("PUT")
     * @Template("uesperaBundle:Credito:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uesperaBundle:Credito')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Credito entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('credito_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Credito entity.
     *
     * @Route("/delete/{id}", name="credito_delete", options={"expose"=true})
     * @Method("GET")
     * @Template()
     */
    public function deleteAction($id)
    {
        //$form = $this->createDeleteForm($id);
        //$form->handleRequest($request);

        //if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('uesperaBundle:Credito')->find($id);

            if (!$entity) {
                //throw $this->createNotFoundException('Unable to find Credito entity.');
                $reg = array('success' => false, 'msje' => '¡Ocurrió un error!, vuelva a intentarlo.' );
            }
            else{
                try{
                    $em->remove($entity);
                    $em->flush();
                    
                    $reg = array('success' => true, 'msje' => '¡el registro se eliminó con éxito!');
                }
                catch (\Exception $e){
                    
                    $reg = array('success' => false, 'msje' => "El crédito seleccionado ha sido asignado a uno o varios clientes \n y no puede ser eliminado.");
                }
            }    
            
        //}

        //return $this->redirect($this->generateUrl('credito'));
            return new Response( json_encode($reg) );    
    }

    /**
     * Creates a form to delete a Credito entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('credito_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
