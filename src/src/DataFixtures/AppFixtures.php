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
            $day = rand(1, 30);
            $hour = rand(1, 18);

            $event = new Event();
            $event->setTitle('title '.$i);
            $event->setDetails('details '.$i);
            $event->setPriority(1);
            $event->setStartDateEvent( new \DateTime('2024-08-' . $day . ' ' . $hour . ':00:00', new \DateTimeZone('Europe/Paris')));
            $event->setEndDateEvent( new \DateTime('2024-08-' . $day + 1 . ' ' . $hour + rand(1,5) . ':00:00', new \DateTimeZone('Europe/Paris')));
            $manager->persist($event);
        }
        $manager->flush();
    }
}
