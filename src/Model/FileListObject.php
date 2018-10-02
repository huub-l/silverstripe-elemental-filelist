<?php

namespace Dynamic\Elements\FileList\Model;

use Dynamic\Elements\FileList\Elements\ElementFileList;
use SilverStripe\Assets\File;
use SilverStripe\ORM\DataObject;

class FileListObject extends DataObject
{
    /**
     * @var string
     */
    private static $singular_name = 'File';

    /**
     * @var string
     */
    private static $plural_name = 'Files';

    /**
     * @var array
     */
    private static $db = [
        'Title' => 'Varchar(255)',
    ];

    /**
     * @var array
     */
    private static $has_one = [
        'FileList' => ElementFileList::class,
        'File' => File::class,
    ];

    private static $owns = [
        'File',
    ];

    /**
     * @var string
     */
    private static $table_name = 'FileListObject';

    /**
     * @return \SilverStripe\Forms\FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName([
            'FileListID',
        ]);

        return $fields;
    }
}
