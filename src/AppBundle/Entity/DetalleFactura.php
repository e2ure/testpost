<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetalleFactura
 *
 * @ORM\Table(name="detalle_factura", indexes={@ORM\Index(name="fk_detalle_factura_factura1_idx", columns={"idfactura"}), @ORM\Index(name="fk_detalle_factura_productos1_idx", columns={"idproducto"})})
 * @ORM\Entity
 */
class DetalleFactura
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_detalle", type="datetime", nullable=false)
     */
    private $fechaDetalle = 'CURRENT_TIMESTAMP';

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer", nullable=false)
     */
    private $cantidad;

    /**
     * @var float
     *
     * @ORM\Column(name="subtotal", type="float", precision=10, scale=0, nullable=false)
     */
    private $subtotal;

    /**
     * @var integer
     *
     * @ORM\Column(name="iddetallefactura", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iddetallefactura;

    /**
     * @var \AppBundle\Entity\Productos
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Productos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idproducto", referencedColumnName="idproducto")
     * })
     */
    private $idproducto;

    /**
     * @var \AppBundle\Entity\Factura
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Factura")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idfactura", referencedColumnName="idfactura")
     * })
     */
    private $idfactura;


}

