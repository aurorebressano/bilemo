<?php
namespace App\Subscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use ApiPlatform\Symfony\EventListener\EventPriorities;
use App\Entity\User;
use Doctrine\ORM\Events;

class UserSubscriber implements EventSubscriberInterface
{
    function __construct(private Security $security)
    {

    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => [
                "setClientToUser",
                EventPriorities::PRE_VALIDATE
            ]

        ];
    }

    public function setClientToUser(ViewEvent $event)
    {
        $entity = $event->getControllerResult();

        if (!$entity instanceof User) {
            return;
        }

        $client = $this->security->getUser();
        $entity->setIsClientOf($client);
    }
}