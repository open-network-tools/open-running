<?php
    namespace OpenNetworkTools;

    use OpenNetworkTools\Interfaces\OpenRunningInterface;
    use OpenNetworkTools\OpenRunning\Interfaces;
    use OpenNetworkTools\OpenRunning\System;

    class OpenRunning implements OpenRunningInterface {

        private $interfaces;
        private $system;

        public function __construct() {
            $this->interfaces = new Interfaces();
            $this->system = new System();
        }

        public function getInterfaces(): Interfaces {
            return $this->interfaces;
        }

        public function getSystem(): System {
            return $this->system;
        }

    }