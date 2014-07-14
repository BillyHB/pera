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
            
            $codigo_gen = $this->CodCliente($entity->getPrimapellidocliente(), $entity->getSegapellidocliente()); 
            $entity->setCodigocliente( $codigo_gen );
            
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
    
    /**
     * Genera pdf.
     *
     * @Route("/{id}/pdf", name="cliente_pdf", options={"expose"=true})
     * @Method("GET")
     */
    public function pdfAction($id){
        $em = $this->getDoctrine()->getEntityManager();
        $cl = $em->getRepository('uesperaBundle:Cliente')->find($id); 
        
        $pdf = $this->container->get("white_october.tcpdf")->create(PDF_PAGE_ORIENTATION, PDF_UNIT, 'Letter', true, 'UTF-8', false);
        
        $pdf->SetAuthor('Nombre del Proyecto');
        $pdf->SetTitle('Cliente PDF');
        $pdf->SetSubject('Cliente PDF');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
        
        //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 039', PDF_HEADER_STRING);
        $pdf->SetHeaderData('', '', '', $cl->getNombrescliente().' '.$cl->getPrimapellidocliente().' '.$cl->getSegapellidocliente(), array(71,152,215), array(71,152,215));
        
        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', 15));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        
        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        //set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        //set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        
        $pdf->setFontSubsetting(true);
        
        $pdf->SetFont('dejavusans', '', 7, '', true);
        $pdf->setHtmlVSpace(
                array('h2' => array(0 => array('h' => 0.8, 'n' => 2), 1 => array('h' => 0.3, 'n' => 1)),
                      'p' => array(0 => array('h' => 1, 'n' => 2), 1 => array('h' => '', 'n' => '')),
                      'tbody' => array(0 => array('h' => '', 'n' => ''), 1 => array('h' => 2, 'n' => 2)))
                );
        $pdf->setCellHeightRatio(2);
        $pdf->setCellPaddings(5,'','','');
        
        $pdf->AddPage();
        $html = $this->renderView('uesperaBundle:Cliente:pdf.html.twig', array('entity' => $cl));
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
//$pdf->AddPage();
                
//$pdf->writeHTML($html, true, false, true, false, '');
        //$pdf->lastPage();
        
        //$pdf->Output('example_001.pdf');
        
        //$reg = array('success' => true, 'pdf' => $pdf);
        return new Response( $pdf->Output($cl->getNombrescliente().' '.$cl->getPrimapellidocliente().'.pdf', 'I') );
    }
    
    /*
     * Verifica y genera nuevo código de cliente
     */
    public function CodCliente($prim_apellido, $seg_apellido){
        
        if($seg_apellido !== null){            
            $iniciales_año = strtoupper( substr($prim_apellido, 0, 1).substr($seg_apellido, 0, 1) ).substr(date("Y"), 2);
        }else{
            $iniciales_año = strtoupper( substr($prim_apellido, 0, 2) ).substr(date("Y"), 2);
        }
            
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            "SELECT c.codigocliente FROM uesperaBundle:Cliente c
             WHERE c.codigocliente LIKE :cod 
             ORDER BY c.codigocliente DESC"
        )->setParameter('cod', $iniciales_año.'%');

        $products = $query->getResult();
        
        $correlativo_gen = intval( substr($products[0]['codigocliente'], 4) )+1;
        
        switch ( strlen($correlativo_gen) ){
            case 1: $correlativo_gen = '00'.$correlativo_gen; break;
            case 2: $correlativo_gen =  '0'.$correlativo_gen; break;
            case 3: $correlativo_gen =      $correlativo_gen; break;
        }
        
        return $iniciales_año.$correlativo_gen;    
        
    }
    
}
