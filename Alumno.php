<?php

class Alumno
{
    private $dni = "";
    private $nombre = "";
    private $apellido = "";
    private $email = "";
    private $codMatricula = "";
    private $ciclo = "";

    public function __construct($dni, $nombre, $apellido,$email,$codMatricula,$ciclo)
    {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->codMatricula = $codMatricula;
        $this->ciclo = $ciclo;
    }



    /**
     * @return string
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @return string
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getCodMatricula()
    {
        return $this->codMatricula;
    }

    /**
     * @return string
     */
    public function getCiclo()
    {
        return $this->ciclo;
    }

    /**
     * @param string $dni
     */
    public function setDni($dni)
    {
        $this->dni = $dni;
    }

    /**
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @param string $apellido
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param string $codMatricula
     */
    public function setCodMatricula($codMatricula)
    {
        $this->codMatricula = $codMatricula;
    }

    /**
     * @param string $ciclo
     */
    public function setCiclo($ciclo)
    {
        $this->ciclo = $ciclo;
    }

    public function __toString()
    {
        return $this->dni . " , " . $this->nombre . " , " . $this->apellido . " , " . $this->email . " , " . $this->codMatricula . " , " . $this->ciclo;
    }
    public static function getUnselizados($nombreFichero)
    {

        $s = file_get_contents($nombreFichero);
        $alumnos = unserialize($s);
        return $alumnos;
    }
}
