<?php

namespace Dynamic\Elements\FileList\Elements;

use DNADesign\Elemental\Models\BaseElement;
use Dynamic\Elements\FileList\Model\FileListObject;
use SilverStripe\ORM\FieldType\DBField;

class ElementFileList extends BaseElement
{
    /**
     * @var string
     */
    private static $icon = 'font-icon-block-file-list';

    /**
     * @var string
     */
    private static $singular_name = 'File List Element';

    /**
     * @var string
     */
    private static $plural_name = 'File List Elements';

    /**
     * @var string
     */
    private static $table_name = 'ElementFileList';

    /**
     * @var array
     */
    private static $has_many = [
        'Files' => FileListObject::class,
    ];

    /**
     * @var array
     */
    private static $owns = [
        'Files',
    ];

    /**
     * Set to false to prevent an in-line edit form from showing in an elemental area. Instead the element will be
     * clickable and a GridFieldDetailForm will be used.
     *
     * @config
     * @var bool
     */
    private static $inline_editable = false;

    /**
     * @return DBHTMLText
     */
    public function getSummary()
    {
        if ($this->Files()->count() == 1) {
            $label = ' file';
        } else {
            $label = ' files';
        }
        return DBField::create_field('HTMLText', $this->Files()->count() . $label)->Summary(20);
    }

    /**
     * @return array
     */
    protected function provideBlockSchema()
    {
        $blockSchema = parent::provideBlockSchema();
        $blockSchema['content'] = $this->getSummary();
        return $blockSchema;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return _t(__CLASS__.'.BlockType', 'File List');
    }
}
