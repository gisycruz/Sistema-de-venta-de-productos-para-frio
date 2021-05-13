<?php

namespace DAO;

use Models\DescriptionProduct as DescriptionProduct;

interface IdescriptionProduct{

    function addDescriptionProduc(DescriptionProduct $descriptionProduct);
    function getAllDescriptionProduc();
    function deleteDescriptionProduct($id_descriptionProduct);
    function GetDescriptionProductForId($id_dp);

}
?>