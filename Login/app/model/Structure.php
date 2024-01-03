<?php
namespace model;

  class Structure {
    private int $structureID;
    private int $structureCategoryID;
    private string $wood;
    private string $thickness;
    private string $width;
    private string $length;
    private bool $treatment;
    private int $materialID;

    function __construct(int $structureCategoryID, string $wood, string $thickness,string $width,string $length, bool $treatment, int $materialID) {
        $this->structureCategoryID = $structureCategoryID;
        $this->wood = $wood;
        $this->thickness = $thickness;
        $this->width = $width;
        $this->length = $length;
        $this->treatment = $treatment;
        $this->materialID = $materialID;
    }


    public function getStructureID()
    {
        return $this->structureID;
    }

    public function getStructureCategoryID()
    {
        return $this->structureCategoryID;
    }

    public function getWood()
    {
        return $this->wood;
    }

    public function getThickness()
    {
        return $this->thickness;
    }

    public function getWidth()
    {
        return $this->width;
    }
 
    public function getLength()
    {
        return $this->length;
    }

    public function getTreatment()
    {
        return $this->treatment;
    }

    public function getMaterialID()
    {
        return $this->materialID;
    }
}
?>