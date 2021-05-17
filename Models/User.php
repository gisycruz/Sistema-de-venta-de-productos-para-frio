<?php 
namespace Models;


class User  extends Person  {

    private $id_user;
    private $password;
   
    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function getId_User()
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     *
     * @return  self
     */
    public function setId_User($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }
}

?>