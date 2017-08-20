<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Clientes
 *
 * @ORM\Table(name="clientes", uniqueConstraints={@ORM\UniqueConstraint(name="dni_UNIQUE", columns={"dni"})})
 * @ORM\Entity
 */
class Clientes
{
    /**
     * @var string
     *
     * @ORM\Column(name="dni", type="string", length=30, nullable=false)
     */
    private $dni;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=45, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido1", type="string", length=45, nullable=false)
     */
    private $apellido1;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido2", type="string", length=45, nullable=true)
     */
    private $apellido2;

    /**
     * @var integer
     *
     * @ORM\Column(name="telefono", type="integer", nullable=true)
     */
    private $telefono;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_nacimiento", type="date", nullable=true)
     */
    private $fechaNacimiento;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_ingreso", type="datetime", nullable=false)
     */
    private $fechaIngreso ;

    /**
     * @var float
     *
     * @ORM\Column(name="saldo_cashback", type="float", precision=10, scale=0, nullable=true)
     */
    private $saldoCashback;

    /**
     * @var integer
     *
     * @ORM\Column(name="estado", type="integer", nullable=false)
     */
    private $estado = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="idcliente", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcliente;

    function getDni() {
        return $this->dni;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido1() {
        return $this->apellido1;
    }

    function getApellido2() {
        return $this->apellido2;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    function getFechaIngreso() {
        return $this->fechaIngreso;
    }

    function getSaldoCashback() {
        return $this->saldoCashback;
    }

    function getEstado() {
        return $this->estado;
    }

    function getIdcliente() {
        return $this->idcliente;
    }

    function setDni($dni) {
        $this->dni = $dni;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido1($apellido1) {
        $this->apellido1 = $apellido1;
    }

    function setApellido2($apellido2) {
        $this->apellido2 = $apellido2;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setFechaNacimiento(\DateTime $fechaNacimiento) {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    function setFechaIngreso(\DateTime $fechaIngreso) {
        $this->fechaIngreso = $fechaIngreso;
    }

    function setSaldoCashback($saldoCashback) {
        $this->saldoCashback = $saldoCashback;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setIdcliente($idcliente) {
        $this->idcliente = $idcliente;
    }


}

