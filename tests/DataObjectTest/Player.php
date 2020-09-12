<?php

namespace SilverStripe\ORM\Tests\DataObjectTest;

use SilverStripe\Dev\TestOnly;
use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\Tests\DataObjectTest;

class Player extends DataObject implements TestOnly
{
    private static $table_name = 'DataObjectTest_Player';

    private static $db = [
        'FirstName' => 'Varchar',
        'Surname' => 'Varchar',
        'Email' => 'Varchar',
        'IsRetired' => 'Boolean',
        'ShirtNumber' => 'Varchar',
    ];

    private static $has_one = [
        'FavouriteTeam' => DataObjectTest\Team::class,
    ];

    private static $belongs_many_many = [
        'Teams' => DataObjectTest\Team::class
    ];

    private static $has_many = [
        'Fans' => Fan::class . '.Favourite', // Polymorphic - Player fans
        'CaptainTeams' => Team::class . '.Captain',
        'FoundingTeams' => Team::class . '.Founder'
    ];

    private static $belongs_to = [
        'CompanyOwned' => Company::class . '.Owner'
    ];

    private static $searchable_fields = [
        'IsRetired',
        'ShirtNumber'
    ];
}
