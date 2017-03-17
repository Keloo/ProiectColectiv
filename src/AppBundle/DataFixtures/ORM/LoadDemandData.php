<?php

namespace AppBundle\DatatFixtures\ORM;

use AppBundle\Entity\Demand;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadDemandData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $demand1 = new Demand();
        $demand1
            ->setUser($this->getReference('user-backend'))
            ->setMessage("I want a vacation please")
            ->setApproved(1)
            ->setDemandType($this->getReference('demandtype-vacation'));
        $manager->persist($demand1);
        $manager->flush();

        $demand2 = new Demand();
        $demand2
            ->setUser($this->getReference('user-frontend'))
            ->setMessage("A income report please!")
            ->setApproved(1)
            ->setDemandType($this->getReference('demandtype-income'));
        $manager->persist($demand2);
        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }

}