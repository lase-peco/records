<?php

namespace LasePeCo\Records\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use LasePeCo\Records\Tests\Models\FakeCauser;
use LasePeCo\Records\Tests\Models\FakeSubject;

class RecorderTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_stores_the_ip_address()
    {
        record('a message');

        $this->assertDatabaseHas('records', [
            'message' => 'a message',
            'ip' => '127.0.0.1'
        ]);
    }

    /** @test */
    public function it_stores_properties()
    {
        record('a message')->properties([
            'Foo' => 'Bar',
            'Bar' => 'Fez'
        ]);

        $this->assertDatabaseHas('records', [
            'message' => 'a message',
            'properties' => json_encode([
                'Foo' => 'Bar',
                'Bar' => 'Fez'
            ])
        ]);
    }
}
