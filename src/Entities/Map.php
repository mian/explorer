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
    /** @var  SpotInterface[] */
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

        foreach ($spots as $spotKey => $spotDetail) {

        }

        // Get the spots and set the array of spots
        // Set the currentSpot to be the first spot
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
        $directions = $this->currentSpot->getAvailableDirections();
        if (!in_array($direction, $directions) || !$this->isSpotAvailable($direction)) {
            throw new InvalidDirectionException('Invalid direction ' . $direction);
        }

        $this->currentSpot = $this->getSpotAtDirection($direction);

        return $this->currentSpot;
    }

    /**
     * @param $direction
     *
     * @return \MianMuhammad\Explorer\Contracts\SpotInterface
     */
    public function getSpotAtDirection($direction): SpotInterface
    {
        return $this->spots[$direction];
    }

    /**
     * @param $direction
     *
     * @return bool
     */
    public function isSpotAvailable($direction): bool
    {
        return !empty($this->currentSpot[$direction]);
    }
}