<?php 

namespace DAO;
use Models\Provider as Provider;

interface IProvider{

    function addProvider(Provider $Provider);
    function getAllProvider();
    function deleteProvider($id_Provider);
    function ModifyProvider($id_Provider,$dni,$name,$lastName , $address , $phone , $email , $wed);
    function GetProviderForId($id_Provider);
}

?>