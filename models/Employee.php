<?php

class Employee
{
    public int $id;
    public string $name;
    public string $position;
    public float $salary;
    public int $departmentId;

    public function __construct(
        int $id,
        string $name,
        string $position,
        float $salary,
        int $departmentId
    ){
        $this->id = $id;
        $this->name = $name;
        $this->position = $position;
        $this->salary = $salary;
        $this->departmentId = $departmentId;
    }
    
}