<?php
    namespace OpenNetworkTools\OpenRunning;

    class System {

        private $baseUnitStack;
        private $installedLicense = [];
        private $sizeStack;
        private $stackUnit = [];
        private $sysName;

        public function getBaseUnitStack() {
            return $this->baseUnitStack;
        }

        public function setBaseUnitStack($baseUnitStack): self {
            $this->baseUnitStack = $baseUnitStack;
            return $this;
        }

        public function getSizeStack() {
            return $this->sizeStack;
        }

        public function setSizeStack($sizeStack): self {
            $this->sizeStack = $sizeStack;
            return $this;
        }

        public function getSysName() {
            return $this->sysName;
        }

        public function setSysName($sysName): self {
            $this->sysName = $sysName;
            return $this;
        }

    }