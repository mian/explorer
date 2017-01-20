<?php
namespace MianMuhammad\Explorer\Contracts;

use MianMuhammad\Explorer\Exceptions\InvalidDirectionException;

/**
 * Interface MapInterface
 *
 * @package MianMuhammad\Explorer\Contracts
 * @author  Mian Muahmmad <mian.muahmmad@tajawal.com>
 *
 */
interface MapInterface
{
    /**
     * MapInterface constructor.
     *
     * @param array $mapDetail
     */
    public function __construct(array $mapDetail);

    /**
     * @return \MianMuhammad\Explorer\Contracts\SpotInterface
     */
    public function getCurrentSpot(): SpotInterface;

    /**
     * @throws InvalidDirectionException
     *
     * @param string $direction
     *
     * @return SpotInterface
     */
    public function advanceToDirection(string $direction): SpotInterface;

    /**
     * @param $direction
     *
     * @return \MianMuhammad\Explorer\Contracts\SpotInterface
     */
    public function getSpotAtDirection($direction): SpotInterface;

    /**
     * @param $direction
     *
     * @return bool
     */
    public function isSpotAvailable($direction): bool;
}