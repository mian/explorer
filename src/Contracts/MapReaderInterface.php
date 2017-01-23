<?php
namespace MianMuhammad\Explorer\Contracts;

/**
 * Interface MapReaderInterface
 *
 * @package MianMuhammad\Explorer\Contracts
 */
interface MapReaderInterface
{
    /**
     * @param string $filePath
     *
     * @return mixed
     */
    public function readMap(string $filePath): MapInterface;

}