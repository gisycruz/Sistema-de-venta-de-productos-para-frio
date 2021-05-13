<?php

namespace DAO;

use Models\Power as Power;

interface Ipower{

    function addPower(Power $power);
    function GetAllPower();
    function deletePower($id_power);
}

?>