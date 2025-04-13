<?php declare(strict_types=1);

namespace Autodeal\Repositories;

class UsersRepository extends AbstractRepository
{
    protected string $tableName = 'users';
    public function checkLogin($login): bool {
        if(!empty($this->findByAttribute($login, 'login'))) {
            return true;
        }
        return false;
    }

    public function checkUserPassword(string $login, string $password): bool {
        if(!empty($this->findByAttribute($login, 'login'))) {
            $stmt = $this->connection->prepare('SELECT password FROM users WHERE login = :login AND password = :password');
            $stmt->execute(['login' => $login, 'password' => $password]);
            $row = $stmt->fetch();
            if(!empty($row)) {
                return true;
            }
        }
        return false;
    }

    public function addUser(string $login, string $password): void {
        $stmt = $this->connection->prepare('INSERT INTO users (login, password) VALUES (:login, :password)');
        $stmt->execute(['login' => $login, 'password' => $password]);
    }
}