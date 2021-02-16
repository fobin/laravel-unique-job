<?php

namespace Tests\Feature;

use App\Jobs\UniqueJob;
use Tests\TestCase;

class TestJobs extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->getConnection()->beginTransaction();
        // On this call database.lock uses Insert and it works for the first time
        UniqueJob::dispatch();
        // On this call insert fails and it goes to catch but the update fails
        UniqueJob::dispatch();
    }
}
