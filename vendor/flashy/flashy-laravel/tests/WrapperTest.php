<?php

namespace Flashy\FlashyLaravel\Tests;

use Flashy\Exceptions\FlashyException;
use Flashy\FlashyLaravel\Facades\Flashy;

class WrapperTest extends TestCase
{

    /**
     * @var \Flashy\Flashy
     */
    private $api;

    /**
     * @throws FlashyException
     */
    public function init()
    {
        $this->api = new \Flashy\Flashy(['api_key' => 'FLASHY_API_KEY']);

        config()->set('flashy', [
            'api_key' => 'FLASHY_API_KEY'
        ]);
    }

    /**
     * @test
     * @throws FlashyException
     */
    public function get_flashy_contacts()
    {
        $this->init();

        $contacts = Flashy::contacts();

        $this->assertEquals($contacts, $this->api->contacts);
    }

    /**
     * @test
     * @throws FlashyException
     */
    public function get_flashy_account()
    {
        $this->init();

        $contacts = Flashy::account();

        $this->assertEquals($contacts, $this->api->account);
    }

}
