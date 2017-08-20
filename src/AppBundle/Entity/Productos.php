<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Productos
 *
 * @ORM\Table(name="productos", uniqueConstraints={@ORM\UniqueConstraint(name="sku_UNIQUE", columns={"sku"})})
 * @ORM\Entity
 */
class Productos
{
    /**
     * @var string
     *
     * @ORM\Column(name="sku", type="string", length=45, nullable=false)
     */
    private $sku;

    /**
     * @var float
     *
     * @ORM\Column(name="valor", type="float", precision=10, scale=0, nullable=false)
     */
    private $valor;

    /**
     * @var integer
     *
     * @ORM\Column(name="inventario", type="integer", nullable=true)
     */
    private $inventario;

    /**
     * @var integer
     *
     * @ORM\Column(name="estado", type="integer", nullable=false)
     */
    private $estado = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="idproducto", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idproducto;


}

