<?php

namespace DAO;

use Models\Aplication as Aplication;


interface Iaplication{

    function addAplication(Aplication $aplication);
    function getAllAplication();
    function deleteAplication($id_aplication);
}
?>