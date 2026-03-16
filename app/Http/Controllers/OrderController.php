<?php

namespace App\Http\Controllers;

use App\Contracts\PaymentGatewayInterface;
use App\Services\LoggerService;
use App\Contracts\EmailSenderInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private PaymentGatewayInterface $paymentGateway;
    private LoggerService $logger;
    private EmailSenderInterface $emailSender;
    public function __construct(PaymentGatewayInterface $paymentGateway, LoggerService $logger, EmailSenderInterface $emailSender)
    {
        $this->logger = $logger;
        $this->paymentGateway = $paymentGateway;
        $this->emailSender = $emailSender;
    }

    public function process(Request $request)
    {
        $amount = $request->input('amount', 0);

        $this->logger->info("Обработка платежа $amount");

        $result = $this->paymentGateway->charge($amount);

        if ($result['success']) {

            $this->emailSender->send(
                "vasia@gmail.com",
                "Транзакция прошла успешно!",
                "Ваш платеж на сумму $amount успешно обработан"
            );

        }

        return response()->json($result);
    }
}
