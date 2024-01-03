<?php
namespace model;

  class Material {
    private int $materialID;
    private string $materialName;

    function __construct(string $materialName) {
        $this->materialName = $materialName;
    }

    
    public function getMaterialID()
    {
        return $this->materialID;
    }

    public function getMaterialName()
    {
        return $this->materialName;
    }
  }



?>