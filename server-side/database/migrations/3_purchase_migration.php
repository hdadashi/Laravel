<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class PurchaseMigration extends AbstractMigration
{
    public function up(): void {
        $purchases = $this->table("purchases");

        $purchases->addColumn("user_id", "integer");
        $purchases->addColumn("product_id", "integer");
        $purchases->addColumn("created_at", "datetime", ["default" => "CURRENT_TIMESTAMP"]);
        $purchases->addColumn("updated_at", "datetime", ["default" => "CURRENT_TIMESTAMP"]);
        
        $purchases->addForeignKey('user_id', 'users', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION']);
        $purchases->addForeignKey('product_id', 'products', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION']);

        $purchases->save();
    }

    public function down(): void {
        $this->table("purchases")->drop()->save();
    }
}
