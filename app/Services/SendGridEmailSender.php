<?php

namespace App\Services;

use App\Contracts\EmailSenderInterface;

class SendGridEmailSender implements EmailSenderInterface
{
    private LoggerService $logger;

    public function __construct(LoggerService $logger)
    {
        $this->logger = $logger;
    }

    public function send(string $to, string $subject, string $body): bool
    {
        $this->logger->info("Отправка email: \nКому: $to \nТема: $subject \nСодержание: $body");

        return true;
    }
}
