<?php

namespace ues\peraBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ues\peraBundle\Entity\ClienteCredito;
use ues\peraBundle\Form\ClienteCreditoType;

/**
 * ClienteCredito controller.
 *
 * @Route("/clientecredito")
 */
class ClienteCreditoController extends Controller
{

    /**
     * Lists all ClienteCredito entities.
     *
     * @Route("/", name="clientecredito")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('uesperaBundle:ClienteCredito')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new ClienteCredito entity.
     *
     * @Route("/", name="clientecredito_create")
     * @Method("POST")
     * @Template("uesperaBundle:ClienteCredito:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new ClienteCredito();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('clientecredito'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a ClienteCredito entity.
    *
    * @param ClienteCredito $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(ClienteCredito $entity)
    {
        $form = $this->createForm(new ClienteCreditoType( $this->getDestinosCh() ), $entity, array(
            'action' => $this->generateUrl('clientecredito_create'),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ClienteCredito entity.
     *
     * @Route("/new", name="clientecredito_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ClienteCredito();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a ClienteCredito entity.
     *
     * @Route("/{id}", name="clientecredito_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uesperaBundle:ClienteCredito')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ClienteCredito entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ClienteCredito entity.
     *
     * @Route("/{id}/edit", name="clientecredito_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uesperaBundle:ClienteCredito')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ClienteCredito entity.');
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
    * Creates a form to edit a ClienteCredito entity.
    *
    * @param ClienteCredito $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ClienteCredito $entity)
    {
        $form = $this->createForm(new ClienteCreditoType( $this->getDestinosCh() ), $entity, array(
            'action' => $this->generateUrl('clientecredito_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        //$form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ClienteCredito entity.
     *
     * @Route("/{id}", name="clientecredito_update")
     * @Method("PUT")
     * @Template("uesperaBundle:ClienteCredito:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uesperaBundle:ClienteCredito')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ClienteCredito entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            //return $this->redirect($this->generateUrl('clientecredito_edit', array('id' => $id)));
            return $this->redirect($this->generateUrl('clientecredito'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ClienteCredito entity.
     *
     * @Route("/delete/{id}", name="clientecredito_delete", options={"expose"=true})
     * @Method("GET")
     * @Template()
     */
    public function deleteAction($id)
    {
        
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('uesperaBundle:ClienteCredito')->find($id);

        if (!$entity) {
            $reg = array('success' => false, 'msje' => '¡Ocurrió un error!, vuelva a intentarlo.' );
            //throw $this->createNotFoundException('Unable to find ClienteCredito entity.');
        }
        else{
            $em->remove($entity);
            $em->flush();

            $reg = array('success' => true, 'msje' => '¡el registro se eliminó con éxito!');
        }
        
        return new Response( json_encode($reg) );
        //return $this->redirect($this->generateUrl('clientecredito'));
    }

    /**
     * Creates a form to delete a ClienteCredito entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('clientecredito_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
    /*
     * Obtiene el listado de todos los destinos de credito y los envia al formulario
     */
    public function getDestinosCh(){
        
        $destinos = array();
        
        $em = $this->getDoctrine()->getEntityManager();

        $result = $em->getRepository('uesperaBundle:Destino')->findAll();
        
        foreach ($result as $dest){
            $destinos[ $dest->getNomdestino() ] = $dest->getNomdestino();
        }
        
        return $destinos;
        
    }
    
    /**
     * @Route("/destinos/get", name="get_destinos", options={"expose"=true})
     * @Method("GET")
     */
    public function getDestinosAction() {
        
        $request = $this->getRequest();
        $idCredito = $request->get('idCredito');
        $em = $this->getDoctrine()->getEntityManager();
        
        $dql = "SELECT des.nomdestino FROM uesperaBundle:CreditoDestino cd
                JOIN cd.iddestino des
                    WHERE des.id = cd.iddestino
                    AND cd.idcredito = :idCredito";
        
        $destinos['regs'] = $em->createQuery($dql)
                ->setParameter('idCredito', $idCredito)
                ->getArrayResult();
        
        return new Response(json_encode($destinos));
    }
}
