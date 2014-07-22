<?php

namespace ues\peraBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ues\peraBundle\Entity\Garantia;
use ues\peraBundle\Form\GarantiaType;

/**
 * Garantia controller.
 *
 * @Route("/garantia")
 */
class GarantiaController extends Controller
{

    /**
     * Lists all Garantia entities.
     *
     * @Route("/", name="garantia")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('uesperaBundle:Garantia')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Garantia entity.
     *
     * @Route("/", name="garantia_create")
     * @Method("POST")
     * @Template("uesperaBundle:Garantia:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Garantia();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('garantia'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Garantia entity.
    *
    * @param Garantia $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Garantia $entity)
    {
        $form = $this->createForm(new GarantiaType(), $entity, array(
            'action' => $this->generateUrl('garantia_create'),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Garantia entity.
     *
     * @Route("/new", name="garantia_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Garantia();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Garantia entity.
     *
     * @Route("/{id}", name="garantia_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uesperaBundle:Garantia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Garantia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Garantia entity.
     *
     * @Route("/{id}/edit", name="garantia_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uesperaBundle:Garantia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Garantia entity.');
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
    * Creates a form to edit a Garantia entity.
    *
    * @param Garantia $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Garantia $entity)
    {
        $form = $this->createForm(new GarantiaType(), $entity, array(
            'action' => $this->generateUrl('garantia_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        //$form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Garantia entity.
     *
     * @Route("/{id}", name="garantia_update")
     * @Method("PUT")
     * @Template("uesperaBundle:Garantia:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uesperaBundle:Garantia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Garantia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            //return $this->redirect($this->generateUrl('garantia_edit', array('id' => $id)));
            return $this->redirect($this->generateUrl('garantia'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Garantia entity.
     *
     * @Route("/delete/{id}", name="garantia_delete", options={"expose"=true})
     * @Method("GET")
     */
    public function deleteAction(Request $request, $id)
    {
        //$form = $this->createDeleteForm($id);
        //$form->handleRequest($request);

        //if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('uesperaBundle:Garantia')->find($id);

            if (!$entity) {
                //throw $this->createNotFoundException('Unable to find Garantia entity.');
                $reg = array('success' => false, 'msje' => '¡Ocurrió un error!, vuelva a intentarlo.' );
            }
            else{
                try{
                    $em->remove($entity);
                    $em->flush();
                    
                    $reg = array('success' => true, 'msje' => '¡el registro se eliminó con éxito!');
                }
                catch (\Exception $e){
                    
                    $reg = array('success' => false, 'msje' => "La garantía seleccionada ha sido asignada a uno o varios clientes y no puede ser eliminada.");
                }
            }
            
        //}

        //return $this->redirect($this->generateUrl('garantia'));
            return new Response( json_encode($reg) );
    }

    /**
     * Creates a form to delete a Garantia entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('garantia_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
