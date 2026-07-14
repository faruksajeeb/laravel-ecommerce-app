<?php

namespace Tests\Feature;

use App\Http\Livewire\Backend\ProductComponent;
use App\Models\Option;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;
use Tests\TestCase;

class ProductTagsTest extends TestCase
{
    use DatabaseTransactions;

    public function test_product_component_loads_available_tags_for_select2(): void
    {
        $user = \App\Models\User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        Option::create([
            'option_group_name' => 'tags',
            'option_value' => 'New Arrival',
            'status' => 1,
            'created_by' => $user->id,
        ]);
        Option::create([
            'option_group_name' => 'tags',
            'option_value' => 'Featured',
            'status' => 1,
            'created_by' => $user->id,
        ]);
        Option::create([
            'option_group_name' => 'tags',
            'option_value' => 'Disabled Tag',
            'status' => 0,
            'created_by' => $user->id,
        ]);

        $component = Livewire::test(ProductComponent::class);

        $component->assertSee('New Arrival')
            ->assertSee('Featured')
            ->assertDontSee('Disabled Tag');
    }
}
