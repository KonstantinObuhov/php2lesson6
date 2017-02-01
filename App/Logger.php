<?php

namespace App;

use DateTime;
use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;

/**
 * Class Logger
 */
class Logger extends AbstractLogger implements LoggerInterface
{
    protected $filePath = __DIR__ . '/logs/default.log';
    protected $template = '{date} {level} {message} {context}';
    protected $dateFormat = DateTime::RFC2822;


    public function __construct()
    {
        if (!file_exists($this->filePath)) {
            touch($this->filePath);
        }
    }

    protected function getDate()
    {
        return (new DateTime())->format($this->dateFormat);
    }

    protected function contextStringify(array $context = [])
    {
        return !empty($context) ? json_encode($context) : null;
    }

    public function log($level, $message, array $context = [])
    {
        file_put_contents($this->filePath, trim(strtr($this->template, [
                '{date}' => $this->getDate(),
                '{level}' => $level,
                '{message}' => $message,
                '{context}' => $this->contextStringify($context),
            ])) . PHP_EOL, FILE_APPEND);
    }
}