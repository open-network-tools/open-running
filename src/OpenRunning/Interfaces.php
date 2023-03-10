<?php
    namespace OpenNetworkTools\OpenRunning;

    use OpenNetworkTools\OpenRunning\Interfaces\Ethernet;

    class Interfaces {

        private $ethernet = [];
        private $topology = [];

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

        public function countEthernet($mode = null, $fpc = null, $pic = null){
            $count = 0;

            foreach ($this->ethernet as $kfpc => $vfpc){
                if(is_null($fpc) || $kfpc == $fpc){
                    foreach ($vfpc as $kpic => $vpic){
                        if(is_null($pic) || $kpic == $pic){
                            foreach ($vpic as $vport){
                                if(is_null($mode)) $count++;
                                elseif($mode == "adminUp") $vport->getAdminStatus() ? $count++ : null;
                                elseif($mode == "adminDown") !$vport->getAdminStatus() ? $count++ : null;
                                elseif($mode == "operUp") $vport->getOperStatus() ? $count++ : null;
                                elseif($mode == "operDown") !$vport->getOperStatus() ? $count++ : null;
                                else null;
                            }
                        }
                    }
                }
            }

            return $count;
        }

        public function getEthernet($fpc = null, $pic = null, $port = null) {
            if(is_numeric($fpc) && is_numeric($pic) && is_numeric($port)){
                if(array_key_exists($fpc, $this->ethernet)) return $this->ethernet[$fpc];
                if(array_key_exists($pic, $this->ethernet[$fpc])) return $this->ethernet[$fpc][$pic];
                if(array_key_exists($port, $this->ethernet[$fpc][$pic])) return $this->ethernet[$fpc][$pic][$port];

                return $this->ethernet;
            } else return $this->ethernet;
        }

        public function setEthernet($fpc, $pic, $port) {
            // TODO: Implement setEthernet() method.
        }

        public function removeEthernet($fpc = null, $pic = null, $port = null) {
            // TODO: Implement removeEthernet() method.
        }

        public function addTopology($name){
            $this->topology[] = $name;
            return $this;
        }

        public function getTopology(){
            return $this->topology;
        }

    }