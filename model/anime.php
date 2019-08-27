<?php

class Anime 
{
    private $capitulos;
    private $id;
    private $origen;
    private $tipo;
    private $autor; 
    private $studio;

    /**
     * @return mixed
     */
    public function getCapitulos()
    {
        return $this->capitulos;
    }

    /**
     * @param mixed $capitulos
     * @return anime
     */
    public function setCapitulos($capitulos)
    {
        $this->capitulos = $capitulos;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return anime
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrigen()
    {
        return $this->origen;
    }

    /**
     * @param mixed $origen
     * @return anime
     */
    public function setOrigen($origen)
    {
        $this->origen = $origen;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     * @return anime
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * @param mixed $autor
     * @return anime
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStudio()
    {
        return $this->studio;
    }

    /**
     * @param mixed $studio
     * @return anime
     */
    public function setStudio($studio)
    {
        $this->studio = $studio;
        return $this;
    }
}


?>