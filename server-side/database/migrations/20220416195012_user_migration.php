<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class UserMigration extends AbstractMigration
{
    public function up(): void {
        $users = $this->table("users");

        $users->addColumn("name", "string", ["limit" => 80]);
        $users->addColumn("email", "string", ["limit" => 80]);
        $users->addColumn("cpf", "string", ["limit" => 20]);
        $users->addColumn("cep", "string", ["limit" => 20]);
        $users->addColumn("password", "string", ["limit" => 100]);
        $users->addColumn("state", "string", ["limit" => 70, "null" => true]);
        $users->addColumn("city", "string", ["limit" => 70, "null" => true]);
        $users->addColumn("avatar", "string", ["limit" => 100, "null" => true]);
        $users->addColumn("created_at", "datetime", ["default" => "CURRENT_TIMESTAMP"]);
        $users->addColumn("updated_at", "datetime", ["default" => "CURRENT_TIMESTAMP"]);

        $users->addIndex(["email", "cpf"], ['unique' => true]);

        $users->create();
    }

    public function down(): void {
        $this->table("users")->drop()->save();
    }
}
