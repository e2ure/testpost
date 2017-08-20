<?php

namespace AppBundle\Controller;

use AppBundle\Entity\PuntosCompras;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Puntoscompra controller.
 *
 * @Route("puntoscompras")
 */
class PuntosComprasController extends Controller
{
    /**
     * Lists all puntosCompra entities.
     *
     * @Route("/", name="puntoscompras_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $puntosCompras = $em->getRepository('AppBundle:PuntosCompras')->findAll();

        return $this->render('puntoscompras/index.html.twig', array(
            'puntosCompras' => $puntosCompras,
        ));
    }

    /**
     * Creates a new puntosCompra entity.
     *
     * @Route("/new", name="puntoscompras_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $puntosCompra = new Puntoscompra();
        $form = $this->createForm('AppBundle\Form\PuntosComprasType', $puntosCompra);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($puntosCompra);
            $em->flush();

            return $this->redirectToRoute('puntoscompras_show', array('idpuntoscompra' => $puntosCompra->getIdpuntoscompra()));
        }

        return $this->render('puntoscompras/new.html.twig', array(
            'puntosCompra' => $puntosCompra,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a puntosCompra entity.
     *
     * @Route("/{idpuntoscompra}", name="puntoscompras_show")
     * @Method("GET")
     */
    public function showAction(PuntosCompras $puntosCompra)
    {
        $deleteForm = $this->createDeleteForm($puntosCompra);

        return $this->render('puntoscompras/show.html.twig', array(
            'puntosCompra' => $puntosCompra,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing puntosCompra entity.
     *
     * @Route("/{idpuntoscompra}/edit", name="puntoscompras_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, PuntosCompras $puntosCompra)
    {
        $deleteForm = $this->createDeleteForm($puntosCompra);
        $editForm = $this->createForm('AppBundle\Form\PuntosComprasType', $puntosCompra);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('puntoscompras_edit', array('idpuntoscompra' => $puntosCompra->getIdpuntoscompra()));
        }

        return $this->render('puntoscompras/edit.html.twig', array(
            'puntosCompra' => $puntosCompra,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a puntosCompra entity.
     *
     * @Route("/{idpuntoscompra}", name="puntoscompras_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, PuntosCompras $puntosCompra)
    {
        $form = $this->createDeleteForm($puntosCompra);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($puntosCompra);
            $em->flush();
        }

        return $this->redirectToRoute('puntoscompras_index');
    }

    /**
     * Creates a form to delete a puntosCompra entity.
     *
     * @param PuntosCompras $puntosCompra The puntosCompra entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PuntosCompras $puntosCompra)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('puntoscompras_delete', array('idpuntoscompra' => $puntosCompra->getIdpuntoscompra())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
