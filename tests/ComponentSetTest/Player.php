<?php

namespace SilverStripe\ORM\Tests\ComponentSetTest;

use SilverStripe\Dev\TestOnly;
use SilverStripe\ORM\DataObject;

class Player extends DataObject implements TestOnly
{
    private static $table_name = 'ComponentSetTest_Player';

    private static $belongs_many_many = [
        'Teams' => Team::class
    ];
}
