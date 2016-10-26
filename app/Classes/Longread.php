<?php

namespace App\Classes;

/**
 * Class Longread
 * @package App\Classes
 */
class Longread implements \ArrayAccess
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
            $block->value->{$field} = File::where('attachment_type', $this->backendClassName)
                ->where('attachment_id', $this->objectId)
                ->where('field', $file)
                ->orderBy('id', 'DESC')
                ->first()
            ;
        }
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value) {
        if (is_null($offset)) {
            $this->blocks[] = $value;
        } else {
            $this->blocks[$offset] = $value;
        }
    }

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset) {
        return isset($this->blocks[$offset]);
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset) {
        unset($this->blocks[$offset]);
    }

    /**
     * @param mixed $offset
     * @return null
     */
    public function offsetGet($offset) {
        return isset($this->blocks[$offset]) ? $this->blocks[$offset] : null;
    }
}
