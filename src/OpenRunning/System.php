<?php
    namespace OpenNetworkTools\OpenRunning;

    use OpenNetworkTools\OpenRunning\System\StackUnit;

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

        public function addInstalledLicence($name){
            $this->installedLicense[] = $name;
            return $this;
        }

        public function getInstalledLicence(){
            return $this->installedLicense;
        }

        public function removeInstalledLicence($name){
            foreach ($this->installedLicense as $k => $v){
                if($v == $name) unset($this->installedLicense[$k]);
            }
            return $this;
        }

        public function getSizeStack() {
            return $this->sizeStack;
        }

        public function setSizeStack($sizeStack): self {
            $this->sizeStack = $sizeStack;
            return $this;
        }

        public function addStackUnit($id){
            if(is_numeric($id)){
                if(!array_key_exists($id, $this->stackUnit)) $this->stackUnit[$id] = new StackUnit();
            }
            ksort($this->stackUnit);
            return $this->stackUnit[$id];
        }

        public function getStackUnit($id = null){
            if(!is_null($id)){
                if(array_key_exists($id, $this->stackUnit)) return $this->stackUnit[$id];
            }
            return $this->stackUnit;
        }

        public function getSysName() {
            return $this->sysName;
        }

        public function setSysName($sysName): self {
            $this->sysName = $sysName;
            return $this;
        }

    }