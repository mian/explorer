<?php

namespace MianMuhammad\Explorer;

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
        $this->console->clear();

        $this->console->heading('Explorer - Explore and reach the destination');
        $this->console->print('======================');

        $name = $this->console->getInput('What is your name?');

        $this->console->clear();

        $this->console->print('Your name is ' . $name);
    }
}