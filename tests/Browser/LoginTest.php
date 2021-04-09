<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $this->browse(function ($superadmin, $admin, $mahasiswa) {
            $superadmin->visit('/login')
                ->type('@kode', '87654321')
                ->type('@password', '12345678')
                ->click('@submit')
                ->assertSee('SuperAdmin A');
            $admin->visit('/login')
                ->type('@kode', '12345678')
                ->type('@password', '12345678')
                ->click('@submit')
                ->assertSee('Admin A');
            $mahasiswa->visit('/login')
                ->type('@kode', '16523171')
                ->type('@password', '12345678')
                ->click('@submit')
                ->assertSee('Masyhar Muharam');
        });
    }
}
