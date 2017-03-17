<?php

namespace AppBundle\DatatFixtures\ORM;

use AppBundle\Entity\AssociateType;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class LoadAssociateTypeData extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $associateTrainer = new AssociateType();
        $associateTrainer
            ->setName('Trainer');
        $manager->persist($associateTrainer);
        $manager->flush();
        $this->addReference('associatetype-trainer', $associateTrainer);

        $associateConsultant = new AssociateType();
        $associateConsultant
            ->setName('Consultant');
        $manager->persist($associateConsultant);
        $manager->flush();
        $this->addReference('associatetype-consultant', $associateConsultant);
    }

    public function getOrder()
    {
        return 1;
    }

}