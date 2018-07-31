<?php
// Auto-generated by the console command generate:doctrine:fixtures
// WARNING: Manual editing will be lost when command is run again

namespace AppBundle\DataFixtures\ORM;

use IMS\CommonBundle\Entity\Country;
use AppBundle\DataFixtures\BaseFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadCountryData extends BaseFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $data = [
            ['name' => 'United Kingdom','isoCode' => 'GB'],
        ];
        
        for ($i = 0; $i < 30; $i++) {
            $entity = new Country();

            $entity->setName(isset($data[$i]['name']) ? $data[$i]['name'] : $this->randomPronounceableWord(1, 10));
            $entity->setIsoCode(isset($data[$i]['isoCode']) ? $data[$i]['isoCode'] : $this->uniqueRandomWord('isoCode', 3, 3));
            $entity->setDateAdded(new \DateTime());
            $entity->setDateUpdated(new \DateTime());
            $entity->setStatus(1);
            if ($this->hasReference('IMS_CommonBundle_Entity_Currency'.$i, $entity)) {
                $entity->addCurrency($this->getReference('IMS_CommonBundle_Entity_Currency'.$i));
            }
            
            $manager->persist($entity);
            $this->addReference('IMS_CommonBundle_Entity_Country'.$i, $entity);
        }

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 11;
    }

}