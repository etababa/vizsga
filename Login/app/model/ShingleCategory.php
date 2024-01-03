<?php
namespace model;

  class ShingleCategory {
    private int $shingleCategoryID;
    private string $shingleCategoryName;

    function __construct(string $shingleCategoryName) {
        $this->shingleCategoryName = $shingleCategoryName;
    }


    public function getShingleCategoryID()
    {
        return $this->shingleCategoryID;
    }
 
    public function getShingleCategoryName()
    {
        return $this->shingleCategoryName;
    }
  }

?>