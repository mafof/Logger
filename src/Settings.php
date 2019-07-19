<?php
namespace Loggers;

class Settings {
    private $pathFileLogs = './logs';
    private $nameFileLogs = 'logs';

    private $isTimestamp = true;
    private $formatTimestamp = "Y-m-d H:i:s";

    private $listPrefix = [
        'info'  => "INFORMATION",
        'warn'  => "WARNING",
        'error' => "ERROR"
    ];

    public function __construct() {}

    public function setPathFileLog($path) {
        if(is_string($path)) {
            $this->pathFileLogs = $path;
            return true;
        } else {
            return false;
        }
    }

    public function setNameFileLog($name) {
        if(is_string($name)) {
            $this->nameFileLogs = $name;
            return true;
        } else {
            return false;
        }
    }

    public function setFormatTime($format) {
        if(is_string($format)) {
            $this->formatTimestamp = $format;
            return true;
        } else {
            return false;
        }
    }

    public function setIsTimestamp($isTimestamp) {
        if(is_bool($isTimestamp)) {
            $this->isTimestamp = $isTimestamp;
            return true;
        } else {
            return false;
        }
    }

    public function addPrefix($type, $value) {
        if((is_string($type) && is_string($value)) && !array_key_exists($type, $this->listPrefix)) {
            $this->listPrefix[$type] = $value;
            return true;
        } else {
           return false;
        }
    }

    public function setPrefix($type, $value) {
        if((is_string($type) && is_string($value)) && array_key_exists($type, $this->listPrefix)) {
            $this->listPrefix[$type] = $value;
            return true;
        } else {
            return false;
        }
    }

    public function removePrefix($type) {
        if(array_key_exists($type, $this->listPrefix)) {
            unset($this->listPrefix[$type]);
            return true;
        } else {
            return false;
        }
    }

    public function getPrefixName($type) {
        if(array_key_exists($type, $this->listPrefix)) {
            return $this->listPrefix[$type];
        } else {
            return false;
        }
    }

    public function getFormatTime() { return $this->formatTimestamp; }
    public function getIsTimestamp() { return $this->isTimestamp; }
    public function getListPrefix() { return $this->listPrefix; }
    public function getNameFileLogs() { return $this->nameFileLogs; }
    public function getPathFileName() { return $this->pathFileLogs; }
}