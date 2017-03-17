<?php

namespace AppBundle\DatatFixtures\ORM;

use AppBundle\Entity\Applicant;
use AppBundle\Entity\WorkLog;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadWorkLogData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $endTime1 = new \DateTime('now');
        $endTime1->add(new \DateInterval('PT5H'));
        $workLog1 = new WorkLog();
        $workLog1
            ->setStartTime(new \DateTime('now'))
            ->setEndTime($endTime1)
            ->setMessage('Worked for 5 hours')
            ->setUser($this->getReference('user-backend'));
        $manager->persist($workLog1);
        $manager->flush();

        $startTime2 = new \DateTime('now');
        $startTime2->add(new \DateInterval('PT24H'));
        $endTime2 = new \DateTime('now');
        $endTime2->add(new \DateInterval('PT34H'));
        $workLog2 = new WorkLog();
        $workLog2
            ->setStartTime($startTime2)
            ->setEndTime($endTime2)
            ->setMessage('Worked for 10 hours')
            ->setUser($this->getReference('user-backend'));
        $manager->persist($workLog2);
        $manager->flush();

        $endTime3 = new \DateTime('now');
        $endTime3->add(new \DateInterval('PT3H'));
        $workLog3 = new WorkLog();
        $workLog3
            ->setStartTime(new \DateTime('now'))
            ->setEndTime($endTime3)
            ->setMessage('Worked for 3 hours')
            ->setUser($this->getReference('user-frontend'));
        $manager->persist($workLog3);
        $manager->flush();

        $startTime4 = new \DateTime('now');
        $startTime4->add(new \DateInterval('PT48H'));
        $endTime4 = new \DateTime('now');
        $endTime4->add(new \DateInterval('PT52H'));
        $workLog4 = new WorkLog();
        $workLog4
            ->setStartTime($startTime4)
            ->setEndTime($endTime4)
            ->setMessage('Worked for 4 hours')
            ->setUser($this->getReference('user-frontend'));
        $manager->persist($workLog4);
        $manager->flush();

        $startTime4 = new \DateTime('now');
        $startTime4->add(new \DateInterval('PT72H'));
        $endTime4 = new \DateTime('now');
        $endTime4->add(new \DateInterval('PT76H'));
        $workLog4 = new WorkLog();
        $workLog4
            ->setStartTime($startTime4)
            ->setEndTime($endTime4)
            ->setMessage('Worked for 4 hours')
            ->setUser($this->getReference('user-hr'));
        $manager->persist($workLog4);
        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}