<?php

use PHPUnit\Framework\TestCase;
use Maxfine\Hasher\MD5hash;

class MD5hashTest extends TestCase
{
    protected $hasher = null;

    protected function setUp()
    {
        $this->hasher = new MD5hash();

        parent::setUp();
    }

    public function testMake()
    {
        $password = 'maxfine';

        $this->assertEquals($this->hasher->make($password), md5($password));
    }

    public function testMakeWithSalt()
    {
        $password = 'maxfine';
        $salt = '%^&';

        $this->assertEquals($this->hasher->make($password, ['salt' => $salt]), md5($password.$salt));
    }

    public function testCheck()
    {
        $password = 'maxfine';
        $passwordTwo = md5($password);

        $this->assertTrue($this->hasher->check($password, $passwordTwo));
    }

    public function testCheckWithSalt()
    {
        $password = 'maxfine';
        $salt = '%^&';
        $passwordTwo = md5($password.$salt);

        $this->assertTrue($this->hasher->check($password, $passwordTwo, ['salt' => $salt]));
    }
}
