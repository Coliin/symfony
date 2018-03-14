<?php

namespace App\Repository;


use App\Entity\Developer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class DevelopersRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Developer::class);
    }

    public function update(Developer $dev){
        $this->_em->persist($dev);
        $this->_em->flush();
    }

    public function delete(Developer $dev){
        $this->_em->remove($dev);
        $this->_em->flush();
    }
}
