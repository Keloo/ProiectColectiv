<?php

namespace AppBundle\DatatFixtures\ORM;

use AppBundle\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;


class LoadUserData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{

    /** @var  ContainerInterface */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * @param User $user
     * @param $password
     * @return string
     */
    protected function hashPass(User $user, $password)
    {
        $encoder = $this->container->get('security.password_encoder');
        $password = $encoder->encodePassword($user, $password);

        return $password;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $hrUser = new User();
        $hrUser
            ->setFirstName('Arthur')
            ->setEnabled(1)
            ->setLastName('The First')
            ->setAddress('Castle Rock')
            ->setPhone('0753211819')
            ->setWorkStartDate(new \DateTime('now'))
            ->setUsername('hr')
            ->setPassword($this->hashPass($hrUser, 'password'))
            ->setSalt(md5(uniqid()))
            ->setEmail('arthur@panda.com')
            ->setJobVacancy($this->getReference('jobvacancy-hr'))
            ->setRoles(['ROLE_HR', 'ROLE_USER']);
        $manager->persist($hrUser);
        $manager->flush();
        $this->addReference('user-hr', $hrUser);

        $backendUser = new User();
        $backendUser
            ->setFirstName('John')
            ->setEnabled(1)
            ->setLastName('Doe')
            ->setAddress('Cluj-Napoca')
            ->setPhone('0752221144')
            ->setWorkStartDate(new \DateTime('now'))
            ->setUsername('john')
            ->setPassword($this->hashPass($backendUser, 'password'))
            ->setSalt(md5(uniqid()))
            ->setEmail('john@panda.com')
            ->setJobVacancy($this->getReference('jobvacancy-backend'))
            ->setRoles(['ROLE_EMPLOYEE', 'ROLE_USER']);
        $manager->persist($backendUser);
        $manager->flush();
        $this->addReference('user-backend', $backendUser);

        $frontendUser = new User();
        $frontendUser
            ->setFirstName('Nick')
            ->setEnabled(1)
            ->setLastName('Smith')
            ->setAddress('New York')
            ->setPhone('07599912266')
            ->setWorkStartDate(new \DateTime('now'))
            ->setUsername('nick')
            ->setPassword($this->hashPass($frontendUser, 'password'))
            ->setSalt(md5(uniqid()))
            ->setEmail('nick@panda.com')
            ->setJobVacancy($this->getReference('jobvacancy-frontend'))
            ->setRoles(['ROLE_EMPLOYEE', 'ROLE_USER']);
        $manager->persist($frontendUser);
        $manager->flush();
        $this->addReference('user-frontend', $frontendUser);
    }

    public function getOrder()
    {
        return 2;
    }

}