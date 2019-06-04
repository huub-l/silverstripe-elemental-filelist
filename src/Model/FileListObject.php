<?php

namespace Dynamic\Elements\FileList\Model;

use Dynamic\Elements\FileList\Elements\ElementFileList;
use SilverStripe\Assets\File;
use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Permission;

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
        'File.Name',
        'Title',
    ];

    /**
     * @param bool $includerelations
     * @return array
     */
    public function fieldLabels($includerelations = true)
    {
        $labels = parent::fieldLabels($includerelations);

        $labels['Title'] = _t(__CLASS__.'.TitleLabel', 'Title');
        $labels['File.Name'] = _t(__CLASS__.'.FileNameLabel', 'File');
        $labels['File'] = _t(__CLASS__.'.FileLabel', 'File');

        return $labels;
    }

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

        $fields->dataFieldByName('File')
            ->setTitle($this->fieldLabel('File'))
            ->setFolderName('Uploads/Elements/FileList/');

        $fields->removeByName([
            'FileListID',
            'SortOrder',
        ]);

        return $fields;
    }

    /**
     * Basic permissions, defaults to page perms where possible.
     *
     * @param \SilverStripe\Security\Member|null $member
     * @return boolean
     */
    public function canView($member = null)
    {
        $extended = $this->extendedCan(__FUNCTION__, $member);
        if ($extended !== null) {
            return $extended;
        }

        if ($page = $this->FileList()->getPage()) {
            return $page->canView($member);
        }

        return Permission::check('CMS_ACCESS', 'any', $member);
    }

    /**
     * Basic permissions, defaults to page perms where possible.
     *
     * @param \SilverStripe\Security\Member|null $member
     *
     * @return boolean
     */
    public function canEdit($member = null)
    {
        $extended = $this->extendedCan(__FUNCTION__, $member);
        if ($extended !== null) {
            return $extended;
        }

        if ($page = $this->FileList()->getPage()) {
            return $page->canEdit($member);
        }

        return Permission::check('CMS_ACCESS', 'any', $member);
    }

    /**
     * Basic permissions, defaults to page perms where possible.
     *
     * Uses archive not delete so that current stage is respected i.e if a
     * element is not published, then it can be deleted by someone who doesn't
     * have publishing permissions.
     *
     * @param \SilverStripe\Security\Member|null $member
     *
     * @return boolean
     */
    public function canDelete($member = null)
    {
        $extended = $this->extendedCan(__FUNCTION__, $member);
        if ($extended !== null) {
            return $extended;
        }

        if ($page = $this->FileList()->getPage()) {
            return $page->canArchive($member);
        }

        return Permission::check('CMS_ACCESS', 'any', $member);
    }

    /**
     * Basic permissions, defaults to page perms where possible.
     *
     * @param \SilverStripe\Security\Member|null $member
     * @param array $context
     *
     * @return boolean
     */
    public function canCreate($member = null, $context = array())
    {
        $extended = $this->extendedCan(__FUNCTION__, $member);
        if ($extended !== null) {
            return $extended;
        }

        return Permission::check('CMS_ACCESS', 'any', $member);
    }
}
