<?php
namespace model;

   class Roofplate {
      private int $roofplateID;
      private string $roofplateType;
      private string $roofplateColor;
      private string $roofplateManufacturer;
      private int $roofplateCategoryID;
      private int $materialID;

      public function __construct( string $roofplateType, string $roofplateColor, string $roofplateManufacturer, int $roofplateCategoryID, int $materialID){
          
            $this->roofplateType = $roofplateType;
            $this->roofplateColor = $roofplateColor;
            $this->roofplateManufacturer = $roofplateManufacturer;
            $this->roofplateCategoryID = $roofplateCategoryID;
            $this->materialID = $materialID;
          
      }

      public function getRoofplateID()
      {
            return $this->roofplateID;
      }

      public function getRoofplateType()
      {
            return $this->roofplateType;
      }

      public function getRoofplateColor()
      {
            return $this->roofplateColor;
      }
      public function getRoofplateManufacturer()
      {
            return $this->roofplateManufacturer;
      }

      public function getRoofplateCategoryID()
      {
            return $this->roofplateCategoryID;
      }

      public function getMaterialID()
      {
            return $this->materialID;
      }
   }









?>