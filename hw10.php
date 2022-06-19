<?php

interface Payment
{
    public function getAmount();
}
abstract class PaymentMethod
{
    abstract public function newPayment(): Payment;

    public function total()
    {
        $payment = $this->newPayment();
        return $payment->getAmount();
    }
}
class ApplePay implements Payment
{
    private int $amount;

    public function __construct($amount)
    {
        $this->amount = $amount;
    }
    public function getAmount(): int
    {
        return $this->amount;
    }
}
class GooglePay implements Payment
{
    private int $amount;
    public function __construct($amount)
    {
        $this->amount = $amount;
    }
    public function getAmount(): int
    {
        return $this->amount;
    }
}
class ApplePayMethod extends PaymentMethod
{
    private int $amount;
    public function __construct($amount)
    {
        $this->amount = $amount;
    }
    public function newPayment(): Payment
    {
        return new ApplePay($this->amount);
    }
}
class GooglePayMethod extends PaymentMethod
{
    private int $amount;
    public function __construct($amount)
    {
        $this->amount = $amount;
    }
    public function newPayment(): Payment
    {
        return new GooglePay($this->amount);
    }
}

$pay = new ApplePayMethod(100);
echo '<pre>';
echo $pay->total();
echo '</pre>';
$pay = new GooglePayMethod(200);
echo '<pre>';
echo $pay->total();
echo '</pre>';
