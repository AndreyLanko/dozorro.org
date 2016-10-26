<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Area
 * @package App
 */
class Image extends Model
{
    /**
     * @var string
     */
    protected $table = 'system_files';

    /**
     * Helper attribute for getPath.
     * @return string
     */
    public function getPathAttribute()
    {
        return $this->getPath();
    }

    /**
     * Returns the public address to access the file.
     */
    public function getPath()
    {
        return '/storage/app/uploads/public/' . $this->getPartitionDirectory() . $this->disk_name;
    }

    /**
     * Generates a partition for the file.
     * return /ABC/DE1/234 for an name of ABCDE1234.
     * @param Attachment $attachment
     * @param string $styleName
     * @return mixed
     */
    protected function getPartitionDirectory()
    {
        return implode('/', array_slice(str_split($this->disk_name, 3), 0, 3)) . '/';
    }
}
