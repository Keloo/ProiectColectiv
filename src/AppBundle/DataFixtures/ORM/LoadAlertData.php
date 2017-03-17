<?php

namespace AppBundle\DatatFixtures\ORM;

use AppBundle\Entity\Alert;
use AppBundle\Entity\Pdf;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class LoadAlertData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $endTime = new \DateTime('now');
        $endTime->add(new \DateInterval('PT48H'));
        $alert1 = new Alert();
        $alert1
            ->setStartTime(new \DateTime('now'))
            ->setEndTime($endTime)
            ->setMessage('The system will be offline in 2 days!');
        $manager->persist($alert1);
        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}