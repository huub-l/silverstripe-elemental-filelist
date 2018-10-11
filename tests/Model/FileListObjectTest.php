<?php

namespace Dynamic\Elements\FileList\Test\Model;

use Dynamic\Elements\FileList\Model\FileListObject;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;

class FileListObjectTest extends SapphireTest
{
    /**
     * @var string
     */
    protected static $fixture_file = '../fixtures.yml';

    /**
     *
     */
    public function testGetCMSFields()
    {
        $object = $this->objFromFixture(FileListObject::class, 'one');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf(FieldList::class, $fields);
    }
}
