<?php

namespace DAO;

use Models\Brand as Brand;

interface Ibrand{

    function getAllbrand();
    function addBrand(Brand $brand);
    function deleteBrand($id_brand);
    function ModifyBrand($id_brand,$name);
    function GetBrandForId($id_brand);
}