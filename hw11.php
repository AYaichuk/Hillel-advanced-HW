<?php

interface  TaxiType
{
    public function cost();
    public function model();
}
abstract class Taxi
{
    abstract public function createTaxi(): TaxiType;
    public function getTaxiModelAndPrice(): array
    {
        $cost = $this->createTaxi()->cost();
        $model = $this->createTaxi()->model();
        return compact('cost', 'model');
    }
}
class EconomyTaxi implements TaxiType
{

    public function cost(): string
    {
        return '100';
    }

    public function model(): string
    {
        return 'Economy';
    }
}
class Economy extends Taxi
{

    public function createTaxi(): TaxiType
    {
        return new EconomyTaxi();
    }
}
class StandardTaxi implements TaxiType
{

    public function cost(): string
    {
        return '200';
    }

    public function model(): string
    {
        return 'Standard';
    }
}
class Standard extends Taxi
{

    public function createTaxi(): TaxiType
    {
        return new StandardTaxi();
    }
}
class LuxTaxi implements TaxiType
{

    public function cost(): string
    {
        return '300';
    }

    public function model(): string
    {
        return 'Lux';
    }
}
class Lux extends Taxi
{

    public function createTaxi(): TaxiType
    {
        return new LuxTaxi();
    }
}

echo '<pre>';
$economic = new Economy();
var_dump($economic->getTaxiModelAndPrice());

$standard = new Standard();
var_dump($standard->getTaxiModelAndPrice());

$lux = new Lux();
var_dump($lux->getTaxiModelAndPrice());
echo '<pre>';
