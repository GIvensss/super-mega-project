<?php

namespace Framework\Core;

use Framework\Database\Database;

abstract class ActiveRecord
{
    protected Database $db;

    abstract protected function getId(): int;
    abstract protected function setId(int $id): void;

    abstract protected function insert(): void;
    abstract protected function getAll(): array;
}
