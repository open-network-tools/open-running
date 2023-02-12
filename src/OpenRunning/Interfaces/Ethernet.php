<?php
    namespace OpenNetworkTools\OpenRunning\Interfaces;

    class Ethernet {

        private $adminStatus;
        private $openStatus;

        public function __construct(){
        }

        public function getAdminStatus() {
            return $this->adminStatus;
        }

        public function setAdminStatus($adminStatus): self {
            $this->adminStatus = $adminStatus;
            return $this;
        }

        public function getOpenStatus() {
            return $this->openStatus;
        }

        public function setOpenStatus($openStatus): self {
            $this->openStatus = $openStatus;
            return $this;
        }

    }