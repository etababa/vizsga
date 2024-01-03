<?php
namespace model;

class TerracefloorCategory {

    private int $terracefloorCategoryID;
    private string $terracefloorCategoryName;
   

    function __construct(string $terracefloorCategoryName){
        $this->terracefloorCategoryName = $terracefloorCategoryName;
    }


    public function getTerracefloorCategoryID()
    {
        return $this->terracefloorCategoryID;
    }
 
    public function getTerracefloorCategoryName()
    {
        return $this->terracefloorCategoryName;
    }
}
?>