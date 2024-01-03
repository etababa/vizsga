<?php
namespace model;

class RoofplateCategory {

    private int $roofplateCategoryID;
    private string $roofplateCategoryName;
   

    function __construct(string $roofplateCategoryName){
        $this->roofplateCategoryName = $roofplateCategoryName;
    }
 
    public function getRoofplateCategoryID()
    {
        return $this->roofplateCategoryID;
    }

    public function getRoofplateCategoryName()
    {
        return $this->roofplateCategoryName;
    }
}
?>