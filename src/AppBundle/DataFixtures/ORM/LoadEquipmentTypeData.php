<?php
// Auto-generated by the console command generate:doctrine:fixtures
// WARNING: Manual editing will be lost when command is run again

namespace AppBundle\DataFixtures\ORM;

use IMS\CommonBundle\Entity\EquipmentType;
use AppBundle\DataFixtures\BaseFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadEquipmentTypeData extends BaseFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        
        for ($i = 0; $i < 30; $i++) {
            $entity = new EquipmentType();

            $entity->setName($this->randomPronounceableWord(1, 10));
            $entity->setDateAdded(new \DateTime());
            $entity->setDateUpdated(new \DateTime());
            $entity->setStatus(1);
            $entity->setManufacturer($this->getReference('IMS_CommonBundle_Entity_Manufacturer'.($i % 4)));
            
            $manager->persist($entity);
            $this->addReference('IMS_CommonBundle_Entity_EquipmentType'.$i, $entity);
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
        return 17;
    }

}