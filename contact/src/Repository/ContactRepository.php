<?php

namespace App\Repository;

use App\Entity\Contact;
use App\Service\IModelManager;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Flex\Response;

class ContactRepository extends ServiceEntityRepository implements IModelManager
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Contact::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('c')
            ->where('c.something = :value')->setParameter('value', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
    public function getAll()
    {
        return $this->findAll();
    }

    public function insert($object)
    {
        $this->insert($object);
    }

    public function update($object, $value)
    {
        foreach ($value as $key=>$value){
            $accesseur = 'set'.key;
            if(method_exists($object, $value)){
                $object->$accesseur($value);
            }
        }
        $this->_em->flush($object);
    }

    public function delete($indexes)
    {
        $keys = array_map(function ($index){return 'id = '.$index;}, $indexes);
        $keys = implode(" or ", $indexes);
        $query=$this->_em->createQuery("DELETE FROM Contact c where ".$keys);
        $query->execute();
//        $contacts = $this->findBy($keys);
//        foreach ($contacts as $c){
//            $this->_em->remove($c);
//        }
    }

    public function get($index)
    {
        return $this->find($index);
    }

    public function filterBy($keyAndValues)
    {
        // TODO: Implement filterBy() method.
    }

    public function select($indexes)
    {
        $this->select($indexes);
    }

    public function size()
    {
        // TODO: Implement size() method.
    }
}
