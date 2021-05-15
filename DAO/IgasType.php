<?php 

namespace DAO;
use Models\GasType as GasType;

interface IgasType{

    function addGasType(GasType $gasType);
    function getAllgasType();
    function deleteGasType($id_gasType);
    function ModifyGasType($id_gasType,$name);
    function GetGasTypeForId($id_gasType);
}

?>