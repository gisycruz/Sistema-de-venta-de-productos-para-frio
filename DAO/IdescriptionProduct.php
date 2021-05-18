<?php

namespace DAO;

use Models\DescriptionProduct as DescriptionProduct;

interface IdescriptionProduct{

    function addDescriptionProduct(DescriptionProduct $descriptionProduct);
    function getAllDescriptionProduc();
    function deleteDescriptionProduct($id_descriptionProduct);
    function GetDescriptionProductForId($id_dp);

}
?>