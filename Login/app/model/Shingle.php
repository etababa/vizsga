<?php
namespace model;

   class Shingle {
private int $shingleID;
private string $shingleType;
private string $shingleColor;
private string $shingleManufacturer;
private int $shingleCategoryID;
private int $materialID;


public function __construct(string $shingleType,string $shingleColor, string $shingleManufacturer, int $shingleCategoryID, int $materialID)
{
    $this->shingleType = $shingleType;
    $this->shingleColor = $shingleColor;
    $this->shingleManufacturer = $shingleManufacturer;
    $this->shingleCategoryID = $shingleCategoryID;
    $this->materialID = $materialID;
}

public function getShingleID()
{
return $this->shingleID;
}


public function getShingleType()
{
return $this->shingleType;
}

public function getShingleColor()
{
return $this->shingleColor;
}
 
public function getShingleManufacturer()
{
return $this->shingleManufacturer;
}

public function getShingleCategoryID()
{
return $this->shingleCategoryID;
}

public function getMaterialID()
{
return $this->materialID;
}
   }

?>