<?php

namespace MianMuhammad\Explorer;

use MianMuhammad\Explorer\Entities\FileReader;
use MianMuhammad\Explorer\Entities\SymfonyCli;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class Game
 *
 * @package MianMuhammad\Explorer
 */
class Game extends Command
{
    /** @var string */
    protected $map = __DIR__ . '/../data/map.json';

    /**
     * Configures the command
     *
     * @author Mian Muahmmad <mian.muahmmad@tajawal.com>
     */
    protected function configure()
    {
        $this->setName('explorer');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $console = new SymfonyCli();

        $reader = new FileReader();
        $map    = $reader->readMap($this->map);

        $explorer = new Explorer($console, $map);
        $explorer->start();
    }
}