<?php
namespace MianMuhammad\Explorer\Entities;

use MianMuhammad\Explorer\Contracts\MapInterface;
use MianMuhammad\Explorer\Contracts\SpotInterface;
use MianMuhammad\Explorer\Exceptions\InvalidDirectionException;

/**
 * Class Map
 *
 * @package AutoOne\Entity
 */
class Map implements MapInterface
{
    /** @var  array Associative array of SpotInterface[] */
    protected $spots;

    /** @var SpotInterface */
    protected $currentSpot;

    /**
     * Map constructor.
     *
     * @param array $mapDetail
     */
    public function __construct(array $mapDetail)
    {
        $this->populateMap($mapDetail);
    }

    protected function populateMap(array $mapDetail)
    {
        $spots = $mapDetail['spots'] ?? [];

        // Get the spots and set the array of spots
        foreach ($spots as $spotName => $spotDetail) {
            $this->spots[$spotName] = new Spot($spotDetail);
        }

        // Set the currentSpot to be the first spot
        $this->currentSpot = reset($this->spots);
    }

    /**
     * @return \MianMuhammad\Explorer\Contracts\SpotInterface
     */
    public function getCurrentSpot(): SpotInterface
    {
        return $this->currentSpot;
    }

    /**
     * @throws InvalidDirectionException
     *
     * @param string $direction
     *
     * @return SpotInterface
     */
    public function advanceToDirection(string $direction): SpotInterface
    {
        $spotName = $this->currentSpot->getSpotAtDirection($direction);

        $this->currentSpot = $this->spots[$spotName];

        return $this->currentSpot;
    }
}