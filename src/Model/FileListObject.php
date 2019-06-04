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
        'SortOrder' => "Int",
    ];

    /**
     * @var array
     */
    private static $has_one = [
        'FileList' => ElementFileList::class,
        'File' => File::class,
    ];

    /**
     * @var array
     */
    private static $owns = [
        'File',
    ];

    /**
     * @var array
     */
    private static $summary_fields = [
        'File.Name' => 'File',
        'Title',
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
            'SortOrder',
        ]);

        return $fields;
    }
}
