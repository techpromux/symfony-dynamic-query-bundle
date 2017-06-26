<?php
/**
 * Created by PhpStorm.
 * User: franklin
 * Date: 27/05/2017
 * Time: 01:01
 */

namespace TechPromux\Bundle\DynamicQueryBundle\Manager;

use TechPromux\Bundle\BaseBundle\Manager\Resource\BaseResourceManager;
use TechPromux\Bundle\DynamicQueryBundle\Entity\MetadataRelation;

class MetadataRelationManager extends BaseResourceManager
{
    /**
     *
     * @return string
     */
    public function getBundleName()
    {
        return 'TechPromuxDynamicQueryBundle';
    }

    /**
     * Obtiene la clase de la entidad
     *
     * @return class
     */
    public function getResourceClass()
    {
        return MetadataRelation::class;
    }

    /**
     * Obtiene el nombre corto de la entidad
     *
     * @return string
     */
    public function getResourceName()
    {
        return 'MetadataRelation';
    }

    //--------------------------------------------------------------------------------------

    /**
     * @var MetadataManager
     */
    protected $metadata_manager;

    /**
     * @return MetadataManager
     */
    public function getMetadataManager()
    {
        return $this->metadata_manager;
    }

    /**
     * @param MetadataManager $metadata_manager
     * @return DataModelManager
     */
    public function setMetadataManager($metadata_manager)
    {
        $this->metadata_manager = $metadata_manager;
        return $this;
    }

    //---------------------------------------------------------------------------------------------

    /**
     * @param MetadataRelation $object
     * @param bool $flushed
     */
    public function prePersist($object, $flushed = true)
    {
        parent::prePersist($object, $flushed); // TODO: Change the autogenerated stub

        $object->setName($object->getLeftTable()->getName() . '.' . $object->getLeftColumn()
            . '|' . $object->getJoinType() . '|'
            . $object->getRightTable()->getName() . '.' . $object->getRightColumn()
        );
    }

    /**
     * @param MetadataRelation $object
     * @param bool $flushed
     */
    public function preUpdate($object, $flushed = true)
    {
        parent::preUpdate($object, $flushed); // TODO: Change the autogenerated stub

        $object->setName($object->getLeftTable()->getName() . '.' . $object->getLeftColumn()
            . '|' . $object->getJoinType() . '|'
            . $object->getRightTable()->getName() . '.' . $object->getRightColumn()
        );
    }
}