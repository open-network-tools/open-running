<?php
    namespace OpenNetworkTools\OpenRunning\Interfaces;

    class Ethernet {

        private $adminStatus;
        private $operStatus;

        public function __construct(){
        }

        public function getAdminStatus() {
            return $this->adminStatus;
        }

        public function setAdminStatus($adminStatus): self {
            $this->adminStatus = $adminStatus;
            return $this;
        }

        public function getOperStatus() {
            return $this->operStatus;
        }

        public function setOperStatus($operStatus): self {
            $this->operStatus = $operStatus;
            return $this;
        }

    }