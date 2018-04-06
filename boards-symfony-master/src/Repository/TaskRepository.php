<?php

namespace App\Repository;

use App\Entity\Task;
use Symfony\Bridge\Doctrine\RegistryInterface;

class TaskRepository extends MainRepository{
    public function __construct(RegistryInterface $registry){
        parent::__construct($registry, Task::class);
    }
}
