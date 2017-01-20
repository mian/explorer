<?php
namespace MianMuhammad\Explorer\Contracts;

/**
 * Interface SpotInterface
 *
 * @package MianMuhammad\Explorer\Contracts
 * @author  Mian Muahmmad <mian.muahmmad@tajawal.com>
 *
 */
interface SpotInterface
{
    /**
     * @return array
     */
    public function getAvailableDirections(): array;

    /**
     * @param string $direction
     *
     * @return bool
     */
    public function isValidDirection(string $direction): bool;

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @return string
     */
    public function getHint();
}