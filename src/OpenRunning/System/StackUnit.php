<?php
    namespace OpenNetworkTools\OpenRunning\System;

    class StackUnit {

        private $fanStatus = [];
        private $powerStatus;
        private $serialNumber;
        private $switchModel;
        private $versionFirmware;
        private $versionSoftware;

        public function getPowerStatus() {
            return $this->powerStatus;
        }

        public function setPowerStatus($powerStatus): self {
            $this->powerStatus = $powerStatus;
            return $this;
        }

        public function getSerialNumber() {
            return $this->serialNumber;
        }

        public function setSerialNumber($serialNumber): self {
            $this->serialNumber = $serialNumber;
            return $this;
        }

        public function getSwitchModel() {
            return $this->switchModel;
        }

        public function setSwitchModel($switchModel): self {
            $this->switchModel = $switchModel;
            return $this;
        }

        public function getVersionFirmware() {
            return $this->versionFirmware;
        }

        public function setVersionFirmware($versionFirmware): self {
            $this->versionFirmware = $versionFirmware;
            return $this;
        }

        public function getVersionSoftware() {
            return $this->versionSoftware;
        }

        public function setVersionSoftware($versionSoftware): self {
            $this->versionSoftware = $versionSoftware;
            return $this;
        }

    }