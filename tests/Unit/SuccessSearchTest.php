<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Ticket;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SuccessSearchTest extends TestCase
{

    use DatabaseTransactions;

    public function testSuccessSearch(): void
    {

        $response = $this->post('/search',[
            'code' => '1L1G39'
        ]);

        $response->assertSessionMissing('msg2');
    }
}
