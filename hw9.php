<?php

interface Format
{
    public function format(string $logger);
}

interface Deliver
{
    public function deliver(string $deliver);
}

class FormatRaw implements Format
{
    public function format(string $string): string
    {
        return $string;
    }
}
class FormatWithDate implements Format
{

    public function format(string $string): string
    {
        return date('Y-m-d H:i:s') . $string;
    }
}
class FormatWithDateAndDetails implements Format
{
    public function format(string $string): string
    {
        return date('Y-m-d H:i:s') . $string . ' - With some details';
    }
}

class DeliverByEmail implements Deliver
{
    public function deliver(string $format)
    {
        echo "Вывод формата ({$format}) по имейл";
    }
}

class DeliverBySms implements Deliver
{
    public function deliver(string $format)
    {
        echo "Вывод формата ({$format}) в смс";
    }
}

class DeliverToConsole implements Deliver
{
    public function deliver(string $format)
    {
        echo "Вывод формата ({$format}) в консоль";
    }
}


class Logger
{
    private Format $format;
    private Deliver $delivery;

    public function __construct(Format $format, Deliver $delivery)
    {
        $this->format   = $format;
        $this->delivery = $delivery;
    }

    public function log($string)
    {
        $this->deliver($this->format($string));
    }

    public function format($string)
    {
        return $this->format->format($string);
    }

    public function deliver( $format)
    {
        $this->delivery->deliver($format);
    }

}

$logger = new Logger(new FormatRaw(), new DeliverBySms());
$logger->log('Emergency error! Please fix me!');
