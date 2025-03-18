<?php

namespace containers;

class Container
{
    private array $instances = [];

    public function set(string $key, callable $resolver): void
    {
        $this->instances[$key] = $resolver;
    }

    public function get(string $key)
    {
        if (!isset($this->instances[$key])) {
            throw new \Exception("Зависимость '{$key}' не найдена!");
        }

        if (is_callable($this->instances[$key])) {
            return $this->instances[$key]($this);
        }

        return $this->instances[$key];
    }
}