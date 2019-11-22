<?php
/**
 * Abstract base class for domain entities
 *
 * @author Denis Ptushko <d.ptushko@artox.com>
 */

declare(strict_types=1);

namespace ArtoxLab\Entities;

use ArtoxLab\Entities\States\State;

abstract class AbstractEntity implements Entity
{

    /**
     * Setting state of reference
     *
     * @param string $name  Name of reference
     * @param State  $state State
     *
     * @return void
     */
    public function setReferenceState(string $name, State $state): void
    {
        if (property_exists($this, $name) === false) {
            throw new \RuntimeException(sprintf('Invalid name of reference %s', $name));
        }

        $this->$name = $state;
    }

    /**
     * Getting state of reference
     *
     * @param string $name Name of reference
     *
     * @return State
     */
    public function getReferenceState(string $name): State
    {
        if (property_exists($this, $name) === false) {
            throw new \RuntimeException(sprintf('Invalid name of reference %s', $name));
        }

        return $this->$name;
    }

}
