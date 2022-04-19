<?php

interface IProductProvider {
    public function create(array $data): void;
    public function purchase(array $data): void;
}
