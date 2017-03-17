<?php

namespace AppBundle\DatatFixtures\ORM;

use AppBundle\Entity\DemandType;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class LoadDemandTypeData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $incomeDemandType = new DemandType();
        $incomeDemandType
            ->setName('Income details')
            ->setPdf($this->getReference('pdf-income'));
        $manager->persist($incomeDemandType);
        $manager->flush();
        $this->addReference('demandtype-income', $incomeDemandType);

        $vacationDemandType = new DemandType();
        $vacationDemandType
            ->setName('Vacation')
            ->setPdf($this->getReference('pdf-vacation'));
        $manager->persist($vacationDemandType);
        $manager->flush();
        $this->addReference('demandtype-vacation', $vacationDemandType);
    }

    public function getOrder()
    {
        return 2;
    }
}