<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Productos;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Producto controller.
 *
 * @Route("productos")
 */
class ProductosController extends Controller
{
    /**
     * Lists all producto entities.
     *
     * @Route("/", name="productos_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $productos = $em->getRepository('AppBundle:Productos')->findAll();

        return $this->render('productos/index.html.twig', array(
            'productos' => $productos,
        ));
    }

    /**
     * Creates a new producto entity.
     *
     * @Route("/new", name="productos_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $producto = new Producto();
        $form = $this->createForm('AppBundle\Form\ProductosType', $producto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($producto);
            $em->flush();

            return $this->redirectToRoute('productos_show', array('idproducto' => $producto->getIdproducto()));
        }

        return $this->render('productos/new.html.twig', array(
            'producto' => $producto,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a producto entity.
     *
     * @Route("/{idproducto}", name="productos_show")
     * @Method("GET")
     */
    public function showAction(Productos $producto)
    {
        $deleteForm = $this->createDeleteForm($producto);

        return $this->render('productos/show.html.twig', array(
            'producto' => $producto,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing producto entity.
     *
     * @Route("/{idproducto}/edit", name="productos_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Productos $producto)
    {
        $deleteForm = $this->createDeleteForm($producto);
        $editForm = $this->createForm('AppBundle\Form\ProductosType', $producto);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('productos_edit', array('idproducto' => $producto->getIdproducto()));
        }

        return $this->render('productos/edit.html.twig', array(
            'producto' => $producto,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a producto entity.
     *
     * @Route("/{idproducto}", name="productos_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Productos $producto)
    {
        $form = $this->createDeleteForm($producto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($producto);
            $em->flush();
        }

        return $this->redirectToRoute('productos_index');
    }

    /**
     * Creates a form to delete a producto entity.
     *
     * @param Productos $producto The producto entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Productos $producto)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('productos_delete', array('idproducto' => $producto->getIdproducto())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
