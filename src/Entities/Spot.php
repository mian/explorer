<?php
namespace MianMuhammad\Explorer\Entities;

use MianMuhammad\Explorer\Contracts\SpotInterface;

/**
 * Class Spot
 *
 * @package AutoOne\Entity
 */
class Spot implements SpotInterface
{
    /** @var  array */
    protected $exits;

    /** @var string */
    protected $description;

    /** @var  string */
    protected $hint;

    /**
     * Spot constructor.
     *
     * @param array $spotDetail
     */
    public function __construct(array $spotDetail)
    {
        $this->populateSpot($spotDetail);
    }

    /**
     * DESC
     *
     * @param array $detail
     *
     * @author Mian Muahmmad <mian.muahmmad@tajawal.com>
     *
     */
    public function populateSpot(array $detail)
    {
        // TODO : Populate the current object
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getHint(): string
    {
        return $this->hint;
    }

    /**
     * @return array
     */
    public function getAvailableDirections(): array
    {
        return array_keys($this->exits);
    }

    /**
     * @param string $direction
     *
     * @return bool
     */
    public function isValidDirection(string $direction): bool
    {
        return !empty($this->exits[$direction]);
    }
}