<?php
    namespace OpenNetworkTools\OpenRunning;

    use OpenNetworkTools\OpenRunning\Interfaces\Ethernet;

    class Interfaces {

        private $ethernet = [];

        public function __construct() {
        }

        public function addEthernet($fpc, $pic, $port) {
            if(is_numeric($fpc) && is_numeric($pic) && is_numeric($port)){
                if(!array_key_exists($fpc, $this->ethernet)) $this->ethernet[$fpc][$pic][$port] = new Ethernet($this);
                if(!array_key_exists($pic, $this->ethernet[$fpc])) $this->ethernet[$fpc][$pic][$port] = new Ethernet($this);
                if(!array_key_exists($port, $this->ethernet[$fpc][$pic])) $this->ethernet[$fpc][$pic][$port] = new Ethernet($this);
            }
            ksort($this->ethernet[$fpc]);
            ksort($this->ethernet[$fpc][$pic]);
            return $this->ethernet[$fpc][$pic][$port];
        }

        public function countEthernet($mode = null){
            if($mode == "adminUp"){
                return 0;
            } elseif($mode == "adminDown"){
                return 0;
            } elseif($mode == "operUp"){
                return 0;
            } elseif($mode == "operDown"){
                return 0;
            } else {
                $count = 0;
                foreach ($this->getEthernet() as $fpc){
                    foreach ($fpc as $pic){
                        $count = $count + sizeof($pic);
                    }
                }
                return $count;
            }
        }

        public function getEthernet($fpc = null, $pic = null, $port = null) {
            if(is_numeric($fpc) && is_numeric($pic) && is_numeric($port)){
                if(!array_key_exists($fpc, $this->ethernet)) $this->addEthernet($fpc, $pic, $port);
                if(!array_key_exists($pic, $this->ethernet[$fpc])) $this->addEthernet($fpc, $pic, $port);
                if(!array_key_exists($port, $this->ethernet[$fpc][$pic])) $this->addEthernet($fpc, $pic, $port);

                return $this->ethernet[$fpc][$pic][$port];
            } else return $this->ethernet;
        }

        public function setEthernet($fpc, $pic, $port) {
            // TODO: Implement setEthernet() method.
        }

        public function removeEthernet($fpc = null, $pic = null, $port = null) {
            // TODO: Implement removeEthernet() method.
        }

    }