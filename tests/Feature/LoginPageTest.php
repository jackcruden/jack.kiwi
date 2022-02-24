<?php

it('can render the login page', function () {
    $this->get(route('login'))
        ->assertOk()
        ->assertSee('Login');
});
