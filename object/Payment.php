<?php
require_once __DIR__ . '/PaymentAbstract.php';

class CashPayment extends PaymentAbstract
{
    /**
     * 現金払い
     * 抽象メソッドをオーバーライドする
     *
     * @param int
     * @return int
     */
    public function pay(int $amount): int
    {
        return $amount;
    }
}

class CreditPayment extends PaymentAbstract
{
    /**
     * クレジットカード払い
     * 抽象メソッドをオーバーライドする
     *
     * @param int
     * @return int
     */
    public function pay(int $amount): int
    {
        return $amount + intval($amount * $this->rate);
    }
}


$payments = [
    new CashPayment(),
    new CreditPayment(),
];

$amount = $argv[1] ?? 100;

foreach ($payments as $payment) {
    echo $payment->pay($amount);
    echo '円';
}
