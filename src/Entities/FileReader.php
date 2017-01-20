<?php
namespace MianMuhammad\Explorer\Entities;

use MianMuhammad\Explorer\Contracts\MapInterface;
use MianMuhammad\Explorer\Contracts\MapReaderInterface;

/**
 * Class FileReader
 *
 * @package AutoOne\Entity
 */
class FileReader implements MapReaderInterface
{
    /**
     * @param string $filePath
     *
     * @return mixed
     */
    public function readMap(string $filePath): MapInterface
    {
        $mapDetail = file_get_contents($filePath);
        $mapDetail = json_decode($mapDetail, true);

        return new Map($mapDetail);
    }
}