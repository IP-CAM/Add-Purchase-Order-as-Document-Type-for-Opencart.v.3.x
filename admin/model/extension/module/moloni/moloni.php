<?php
/* Moloni -
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ModelExtensionModuleMoloniMoloni extends Model
{

    public $teste = "1";
    private $libraries = array(
        "connection" => "connection.class.php"
    );
    public $settings;
    public $customer;

    public function loadLibrary()
    {
        echo "<br>" . __CLASS__ . __FUNCTION__ . "<br>";
        foreach ($this->libraries as $name => $library) {
            require_once("library/" . $library);
            $class = 'moloni\\' . $name;
            $this->{$name} = new $class($this);
        }

        $this->connection->access_token = "1a0c8b3449be466a03fa3329c5b2875b66fcc8ea";
        $this->connection->expire_date = strtotime("-80 minutes");
        $this->connection->refresh_token = "d45d98d93fd5b319efd36d5dedefc18283f670f4";

        $status = $this->connection->start();
        if ($status) {
            echo "Yey";
        } else {
            echo $this->connection->messages['title'];
        }
    }
}
