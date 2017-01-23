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

    protected $validInputs = ['north', 'south', 'east', 'west', 'exit'];
    protected $exitList    = ['save', 'exit'];

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
        $this->console->clear();

        $this->console->heading('Explorer - Explore and reach the destination');
        $this->console->print('======================','comment');

        $name = $this->console->getInput('What is your name?');

        $this->console->print('Your name is ' . $name,'info');

        $spot = $this->map->getCurrentSpot();


        while (!$spot->isExit()) {
            $this->console->clear();

            $this->console->print($spot->getAlias(),'info');
            $this->console->print('======================','comment');

            $this->console->print($spot->getDescription());

            do {
                $direction    = trim($this->console->getInput('What is your next direction?'));
                $isValidInput = $this->isValidInput($direction);
            } while (!$isValidInput);

            if (!$this->isDirection($direction)) {
                $this->performInputAction($direction);

                continue;
            }

            try {
                $spot = $this->map->advanceToDirection($direction);
            } catch (Exception $e) {
                $this->console->print('You cant go that way','error');
                usleep(1000 * 1000);
            }

        }

        $this->console->print('Congrats! You have successfully reached the exit','info');
    }

    /**
     *
     * @param $input
     *
     */
    public function performInputAction($input)
    {
        if ($input == 'exit') {
            $this->console->print('oops! You have gave up to explore the new world of adventure','error');
            usleep(1000 * 1000);
            $this->console->exitCommand();
        }
    }

    /**
     *
     * @param $input
     *
     * @return bool
     *
     */
    public function isDirection(string $input): bool
    {
        return !in_array(trim($input), $this->exitList);
    }

    /**
     * DESC
     *
     * @param $input
     *
     * @return bool
     *
     * @author Mian Muahmmad <mian.muahmmad@tajawal.com>
     *
     */
    public function isValidInput(string $input): bool
    {
        return in_array($input, $this->validInputs);
    }
}