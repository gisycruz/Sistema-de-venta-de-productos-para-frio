<?php

namespace DAO;

use Models\Power as Power;

interface Ipower{

    function addPower(Power $power);
    function GetAllPower();
    function deletePower($id_power);
    function ModifyPower($id_Power,$description);
    function GetPowerForId($id_power);
}

?>