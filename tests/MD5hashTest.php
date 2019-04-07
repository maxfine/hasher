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
}
