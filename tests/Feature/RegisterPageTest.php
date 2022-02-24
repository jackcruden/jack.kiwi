<?php

it('can render the registration page', function () {
    $this->get(route('register'))
        ->assertOk()
        ->assertSee('Register');
});
