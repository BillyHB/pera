<?php

namespace ues\peraBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ues\peraBundle\Entity\Cliente;
use ues\peraBundle\Form\ClienteType;

/**
 * Cliente controller.
 *
 * @Route("/cliente")
 */
class ClienteController extends Controller
{

    /**
     * Lists all Cliente entities.
     *
     * @Route("/", name="cliente")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('uesperaBundle:Cliente')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Cliente entity.
     *
     * @Route("/", name="cliente_create")
     * @Method("POST")
     * @Template("uesperaBundle:Cliente:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Cliente();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cliente_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Cliente entity.
    *
    * @param Cliente $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Cliente $entity)
    {
        $form = $this->createForm(new ClienteType(), $entity, array(
            'action' => $this->generateUrl('cliente_create'),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => 'Guardar', 'attr' => array('class' => 'guardar')));

        return $form;
    }

    /**
     * Displays a form to create a new Cliente entity.
     *
     * @Route("/new", name="cliente_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Cliente();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Cliente entity.
     *
     * @Route("/{id}", name="cliente_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uesperaBundle:Cliente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cliente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Cliente entity.
     *
     * @Route("/{id}/edit", name="cliente_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uesperaBundle:Cliente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cliente entity.');
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
    * Creates a form to edit a Cliente entity.
    *
    * @param Cliente $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Cliente $entity)
    {
        $form = $this->createForm(new ClienteType(), $entity, array(
            'action' => $this->generateUrl('cliente_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        //$form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Cliente entity.
     *
     * @Route("/{id}", name="cliente_update")
     * @Method("PUT")
     * @Template("uesperaBundle:Cliente:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uesperaBundle:Cliente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cliente entity.');
        }
        
        $originalReflabs = array();
        // Create an array of the current Tag objects in the database 
        foreach ($entity->getRefslaboral() as $reflab) { 
            $originalReflabs[] = $reflab; 
        }
        
        $originalReffams = array();
        // Create an array of the current Tag objects in the database 
        foreach ($entity->getRefsfamiliar() as $reffam) { 
            $originalReffams[] = $reffam; 
        }
        
        $originalGarants = array();
        // Create an array of the current Tag objects in the database 
        foreach ($entity->getClientegarantias() as $garan) { 
            $originalGarants[] = $garan; 
        }
        
        $originalDoms = array();
        // Create an array of the current Tag objects in the database 
        foreach ($entity->getClientedomicilio() as $dom) { 
            $originalDoms[] = $dom; 
        }
        
        //$deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            // filter $originalTags to contain tags no longer present 
            foreach ($entity->getRefslaboral() as $reflab) { 
                foreach ($originalReflabs as $key => $toDel) { 
                    if ($toDel->getId() === $reflab->getId()) { 
                        unset($originalReflabs[$key]);                         
                    } } }
                    
            foreach ($originalReflabs as $tag) { 
                $em->persist($tag);
                // if you wanted to delete the Tag entirely, you can also do that 
                $em->remove($tag);            
            }
            
            // filter $originalTags to contain tags no longer present 
            foreach ($entity->getRefsfamiliar() as $reffam) { 
                foreach ($originalReffams as $key => $toDel) { 
                    if ($toDel->getId() === $reffam->getId()) { 
                        unset($originalReffams[$key]);                         
                    } } }
                    
            foreach ($originalReffams as $tag) { 
                $em->persist($tag);
                // if you wanted to delete the Tag entirely, you can also do that 
                $em->remove($tag);            
            }
            
            // filter $originalTags to contain tags no longer present 
            foreach ($entity->getClientegarantias() as $garan) { 
                foreach ($originalGarants as $key => $toDel) { 
                    if ($toDel->getId() === $garan->getId()) { 
                        unset($originalGarants[$key]);                         
                    } } }
                    
            foreach ($originalGarants as $tag) { 
                $em->persist($tag);
                // if you wanted to delete the Tag entirely, you can also do that 
                $em->remove($tag);            
            }
            
            // filter $originalTags to contain tags no longer present 
            foreach ($entity->getClientedomicilio() as $dom) { 
                foreach ($originalDoms as $key => $toDel) { 
                    if ($toDel->getId() === $dom->getId()) { 
                        unset($originalDoms[$key]);                         
                    } } }
                    
            foreach ($originalDoms as $tag) { 
                $em->persist($tag);
                // if you wanted to delete the Tag entirely, you can also do that 
                $em->remove($tag);            
            }
            
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cliente_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            //'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Cliente entity.
     *
     * @Route("/delete/{id}", name="cliente_delete", options={"expose"=true})
     * @Method("GET")
     * @Template()
     */
    public function deleteAction($id)
    {
        //$form = $this->createDeleteForm($id);
        //$form->handleRequest($request);

        //if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('uesperaBundle:Cliente')->find($id);

            if (!$entity) {
                //throw $this->createNotFoundException('Unable to find Cliente entity.');
                $reg = array('success' => false, 'msje' => '¡Ocurrió un error!, vuelva a intentarlo.' );
            }
            else{
                $em->remove($entity);
                $em->flush();
                
                $reg = array('success' => true, 'msje' => '¡el registro se eliminó con éxito!');
            }
        //}

        //return $this->redirect($this->generateUrl('cliente'));
            return new Response( json_encode($reg) );
    }

    /**
     * Creates a form to delete a Cliente entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cliente_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
