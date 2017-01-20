<?php

namespace MianMuhammad\Explorer;

use Exception;
use MianMuhammad\Explorer\Contracts\ConsoleInterface;
use MianMuhammad\Explorer\Contracts\MapInterface;

/**
 * Class Explorer
 *
 * @package MianMuhammad\Explorer
 */
class Explorer
{
    /** @var \MianMuhammad\Explorer\Contracts\ConsoleInterface */
    protected $console;

    /** @var \MianMuhammad\Explorer\Contracts\MapInterface */
    protected $map;

    /**
     * Explorer constructor.
     *
     * @param \MianMuhammad\Explorer\Contracts\ConsoleInterface $console
     * @param \MianMuhammad\Explorer\Contracts\MapInterface     $map
     */
    public function __construct(ConsoleInterface $console, MapInterface $map)
    {
        $this->console = $console;
        $this->map     = $map;
    }

    public function start()
    {
        if ($this->shouldRestore()) {
            // Restore the game
            // Handle the case to not ask for the user details if it is to be restored
        }

        $this->console->clear();

        $this->console->heading('Explorer - Explore and reach the destination');
        $this->console->print('======================');

        $name = $this->console->getInput('What is your name?');

        $this->console->print('Your name is ' . $name);

        $spot = $this->map->getCurrentSpot();


        while (!$spot->isExit()) {
            $this->console->clear();

            $this->console->print($spot->getAlias());
            $this->console->print('======================');

            $this->console->print($spot->getDescription());

            do {
                $direction    = $this->console->getInput('What is your next direction?');
                $isValidInput = $this->isValidInput($direction);
            } while (!$isValidInput);

            if (!$this->isDirection()) {
                $this->performInputAction($direction);

                continue;
            }

            try {
                $spot = $this->map->advanceToDirection($direction);
            } catch (Exception $e) {
                $this->console->print('You cant go that way');
                usleep(1000 * 1000);
            }

        }

        $this->console->print('Congrats! You have successfuly reached the exit');
    }

    public function shouldRestore()
    {
        // Check if data file exists?
        // if not return false;
        // if yes, ask for user input if they want to restore or not
        // true

        return false;
    }

    public function performInputAction($input)
    {
        // TODO
    }

    public function isDirection()
    {
        return true;
    }

    public function isValidInput($input): bool
    {
        // TODO
        return true;
    }
}