<?php

namespace app\tests\unit\models;

use app\models\Post;
use app\tests\fixtures\PostFixture;
class PostTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    public $tester;
    public function _fixtures() {
        return ['Posts' => PostFixture::class];
    }
    public function testGetWithRightData() {
        verify($post = Post::find()->where(['id'=>1])->one() )->notEmpty();
        verify($post->title)->equals('News 1');
    }
    public function testGetWithWrongData() {
        verify($post = Post::find()->where(['id'=>5])->one() )->empty();
    }

    public function testEasyCreate() {
        $post = new Post();
        $data = [
            'title' =>'ТестНовость',
            'description' => 'Тестовая новость',
            'body' => 'lorem ipsum1 lorem ipsum1 lorem ipsum1 lorem ipsum1 lorem ipsum1 lorem ipsum1 lorem ipsum1 ',
            'profile_id' => 2
        ];
        $post->setAttributes($data);
        verify($post->save())->true();
    }

    public function testWrongProfileId() {
        $post = new Post();
        $data = [
            'title' =>'ТестНовость',
            'description' => 'Тестовая новость',
            'body' => 'lorem ipsum1 lorem ipsum1 lorem ipsum1 lorem ipsum1 lorem ipsum1 lorem ipsum1 lorem ipsum1 ',
            'profile_id' => 99 // wrong profile id!
        ];
        $post->setAttributes($data);
        verify($post->save())->false();
    }

    public function testEmptyData() {
        $post = new Post();
        verify($post->validate())->false();
        verify($post->save())->false();
    }

    public function testRecordsCountIncrease() {
        $countStart = Post::find()->count();
        $post = new Post();
        $data = [
            'title' =>'ТестНовость',
            'description' => 'Тестовая новость',
            'body' => 'lorem ipsum1 lorem ipsum1 lorem ipsum1 lorem ipsum1 lorem ipsum1 lorem ipsum1 lorem ipsum1 ',
            'profile_id' => 2
        ];
        $post->setAttributes($data);
        $post->save();
        $countAfterSave = Post::find()->count();

        verify( ($countAfterSave - $countStart) === 1 )->true();
    }
    public function testDebugTest() {
        $post = new Post();
        $this->assertFalse($post->validate(), 'wrong - empty data validated');
        $this->assertFalse($post->save(), 'wrong - empty post saved');
    }
}