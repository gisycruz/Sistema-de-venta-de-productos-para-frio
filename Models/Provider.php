<?php
namespace Models;

class Provider extends Person {

    private $id_provider;
    private $wed;

    /**
     * Get the value of id_provider
     */
    public function getId_provider()
    {
        return $this->id_provider;
    }

    /**
     * Set the value of id_provider
     *
     * @return  self
     */
    public function setId_provider($id_provider)
    {
        $this->id_provider = $id_provider;

        return $this;
    }

    /**
     * Get the value of wed
     */
    public function getWed()
    {
        return $this->wed;
    }

    /**
     * Set the value of wed
     *
     * @return  self
     */
    public function setWed($wed)
    {
        $this->wed = $wed;

        return $this;
    }
}

?>