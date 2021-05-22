<?php

namespace DAO;

use Models\Product as Product;

interface Iproduct{

     function addProduct(Product $product);
     function getAllProduct();
     function deleteProduct($id_product);
     //falta
}

?>