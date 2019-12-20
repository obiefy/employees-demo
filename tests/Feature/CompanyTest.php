<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_requires_data_to_create_new_company()
    {
        $this->post('company')
            ->assertSessionHasErrors();
    }
}
