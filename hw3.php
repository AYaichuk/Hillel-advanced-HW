<?php

class User
{
    private $name;
    private $age;
    private $email;

    public function __call(string $name, array $arguments)
    {
        if (method_exists($this, $name)) {
            $this->$name(implode(',', $arguments));
        } else {
            die('Такого метода не существует');
        }
    }

    private function setName($name): void
    {
        $this->name = $name;
    }

    private function setAge($age): void
    {
        $this->age = $age;
    }

    public function getAll(): array
    {
        return [
            'Name' => $this->name,
            'Age' => $this->age,
            'Email' => $this->email
        ];
    }
}


$user = new User();
$user->setName('Alex');
$user->setAge(25);
//$user->setEmail('a.yaychuk@gmail.com');

echo '<pre>';
print_r($user->getAll());
echo '</pre>';
