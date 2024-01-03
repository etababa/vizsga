<?php
namespace model;

    class Terracefloor {
        private int $terracefloorID;
        private int $terracefloorCategoryID;
        private string $thickness;
        private string $width;
        private string $length;
        private string $terracefloorColor;
        private int $materialID;

        //id nem szerepel a konstruktorban
        function __construct(int $terracefloorCategoryID, string $thickness, string $width, string $length, string $terracefloorColor, int $materialID){
            $this->terracefloorCategoryID = $terracefloorCategoryID;
            $this->thickness = $thickness;
            $this->width = $width;
            $this->length = $length;
            $this->terracefloorColor = $terracefloorColor;
            $this->materialID = $materialID;
        }
    }
    ?>