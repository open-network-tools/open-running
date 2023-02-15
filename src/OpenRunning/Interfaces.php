<?php
    namespace OpenNetworkTools\OpenRunning;

    use OpenNetworkTools\OpenRunning\Interfaces\Ethernet;

    class Interfaces {

        private $ethernet = [];

        public function __construct() {
        }

        /**
         * @param $fpc
         * @param $pic
         * @param $port
         * @return Ethernet
         */
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
                $count = 0;
                foreach ($this->getEthernet() as $fpc){
                    foreach ($fpc as $pic){
                        foreach ($pic as $port){
                            if($port->getAdminStatus()) $count = $count + 1;
                        }
                    }
                }
                return $count;
            } elseif($mode == "adminDown"){
                $count = 0;
                foreach ($this->getEthernet() as $fpc){
                    foreach ($fpc as $pic){
                        foreach ($pic as $port){
                            if(!$port->getAdminStatus()) $count = $count + 1;
                        }
                    }
                }
                return $count;
            } elseif($mode == "operUp"){
                $count = 0;
                foreach ($this->getEthernet() as $fpc){
                    foreach ($fpc as $pic){
                        foreach ($pic as $port){
                            if($port->getOperStatus()) $count = $count + 1;
                        }
                    }
                }
                return $count;
            } elseif($mode == "operDown"){
                $count = 0;
                foreach ($this->getEthernet() as $fpc){
                    foreach ($fpc as $pic){
                        foreach ($pic as $port){
                            if(!$port->getOperStatus()) $count = $count + 1;
                        }
                    }
                }
                return $count;
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