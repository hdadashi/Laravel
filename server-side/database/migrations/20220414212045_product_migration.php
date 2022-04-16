<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class ProductMigration extends AbstractMigration {
    
    public function up(): void {
        $products = $this->table("products");
        
        $products->addColumn("name", "string", ["limit" => 70]);
        $products->addColumn("price", "float");
        $products->addColumn("description", "text", ["limit" => 200, "null" => true]);
        $products->addColumn("thumbs", "json", ["null" => true]);
        $products->addColumn("category", "string", ["limit" => 50]);
        $products->addColumn("created_at", "datetime", ["default" => "CURRENT_TIMESTAMP"]);
        $products->addColumn("updated_at", "datetime", ["default" => "CURRENT_TIMESTAMP"]);
        
        $products->create();
    }

    public function down(): void {
        $this->table("products")->drop()->save();
    }
}
