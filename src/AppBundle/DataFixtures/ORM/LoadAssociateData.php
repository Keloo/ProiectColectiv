<?php

namespace AppBundle\DatatFixtures\ORM;

use AppBundle\Entity\Associate;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadAssociateData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $associate1 = new Associate();
        $associate1
            ->setFirstName('Max')
            ->setLastName('Pain')
            ->setAddress('Germany')
            ->setPhone('07589886754')
            ->setAssociateType($this->getReference('associatetype-trainer'));
        $manager->persist($associate1);
        $manager->flush();

        $associate2 = new Associate();
        $associate2
            ->setFirstName('Tim')
            ->setLastName('Ferris')
            ->setAddress('Russia')
            ->setPhone('07565686876')
            ->setAssociateType($this->getReference('associatetype-consultant'));
        $manager->persist($associate2);
        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }

}