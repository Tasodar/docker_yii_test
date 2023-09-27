<?php

namespace app\tests\unit\models;

use Codeception\Test\Unit;
use app\models\Profile;

class ProfileTest extends Unit
{
    /**
     * @var \UnitTester
     */
    public $tester;

    public function testGetList() {
        verify(sizeof(Profile::getList()))->equals(Profile::find()->count());
    }
}