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

    }

    public function get($index)
    {

    }

    public function filterBy($keyAndValues)
    {

    }

    public function count()
    {

    }

    public function select($indexes)
    {

    }
}