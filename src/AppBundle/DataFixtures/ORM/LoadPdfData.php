<?php

namespace AppBundle\DatatFixtures\ORM;

use AppBundle\Entity\Pdf;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class LoadPdfData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $pdf1 = new Pdf();
        $pdf1
            ->setName('income');
        $manager->persist($pdf1);
        $manager->flush();
        $this->addReference('pdf-income', $pdf1);


        $pdf2 = new Pdf();
        $pdf2
            ->setName('vacation');
        $manager->persist($pdf2);
        $manager->flush();
        $this->addReference('pdf-vacation', $pdf2);
    }

    public function getOrder()
    {
        return 1;
    }
}