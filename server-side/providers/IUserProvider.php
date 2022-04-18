<?php

interface IUserProvider {
    public function create(array $data): void;
    public function findByEmail(string $email): bool;
    public function findByCPF(string $cpf): bool;
}
