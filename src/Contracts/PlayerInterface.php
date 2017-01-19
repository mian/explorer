<?php

namespace MianMohammad\Explorer\Contracts;

/**
 * Interface PlayerInterface
 *
 * @package MianMohammad\Explorer\Contracts
 * @author  Mian Muahmmad <mian.muahmmad@tajawal.com>
 *
 */
interface PlayerInterface
{

    /**
     * DESC
     *
     * @return mixed
     *
     * @author Mian Muahmmad <mian.muahmmad@tajawal.com>
     *
     */
    public function move();

    /**
     * DESC
     *
     * @return mixed
     *
     * @author Mian Muahmmad <mian.muahmmad@tajawal.com>
     *
     */
    public function pause();

    /**
     * DESC
     *
     * @return mixed
     *
     * @author Mian Muahmmad <mian.muahmmad@tajawal.com>
     *
     */
    public function stop();

    /**
     * DESC
     *
     * @return mixed
     *
     * @author Mian Muahmmad <mian.muahmmad@tajawal.com>
     *
     */
    public function exit();


}
