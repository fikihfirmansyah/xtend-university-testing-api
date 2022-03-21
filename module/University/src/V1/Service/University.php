<?php

namespace University\V1\Service;

use Zend\EventManager\EventManagerAwareTrait;
use Zend\InputFilter\InputFilter as ZendInputFilter;
use Psr\Log\LoggerAwareTrait;
use University\V1\UniversityEvent;
use User\Mapper\AccountTrait as AccountMapperTrait;
use University\Mapper\UniversityTrait as UniversityMapperTrait;
use SimpleSoftwareIO\QrCode\BaconQrCodeGenerator;

class University
{
    use EventManagerAwareTrait;

    use LoggerAwareTrait;

    use AccountMapperTrait;

    use UniversityMapperTrait;

    protected $universityEvent;

    /**
     * Constructor
     *
     * @param QRcode\Mapper\University   $trackingMapper
     */
    public function __construct(
        \University\Mapper\University $universityMapper = null,
        \User\Mapper\Account $accountMapper = null
    ) {
        $this->setUniversityMapper($universityMapper);
        $this->setAccountMapper($accountMapper);
    }


    /**
     * Get the value of universityEvent
     */
    public function getQrCodeEvent()
    {
        if ($this->universityEvent == null) {
            $this->universityEvent = new UniversityEvent();
        }
        return $this->universityEvent;
    }

    /**
     * Set the value of universityEvent
     *
     * @return  selfinsert bulk gps log
     */
    public function setQrCodeEvent($universityEvent)
    {
        $this->universityEvent = $universityEvent;

        return $this;
    }

    public function createUniversity($account)
    {
        $universityEvent = $this->getQrCodeEvent();
        $universityEvent->setUserProfile($account);
        $universityEvent->setName(UniversityEvent::EVENT_CREATE_QRCODE);
        $create = $this->getEventManager()->triggerEvent($universityEvent);
        if ($create->stopped()) {
            $universityEvent->setName(UniversityEvent::EVENT_CREATE_QRCODE_ERROR);
            $universityEvent->setException($create->last());
            $this->getEventManager()->triggerEvent($universityEvent);
            throw $universityEvent->getException();
        } else {
            $universityEvent->setName(UniversityEvent::EVENT_CREATE_QRCODE_SUCCESS);
            $this->getEventManager()->triggerEvent($universityEvent);
            return $universityEvent->getQrCodeEntity();
        }
    }


    public function createMassUniversity($account, $units)
    {
        $universityEvent = $this->getQrCodeEvent();
        $universityEvent->setUserProfile($account);
        $universityEvent->setUnits($units);
        $universityEvent->setName(UniversityEvent::EVENT_CREATE_MASS_QRCODE);
        $create = $this->getEventManager()->triggerEvent($universityEvent);
        if ($create->stopped()) {
            $universityEvent->setName(UniversityEvent::EVENT_CREATE_MASS_QRCODE_ERROR);
            $universityEvent->setException($create->last());
            $this->getEventManager()->triggerEvent($universityEvent);
            throw $universityEvent->getException();
        } else {
            $universityEvent->setName(UniversityEvent::EVENT_CREATE_MASS_QRCODE_SUCCESS);
            $this->getEventManager()->triggerEvent($universityEvent);
            return $universityEvent->getQrCodeCollection();
        }
    }
}
