<?php
    namespace OpenNetworkTools\OpenRunning;

    use OpenNetworkTools\OpenRunning\Interfaces\Ethernet;

    class Interfaces {

        private $ethernet;

        public function __construct() {
        }

        public function addEthernet($fpc, $pic, $port) {
            $this->ethernet[$fpc][$pic][$port] = new Ethernet($this);
            ksort($this->ethernet[$fpc]);
            ksort($this->ethernet[$fpc][$pic]);
            return $this->ethernet[$fpc][$pic][$port];
        }

        public function getEthernet($fpc = null, $pic = null, $port = null) {
            // TODO: Implement getEthernet() method.
        }

        public function setEthernet($fpc, $pic, $port) {
            // TODO: Implement setEthernet() method.
        }

        public function removeEthernet($fpc = null, $pic = null, $port = null) {
            // TODO: Implement removeEthernet() method.
        }

    }