<?php

namespace AppBundle\EventListener;

use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\FOSUserEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;

class RegistrationListener implements EventSubscriberInterface
{
    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::REGISTRATION_COMPLETED => 'addRole',
        );
    }

    /**
     * @param FilterUserResponseEvent $event
     */
    public function addRole(FilterUserResponseEvent $event)
    {
        $user = $event->getUser();
        $user->addRole("ROLE_EMPLOYEE");
    }
}