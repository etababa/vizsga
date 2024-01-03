<?php
namespace model;

  class Accessory {
    private int $accessoryID;
    private string $accessoryName;
    private int $materialID;

    function __construct(string $accessoryName, int $materialID) {
        $this->accessoryName = $accessoryName;
        $this->materialID = $materialID;
    }

  
    public function getAccessoryID()
    {
        return $this->accessoryID;
    }

   
    public function getAccessoryName()
    {
        return $this->accessoryName;
    }

   
    public function getMaterialID()
    {
        return $this->materialID;
    }
  }



?>