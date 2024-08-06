<?php

namespace App\DataFixtures;

use App\Entity\Event;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    /**
     * @throws \Exception
     */
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 20; $i++) {
            $event = new Event();
            $event->setTitle('title '.$i);
            $event->setDetails('details '.$i);
            $event->setDateEvent( new \DateTime('2024-05-02 06:00:'. $i, new \DateTimeZone('Europe/Paris')));
            $manager->persist($event);
        }
        $manager->flush();
    }
}
