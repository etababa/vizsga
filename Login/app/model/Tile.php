<?php
namespace model;

    class Tile {
        private int $tileID;
        private string $tileType;
        private string $tileColor;
        private string $tileManufacturer;
        private int $tileCategoryID;
        private int $materialID;
    
        function __construct(string $tileType, string $tileColor, string $tileManufacturer, int $tileCategoryID, int $materialID){
            $this->tileType = $tileType;
            $this->tileColor = $tileColor;
            $this->tileManufacturer = $tileManufacturer;
            $this->tileCategoryID = $tileCategoryID;
            $this->materialID = $materialID;
            
        }

        public function getTileID()
        {
                return $this->tileID;
        }

        public function getTileType()
        {
                return $this->tileType;
        }

        public function getTileColor()
        {
                return $this->tileColor;
        }

        public function getTileManufacturer()
        {
                return $this->tileManufacturer;
        }

        public function getTileCategoryID()
        {
                return $this->tileCategoryID;
        }
 
        public function getMaterialID()
        {
                return $this->materialID;
        }
    }
    ?>