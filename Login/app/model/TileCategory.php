<?php
namespace model;

  class TileCategory {
    private int $tileCategoryID;
    private string $tileCategoryName;
   

    function __construct(string $tileCategoryName) {
        $this->tileCategoryName = $tileCategoryName;
       
    }

    public function getTileCategoryID()
    {
        return $this->tileCategoryID;
    }

    public function getTileCategoryName()
    {
        return $this->tileCategoryName;
    }
  }



?>