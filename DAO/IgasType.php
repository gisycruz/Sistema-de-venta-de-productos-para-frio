<?php 

namespace DAO;
use Models\GasType as GasType;

interface IgasType{

    function addGasType(GasType $gasType);
    function getAllgasType();
    function deleteGasType($id_gasType);
    function GetGasTypeForId($id_gasType);
}

?>