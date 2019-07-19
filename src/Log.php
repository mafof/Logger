<?php
namespace Loggers;

class Log {
    private $settings;

    public function __construct(Settings $settings = null) {
        if($settings === null) $settings = new Settings();
        $this->settings = $settings;
    }

    public function __call($type, $arguments) {
        if(count($arguments) > 1 || count($arguments) === 0 || empty($arguments[0])) return false;

        $message = $arguments[0];
        $namePrefix = $this->settings->getPrefixName($type);

        if($namePrefix !== false) {
            if(gettype($message) === 'object' || gettype($message) === 'array') {
                $this->log($namePrefix, var_export($message, true));
            } else if(gettype($message) === 'string') {
                $this->log($namePrefix, $message);
            }
        } else {
            return false;
        }
    }

    private function log($prefixName, $message) {
        $messageOutput = "";
        if($this->settings->getIsTimestamp()) {
            $messageOutput .= date($this->settings->getFormatTime());
        }

        $messageOutput .= " [$prefixName]";
        $messageOutput .= " $message";
        $messageOutput .= PHP_EOL;

        echo $messageOutput;
        $this->writeFile($messageOutput);
    }

    private function writeFile($message) {
        $fileName = $this->settings->getNameFileLogs() . "_" . date("Y.m.d") . '.log';

        if(file_exists($this->settings->getPathFileName() . DIRECTORY_SEPARATOR . $fileName)) {
            file_put_contents($this->settings->getPathFileName() . DIRECTORY_SEPARATOR . $fileName, $message, FILE_APPEND | LOCK_EX);
        } else {
            mkdir($this->settings->getPathFileName());
            file_put_contents($this->settings->getPathFileName() . DIRECTORY_SEPARATOR . $fileName, $message, LOCK_EX);
        }
    }
}