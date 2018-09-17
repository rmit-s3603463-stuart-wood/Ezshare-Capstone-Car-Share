<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicHome()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('home.php')
                    ->assertSee('Home');
        });
    }
    public function testBasicContacts()
    {
        $this->browse(function (Browser $browser) {
          $browser->visit('contacts.php')
          ->assertSee('Have a question?');
        });
    }
    public function testBasicFaqs()
    {
        $this->browse(function (Browser $browser) {
          $browser->visit('faqs.php')
          ->assertSee('FAQS');
        });
    }
    public function testBasicFleet()
    {
        $this->browse(function (Browser $browser) {
          $browser->visit('carInfo.php')
          ->assertSee('Our Fleet');
        });
    }
    public function testBasicLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('signUp.php')
                    ->type('email','chris22@chris.com.au')
                    ->type('password','password')
                    ->click('.btn')
                    ->assertSee('My Account');
        });
    }
}
