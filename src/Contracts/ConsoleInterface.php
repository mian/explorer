<?php
namespace MianMuhammad\Explorer\Contracts;

/**
 * Interface ConsoleInterface
 *
 * @package MianMuhammad\Explorer\Contracts
 * @author  Mian Muahmmad <mian.muahmmad@tajawal.com>
 *
 */
interface ConsoleInterface
{
    /**
     * @param $message
     *
     * @return void
     */
    public function print($message);

    /**
     * @param $message
     *
     * @return void
     */
    public function heading($message);

    /**
     * @param $question
     *
     * @return mixed
     */
    public function getInput($question);

    /**
     * @return void
     */
    public function clear();

    /**
     * @return void
     */
    public function exitCommand();
}