<?php
# src/EventSubscriber/EasyAdminSubscriber.php
namespace App\EventSubscriber;

use App\Entity\Ficherendezvous;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class EasyAdminSubscriber implements EventSubscriberInterface
    {
        //private $slugger;
        private $security;

    public function __construct(Security $security)
    {
        //$this->slugger = $slugger;
        $this->security = $security;
    }

    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => ['setFicheRdvUser'],
        ];
    }

    public function setFicheRdvUser (BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (!($entity instanceof Ficherendezvous)) {
            return;
        }

        /*$slug = $this->slugger->slugify($entity->getTitle());
        $entity->setSlug($slug);*/

        $security = $this->security->getUser();
        $entity->setUser($security);
    }
}