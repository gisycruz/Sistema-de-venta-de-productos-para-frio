<?php 

namespace DAO;
use Models\Industry as Industry;

interface Iindustry{

    function addIndustry(Industry $Industry);
    function getAllIndustry();
    function deleteIndustry($id_Industry);
    function ModifyIndustry($id_Industry,$name);
    function GetIndustryForId($id_Industry);
}

?>