<?php
// Auto-generated by the console command generate:doctrine:fixtures
// WARNING: Manual editing will be lost when command is run again

namespace AppBundle\DataFixtures\ORM;

use IMS\CommonBundle\Entity\Manufacturer;
use AppBundle\DataFixtures\BaseFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadManufacturerData extends BaseFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $data = [
            ['name' => 'Jaguar','code' => 'jaguar'],
            ['name' => 'Land Rover','code' => 'landrover'],
            ['name' => 'Toyota','code' => 'toyota'],
            ['name' => 'Ferrari','code' => 'ferrari'],
        ];
        
        for ($i = 0; $i < 4; $i++) {
            $entity = new Manufacturer();

            $entity->setName(isset($data[$i]['name']) ? $data[$i]['name'] : $this->randomPronounceableWord(1, 10));
            $entity->setIsVerified(rand(0, 1) ? false : true);
            $entity->setDateAdded(new \DateTime());
            $entity->setDateUpdated(new \DateTime());
            $entity->setStatus(1);
            $entity->setCode(isset($data[$i]['code']) ? $data[$i]['code'] : $this->uniqueRandomWord('code', 25, 50));
            if ($this->hasReference('IMS_CommonBundle_Entity_Bodystyle'.$i, $entity)) {
                $entity->addBodystyle($this->getReference('IMS_CommonBundle_Entity_Bodystyle'.$i));
            }
            if ($this->hasReference('IMS_CommonBundle_Entity_Colour'.$i, $entity)) {
                $entity->addColour($this->getReference('IMS_CommonBundle_Entity_Colour'.$i));
            }
            if ($this->hasReference('IMS_CommonBundle_Entity_Dealer'.$i, $entity)) {
                $entity->addDealer($this->getReference('IMS_CommonBundle_Entity_Dealer'.$i));
            }
            if ($this->hasReference('IMS_CommonBundle_Entity_Engine'.$i, $entity)) {
                $entity->addEngine($this->getReference('IMS_CommonBundle_Entity_Engine'.$i));
            }
            if ($this->hasReference('IMS_CommonBundle_Entity_Equipment'.$i, $entity)) {
                $entity->addEquipment($this->getReference('IMS_CommonBundle_Entity_Equipment'.$i));
            }
            if ($this->hasReference('IMS_CommonBundle_Entity_Model'.$i, $entity)) {
                $entity->addModel($this->getReference('IMS_CommonBundle_Entity_Model'.$i));
            }
            if ($this->hasReference('IMS_CommonBundle_Entity_Transmission'.$i, $entity)) {
                $entity->addTransmission($this->getReference('IMS_CommonBundle_Entity_Transmission'.$i));
            }
            if ($this->hasReference('IMS_CommonBundle_Entity_Trim'.$i, $entity)) {
                $entity->addTrim($this->getReference('IMS_CommonBundle_Entity_Trim'.$i));
            }
            if ($this->hasReference('IMS_CommonBundle_Entity_TrimMaterial'.$i, $entity)) {
                $entity->addTrimMaterial($this->getReference('IMS_CommonBundle_Entity_TrimMaterial'.$i));
            }
            if ($this->hasReference('IMS_CommonBundle_Entity_Variant'.$i, $entity)) {
                $entity->addVariant($this->getReference('IMS_CommonBundle_Entity_Variant'.$i));
            }
            if ($this->hasReference('IMS_CommonBundle_Entity_Wheelbase'.$i, $entity)) {
                $entity->addWheelbase($this->getReference('IMS_CommonBundle_Entity_Wheelbase'.$i));
            }
            
            $manager->persist($entity);
            $this->addReference('IMS_CommonBundle_Entity_Manufacturer'.$i, $entity);
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
        return 14;
    }

}