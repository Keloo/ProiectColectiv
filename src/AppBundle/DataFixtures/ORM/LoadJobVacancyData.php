<?php

namespace AppBundle\DatatFixtures\ORM;

use AppBundle\Entity\JobVacancy;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class LoadJobVacancyData extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $jobVacancy1 = new JobVacancy();
        $jobVacancy1
            ->setName('Backend developer')
            ->setRate(40);
        $manager->persist($jobVacancy1);
        $manager->flush();
        $this->addReference('jobvacancy-backend', $jobVacancy1);

        $jobVacancy2 = new JobVacancy();
        $jobVacancy2
            ->setName('Frontend developer')
            ->setRate(20);
        $manager->persist($jobVacancy2);
        $manager->flush();
        $this->addReference('jobvacancy-frontend', $jobVacancy2);

        $jobVacancy3 = new JobVacancy();
        $jobVacancy3
            ->setName('Human resources')
            ->setRate(10);
        $manager->persist($jobVacancy3);
        $manager->flush();
        $this->addReference('jobvacancy-hr', $jobVacancy3);
    }

    public function getOrder()
    {
        return 1;
    }

}