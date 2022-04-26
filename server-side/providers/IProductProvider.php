<?php

interface IProductProvider {
    public function get(?int $id): object | array;
    public function create(array $data): void;
    public function purchase(array $data): void;
}
