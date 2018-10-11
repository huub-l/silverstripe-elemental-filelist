<?php

namespace Dynamic\Elements\FileList\Test\Elements;

use Dynamic\Elements\FileList\Elements\ElementFileList;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;

class ElementFileListTest extends SapphireTest
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
        $object = $this->objFromFixture(ElementFileList::class, 'one');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf(FieldList::class, $fields);
    }
}
