<?php
/**
 * Related collection of entities
 *
 * @author Artur Turchin <a.turchin@artox.com>
 */

declare(strict_types=1);

namespace ArtoxLab\Entities\States;

use ArtoxLab\Entities\Entity;

class StateCollection implements State
{
    /**
     * Array of entities
     *
     * @var array
     */
    protected $elements;

    /**
     * Has changes in collection
     *
     * @var bool
     */
    protected $hasChanges;

    /**
     * Is collection flushed
     *
     * @var bool
     */
    protected $isFlushed;

    /**
     * Array of added entities
     *
     * @var array
     */
    protected $added;

    /**
     * Array of removed entities
     *
     * @var array
     */
    protected $deleted;

    /**
     * StateCollection constructor.
     *
     * @param Entity[] $elements Array of entities
     */
    public function __construct(array $elements = [])
    {
        $this->elements   = $elements;
        $this->hasChanges = false;
        $this->isFlushed  = false;
        $this->added      = [];
        $this->deleted    = [];
    }

    /**
     * Flush all relations with entities, use flush carefully, because race conditions can flush your state,
     * after new items inserted
     *
     * @return void
     */
    public function flush() : void
    {
        $this->hasChanges = true;
        $this->isFlushed  = true;
        $this->elements   = [];
    }

    /**
     * Is collection flushed
     *
     * @return bool
     */
    public function isFlushed() : bool
    {
        return $this->isFlushed;
    }

    /**
     * Return array of entities
     *
     * @return Entity[]
     */
    public function get(): array
    {
        return $this->elements;
    }

    /**
     * Registering adding relation with new entity
     *
     * @param Entity $entity Entity
     *
     * @return void
     */
    public function add($entity) : void
    {
        $this->hasChanges = true;
        $this->added[]    = $entity;
    }

    /**
     * Registering deleting relation with entity
     *
     * @param Entity $entity Entity
     *
     * @return void
     */
    public function delete($entity) : void
    {
        $this->hasChanges = true;
        $this->deleted[]  = $entity;
    }

    /**
     * Return added entities
     *
     * @return array
     */
    public function getAddedItems() : array
    {
        return $this->added;
    }

    /**
     * Return deleted entities
     *
     * @return array
     */
    public function getDeletedItems() : array
    {
        return $this->deleted;
    }

    /**
     * Reset state of changes, use after saving state to store
     *
     * @return void
     */
    public function reset() : void
    {
        $this->hasChanges = false;
        $this->isFlushed  = false;
        $this->added      = [];
        $this->deleted    = [];
    }

}
