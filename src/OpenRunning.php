<?php
    namespace OpenNetworkTools;

    use OpenNetworkTools\Interfaces\OpenRunningInterface;
    use OpenNetworkTools\OpenRunning\Interfaces;

    class OpenRunning implements OpenRunningInterface {

        private $interfaces;

        public function __construct() {
            $this->interfaces = new Interfaces();
        }

        public function getInterfaces(): Interfaces {
            return $this->interfaces;
        }

    }