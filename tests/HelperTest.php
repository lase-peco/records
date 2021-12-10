<?php

namespace LasePeCo\Records\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use LasePeCo\Records\Tests\Models\FakeCauser;
use LasePeCo\Records\Tests\Models\FakeSubject;

class HelperTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_stores_a_record()
    {
        record('Test');

        $this->assertDatabaseHas('records', [
            'message' => 'Test'
        ]);
    }

    /** @test */
    public function it_uses_a_fluent_api()
    {
        record()->by(new FakeCauser)->onSubject(new FakeSubject)->message('Test');

        $this->assertDatabaseCount('records', 1);

        $this->assertDatabaseHas('records', [
            'message' => 'Test',
            'causer_type' => FakeCauser::class,
            'subject_type' => FakeSubject::class,
        ]);
    }
}
