<?php
namespace model;

class StructureCategory {

    private int $structureCategoryID;
    private string $structureCategoryName;

    function __construct(string $structureCategoryName){
        $this->structureCategoryName = $structureCategoryName;
    }
 
    public function getStructureCategoryID()
    {
        return $this->structureCategoryID;
    }

    public function getStructureCategoryName()
    {
        return $this->structureCategoryName;
    }
}
?>