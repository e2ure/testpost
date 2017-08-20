<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PuntosCompras
 *
 * @ORM\Table(name="puntos_compras", indexes={@ORM\Index(name="fk_puntos_compras_factura1_idx", columns={"idfactura"}), @ORM\Index(name="fk_puntos_compras_clientes1_idx", columns={"idcliente"})})
 * @ORM\Entity
 */
class PuntosCompras
{
    /**
     * @var float
     *
     * @ORM\Column(name="puntos_obtenidos", type="float", precision=10, scale=0, nullable=false)
     */
    private $puntosObtenidos;

    /**
     * @var integer
     *
     * @ORM\Column(name="redimidos", type="integer", nullable=false)
     */
    private $redimidos = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_compra", type="datetime", nullable=false)
     */
    private $fechaCompra = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_redimidos", type="datetime", nullable=true)
     */
    private $fechaRedimidos;

    /**
     * @var integer
     *
     * @ORM\Column(name="idpuntoscompra", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpuntoscompra;

    /**
     * @var \AppBundle\Entity\Factura
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Factura")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idfactura", referencedColumnName="idfactura")
     * })
     */
    private $idfactura;

    /**
     * @var \AppBundle\Entity\Clientes
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Clientes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcliente", referencedColumnName="idcliente")
     * })
     */
    private $idcliente;


}

