<?php

namespace Dynamic\Elements\FileList\ORM;

use Dynamic\Elements\FileList\Elements\ElementFileList;
use SilverStripe\ORM\DataExtension;

class FileDataExtension extends DataExtension
{
    /**
     * @var array
     */
    private static $has_one = [
        'FileList' => ElementFileList::class,
    ];
}