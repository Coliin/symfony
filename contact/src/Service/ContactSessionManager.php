<?php
namespace App\Service;


use Symfony\Component\HttpFoundation\Session\SessionInterface;

class ContactSessionManager implements IModelManager
{
    /**
     * @var SessionInterface
     */
    private $session;


    public function updateSession($values)
    {
        $this->session->set('contacts',$values);
    }

    /**
     * ContactSessionManager constructor.
     * @param SessionInterface $session
     */
    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function getAll()
    {
        return $this->session->get('contacts');
    }

    public function insert($object)
    {
        $contacts=$this->getAll();
        $contacts[]=$object;
        $this->updateSession($contacts);
    }

    public function update($object, $value)
    {

    }

    public function delete($indexes)
    {
        $keys = array_map(function ($index){return 'id = '.$index;}, $indexes);
        $keys = implode("or", $indexes);
        $contacts = $this->findBy($keys);
        foreach ($contacts as $c){
            $this->_em->remove($c);
        }
    }

    public function get($index)
    {

    }

    public function filterBy($keyAndValues)
    {

    }

    public function size()
    {

    }

    public function select($indexes)
    {

    }
}