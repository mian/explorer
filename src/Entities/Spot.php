<?php
namespace MianMuhammad\Explorer\Entities;

use MianMuhammad\Explorer\Contracts\SpotInterface;
use MianMuhammad\Explorer\Exceptions\InvalidDirectionException;

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

    /** @var  string */
    protected $alias;

    /** @var  bool */
    protected $isExit;

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
        $this->alias       = $detail['alias'];
        $this->description = $detail['description'];
        $this->hint        = $detail['hint'];
        $this->exits       = $detail['exits'];
        $this->isExit      = !empty($detail['isExitSpot']);
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
     *
     * @return string
     *
     */
    public function getAlias()
    {
        return $this->alias;
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

    /**
     * @return bool
     */
    public function isExit(): bool
    {
        return $this->isExit;
    }


    /**
     * @param $direction
     *
     * @return string
     * @throws \MianMuhammad\Explorer\Exceptions\InvalidDirectionException
     */
    public function getSpotAtDirection($direction): string
    {
        $direction = trim($direction);

        if (empty($this->exits[$direction])) {
            throw new InvalidDirectionException('Invalid direction ' . $direction);
        }

        return $this->exits[$direction];
    }
}