<?php

namespace App\Classes;
use App\File;

/**
 * Class Longread
 * @package App\Classes
 */
class Longread
{
    /**
     * @var array
     */
    protected $blocks = [];

    /**
     * @var string
     */
    protected $backendClassName = '';

    /**
     * @var string
     */
    protected $objectId = 0;

    /**
     * Longread constructor.
     * @param array $blocks
     * @param $objectId
     * @param string $backendClassName
     */
    public function __construct(array $blocks, $objectId, $backendClassName = 'Perevorot\Page\Models\Page')
    {
        $this->blocks = $blocks;
        $this->backendClassName = $backendClassName;
        $this->objectId = $objectId;

        $this->proccessData();
    }

    /**
     *
     */
    private function proccessData()
    {
        foreach ($this->blocks as $block) {
            if (isset($block->files)) {
                $this->proccessFiles($block);
            }
        }
    }

    /**
     * @param \stdClass $block
     */
    private function proccessFiles(\stdClass $block)
    {
        foreach ($block->files as $field => $file)
        {
            if (ends_with($field, 's'))  {
                $block->value->{$field} = File::where('attachment_type', $this->backendClassName)
                    ->where('attachment_id', $this->objectId)
                    ->where('field', $file)
                    ->orderBy('id', 'DESC')
                    ->get()
                ;
            } else {
                $block->value->{$field} = File::where('attachment_type', $this->backendClassName)
                    ->where('attachment_id', $this->objectId)
                    ->where('field', $file)
                    ->orderBy('id', 'DESC')
                    ->first()
                ;
            }
        }
    }

    /**
     * @return array
     */
    public function getBlocks()
    {
        return $this->blocks;
    }
}
