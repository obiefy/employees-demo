<?php

namespace Tests\Feature;

use App\Company;
use App\User;
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

    /** @test */
    public function admin_can_see_all_companies_list()
    {
        $admin = factory(User::class)->create();
        $company = factory(Company::class)->create();
        $this->actingAs($admin)->get('company')
            ->assertSee($company->name);
    }
}
