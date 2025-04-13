<?php declare(strict_types=1);

namespace Autodeal\Repositories;

use PDO;

class ProductsRepository extends AbstractRepository
{
    public function __construct(){
        parent::__construct();
    }
    protected string $tableName = 'products';

    public function getProductsByPage($offset): array{
        $stmt = $this->connection->prepare("SELECT * FROM products LIMIT 50 OFFSET :offset;");
        $stmt->bindValue(':offset', $offset);
        $stmt->execute();
        $stmt->closeCursor();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}