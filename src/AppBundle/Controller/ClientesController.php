<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Clientes;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Cliente controller.
 *
 * @Route("clientes")
 */
class ClientesController extends Controller
{
    /**
     * Lists all cliente entities.
     *
     * @Route("/", name="clientes_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $clientes = $em->getRepository('AppBundle:Clientes')->findAll();

        return $this->render('clientes/index.html.twig', array(
            'clientes' => $clientes,
        ));
    }

    /**
     * Creates a new cliente entity.
     *
     * @Route("/new", name="clientes_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cliente = new Clientes();
        $form = $this->createForm('AppBundle\Form\ClientesType', $cliente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cliente);
            $em->flush();

            return $this->redirectToRoute('clientes_show', array('idcliente' => $cliente->getIdcliente()));
        }

        return $this->render('clientes/new.html.twig', array(
            'cliente' => $cliente,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cliente entity.
     *
     * @Route("/{idcliente}", name="clientes_show")
     * @Method("GET")
     */
    public function showAction(Clientes $cliente)
    {
        $deleteForm = $this->createDeleteForm($cliente);

        return $this->render('clientes/show.html.twig', array(
            'cliente' => $cliente,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cliente entity.
     *
     * @Route("/{idcliente}/edit", name="clientes_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Clientes $cliente)
    {
        $deleteForm = $this->createDeleteForm($cliente);
        $editForm = $this->createForm('AppBundle\Form\ClientesType', $cliente);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('clientes_edit', array('idcliente' => $cliente->getIdcliente()));
        }

        return $this->render('clientes/edit.html.twig', array(
            'cliente' => $cliente,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cliente entity.
     *
     * @Route("/{idcliente}", name="clientes_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Clientes $cliente)
    {
        $form = $this->createDeleteForm($cliente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cliente);
            $em->flush();
        }

        return $this->redirectToRoute('clientes_index');
    }

    /**
     * Creates a form to delete a cliente entity.
     *
     * @param Clientes $cliente The cliente entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Clientes $cliente)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('clientes_delete', array('idcliente' => $cliente->getIdcliente())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
