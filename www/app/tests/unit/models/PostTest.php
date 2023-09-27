<?php

namespace app\tests\unit\models;

use \Codeception\Test\Unit;
use app\models\Post;
use app\tests\fixtures\PostFixture;
use Yii;

class PostTest extends Unit
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
        verify( $post->getErrors() )->arrayHasKey('title', 'no title error');
        verify( $post->getErrors() )->arrayHasKey('description', 'no description error' );
        verify( $post->getErrors() )->arrayHasKey('body', 'no body error' );
        verify( $post->getErrors() )->arrayHasKey('profile_id', 'no profileId error' );
        verify($post->save())->false();
    }

    public function testLastRecord() {
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

        $lastInsertedId = Post::find()->max('id');
        $lastRecord = Post::find()->where(['id'=>$lastInsertedId])->one();
        verify($lastRecord->title)->equals($data['title']);

        verify( ($countAfterSave - $countStart) === 1 )->true();
    }
}