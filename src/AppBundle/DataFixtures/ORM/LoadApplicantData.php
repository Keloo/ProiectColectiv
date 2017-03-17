<?php

namespace AppBundle\DatatFixtures\ORM;

use AppBundle\Entity\Applicant;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadApplicantData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $applicant1 = new Applicant();
        $applicant1
            ->setFirstName('Pedro')
            ->setLastName('Rosso')
            ->setAddress('Italy')
            ->setPhone('07511882754')
            ->setJobVacancy($this->getReference('jobvacancy-backend'));
        $manager->persist($applicant1);
        $manager->flush();

        $applicant2 = new Applicant();
        $applicant2
            ->setFirstName('Don')
            ->setLastName('Pomodoro')
            ->setAddress('Italy')
            ->setPhone('07533882222')
            ->setJobVacancy($this->getReference('jobvacancy-frontend'));
        $manager->persist($applicant2);
        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }

}