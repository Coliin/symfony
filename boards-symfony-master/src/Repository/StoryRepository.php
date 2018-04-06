<?php
/**
 * Created by PhpStorm.
 * User: luffy
 * Date: 06/04/2018
 * Time: 19:08
 */
namespace App\Repository;
use App\Entity\Story;
use Symfony\Bridge\Doctrine\RegistryInterface;

class StoryRepository extends MainRepository {
    public function __construct(RegistryInterface $registry) {
        parent::__construct($registry, Story::class);
    }
}