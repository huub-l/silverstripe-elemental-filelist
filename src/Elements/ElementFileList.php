<?php

namespace Dynamic\Elements\FileList\Elements;

use DNADesign\Elemental\Models\BaseElement;
use Dynamic\Elements\FileList\Model\FileListObject;

class ElementFileList extends BaseElement
{
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
     * @return DBHTMLText
     */
    public function ElementSummary()
    {
        return DBField::create_field('HTMLText', '<p>File List</p>')->Summary(20);
    }

    /**
     * @return string
     */
    public function getType()
    {
        return _t(__CLASS__.'.BlockType', 'File List');
    }
}
