<?php

namespace SilverStripe\ORM\FieldType;

use LogicException;
use SilverStripe\Forms\DropdownField;
use SilverStripe\ORM\DB;

/**
 * Represents a single year field.
 */
class DBYear extends DBField
{

    public function requireField()
    {
        $parts=['datatype'=>'year', 'precision'=>4, 'arrayValue'=>$this->arrayValue];
        $values=['type'=>'year', 'parts'=>$parts];
        DB::require_field($this->tableName, $this->name, $values);
    }

    public function scaffoldFormField($title = null, $params = null)
    {
        if (!class_exists(DropdownField::class)) {
            throw new LogicException('scaffoldFormField() requires silverstripe/forms installed');
        }
        $selectBox = DropdownField::create($this->name, $title);
        $selectBox->setSource($this->getDefaultOptions());
        return $selectBox;
    }

    /**
     * Returns a list of default options that can
     * be used to populate a select box, or compare against
     * input values. Starts by default at the current year,
     * and counts back to 1900.
     *
     * @param int|bool $start starting date to count down from
     * @param int|bool $end end date to count down to
     * @return array
     */
    private function getDefaultOptions($start = null, $end = null)
    {
        if (!$start) {
            $start = (int)date('Y');
        }
        if (!$end) {
            $end = 1900;
        }
        $years = [];
        for ($i=$start; $i>=$end; $i--) {
            $years[$i] = $i;
        }
        return $years;
    }
}
