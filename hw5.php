<?php

class User
{
    private int $id;
    private string $password;

    public function __construct($id, $password)
    {
        if (!is_numeric($id)) {
            throw new InvalidArgumentException('ID должно содержать число');
        }
        $this->id = $id;

        if (mb_strlen($password) > 8) {
            throw new InvalidArgumentException('Password содержит более 8 символов');
        }
        $this->password = $password;
    }
    public function getUserData(): array
    {
        return [
            'ID' => $this->id,
            'Password' => $this->password,
        ];
    }
}

try {
    $newUser = new User(1, '12345678');
    print_r($newUser->getUserData());
} catch (InvalidArgumentException $exception) {
    echo $exception->getMessage();
    echo ' в файле: ' . $exception->getFile();
    echo ' на строке: ' . $exception->getLine();
}