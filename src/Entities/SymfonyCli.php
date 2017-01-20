<?php
namespace MianMuhammad\Explorer\Entities;

use MianMuhammad\Explorer\Contracts\ConsoleInterface;

/**
 * Class Console
 *
 * @package AutoOne\Entity
 */
class SymfonyCli implements ConsoleInterface
{
    /**
     * @param $message
     *
     * @return void
     */
    public function print($message)
    {
        echo $message . PHP_EOL;
    }

    /**
     * @param $message
     *
     * @return void
     */
    public function heading($message)
    {
        echo $message . PHP_EOL;
    }

    /**
     * @param $question
     *
     * @return mixed
     */
    public function getInput($question)
    {
        echo $question . ' ';

        return fgets(STDIN);
    }

    public function clear()
    {
        echo chr(27) . chr(91) . 'H' . chr(27) . chr(91) . 'J'; // ^[H^[J
    }
}