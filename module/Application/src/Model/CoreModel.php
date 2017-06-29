<?php

/**
 * Core Model For the Admin Panel
 * @author Gourav Khanna <mailgouravkhanna@gmail.com>
 * 
 * Contains core functionality required by the all the Models
 * 
 */

namespace Application\Model;

use Zend\Session\Container;

use Zend\EventManager\EventManager;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;

abstract class CoreModel implements EventManagerAwareInterface
{

    protected $_entityManager;
    protected $_inspectionEntityManager;
    protected $_serviceLocater;
    public $logger;
    protected $userEntity;
    
    /**
     * @var EventManagerInterface
     */
    protected $events;

    /**
     * @var ServiceLocatorInterface
     */
    protected $serviceLocator;

    /**
     * @var null|string|string[]
     */
    protected $eventIdentifier;


    /**
     * 
     * @param type $serviceLocater
     */
    public function __construct($serviceLocater = null, $logNameSpace = null)
    {
       
        $this->_entityManager = $serviceLocater->get('Doctrine\ORM\EntityManager');

        $this->_inspectionEntityManager = $serviceLocater;
        $this->_serviceLocater = $serviceLocater;
//        $this->logger = $this->_serviceLocater->get('logger');
    }

    public function getServiceLocator()
    {
        return $this->_serviceLocater;
    }

    public function setServiceLocator($serviceLocater)
    {
        $this->_serviceLocater = $serviceLocater;
        return $this;
    }

    /**
     * get Current Login User Object
     * @return boolean
     */
    public function getCurrentUser()
    {
        $user = new Container('User');
        if ($user->offsetExists('userId')) {
            if (empty($this->userEntity)) {
                $this->userEntity = $this->_entityManager->getRepository('Core\Entity\Users')->find($user->offsetGet('userId'));
            }
            return $this->userEntity;
        } else {
            return false;
        }
    }

    /**
     * get Current Login User Object
     * @return string|boolean
     */
    public function getCurrentUserSaveName()
    {
        $user = new Container('User');
        if ($user->offsetExists('userEmail')) {
            return $user->offsetGet('userEmail');
        } else {
            return false;
        }
    }

    public function getCurrentUserDetail()
    {
        $session = new Container('User');
        if ($session->offsetExists('details')) {
            return $session->offsetGet('details');
        }
        return array();
    }
      /**
     * Set the event manager instance used by this context
     *
     * @param  EventManagerInterface $events
     * @return CoreModel
     */
    public function setEventManager(EventManagerInterface $events)
    {
        $className = get_class($this);

        $nsPos = strpos($className, '\\') ?: 0;
        $events->setIdentifiers(array_merge(
            array(
                __CLASS__,
                $className,
                substr($className, 0, $nsPos)
            ),
            array_values(class_implements($className)),
            (array) $this->eventIdentifier
        ));

        $this->events = $events;
        return $this;
    }

    /**
     * Retrieve the event manager
     *
     * Lazy-loads an EventManager instance if none registered.
     *
     * @return EventManagerInterface
     */
    public function getEventManager()
    {
        if (!$this->events) {
            $this->setEventManager(new EventManager());
        }

        return $this->events;
    }
    public function getAvailablePaymentMethods()
    {
        return $this->availablePaymentMethods;
    }

    public function setAvailablePaymentMethods($availablePaymentMethods)
    {
        $this->availablePaymentMethods = $availablePaymentMethods;
    }
    
    public static function transactionStatusConfirmationStatusMapping()
    {
        return self::$transactionStatusConfirmationStatusMap;
    }

    /** Return date time object
     * @author Anuj Kumar <anuj.kumar@cars24.com>
     * @param $date
     * @param $inputFormat
     * @param $outputFormat
     * @param null $zeroTime
     * @return \DateTime
     */
    public function parseDateToDateTimeObj($date,$inputFormat,$outputFormat,$zeroTime=null){
        $dt = \DateTime::createFromFormat($inputFormat,$date);
        if ($dt === false) {
            return false;
        }
        if($zeroTime){  //if zero time is set add 00::00:00 in datetime object
            $dt->setTime(0, 0);
        }
        $date= $dt->format($outputFormat);
        return new \DateTime($date);
    }

}
