<?php
namespace config;

use PDO;
use PDOException;

class dbConnect
{
    protected PDO $db;

    public function __construct($dbname = 'blog', $username = 'alex', $password = 'PasSWorr@$3', $host = 'localhost')
    {
        try{
            $this->db = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
        }catch (PDOException $e){
            die('Ошибка подключения к базе данных '. $e->getMessage());
        }
    }

    public function tableExists(string $table): bool {
        try {
            $this->db->query("SELECT 1 FROM $table LIMIT 1");
        } catch (PDOException) {
            return false;
        }
        return true;
    }

    public function createTable(string $tableName): void
    {
        $query = $this->db->prepare("CREATE TABLE $tableName (id int unsigned auto_increment primary key ,name varchar(50) not null ,surname varchar(70) not null, age int not null, email varchar(256) not null unique);");
        $query->execute();
    }

    public function createUser(string $name, string $surname, int $age, string $email): void
    {
        $query = $this->db->prepare("INSERT INTO users(name, surname, age, email) VALUES(:name, :surname, :age, :email)");
        $values = ['name'=>$name, 'surname'=>$surname, 'age'=>$age, 'email'=>$email];
        $query->execute($values);
    }

    public function getAllUsers(): bool|array
    {
        $query = $this->db->prepare("SELECT * FROM users");
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserId($id){
        $query = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $values = ['id' => $id];
        $query->execute($values);

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteUser($id): void
    {
        $sql = "DELETE FROM users WHERE id IN (" . implode(',', array_map('intval', $id)) . ")";
        $query = $this->db->prepare($sql);
        $query->execute();
    }
}
