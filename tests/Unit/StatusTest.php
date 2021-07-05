<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Status;
use App\Models\Idea;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StatusTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_get_count_of_each_status()
    {
        $statusOpen = Status::factory()->create(['name' => 'Open', ]);
        $statusConsidering = Status::factory()->create(['name' => 'Considering', ]);
        $statusInProgress = Status::factory()->create(['name' => 'In Progress', ]);
        $statusImplemented = Status::factory()->create(['name' => 'Implemented', ]);
        $statusClosed = Status::factory()->create(['name' => 'Closed', ]);

        Idea::factory()->create([
            'status_id' => $statusOpen->id,
        ]);

        foreach (range(1, 2) as $step) {
            Idea::factory()->create([
                'status_id' => $statusConsidering->id,
            ]);
        }

        foreach (range(1, 3) as $step) {
            Idea::factory()->create([
                'status_id' => $statusInProgress->id,
            ]);
        }

        foreach (range(1, 4) as $step) {
            Idea::factory()->create([
                'status_id' => $statusImplemented->id,
            ]);
        }

        foreach (range(1, 5) as $step) {
            Idea::factory()->create([
                'status_id' => $statusClosed->id,
            ]);
        }

        $this->assertEquals(15, Status::getCount()['all_statuses']);
        $this->assertEquals(1, Status::getCount()['open']);
        $this->assertEquals(2, Status::getCount()['considering']);
        $this->assertEquals(3, Status::getCount()['in_progress']);
        $this->assertEquals(4, Status::getCount()['implemented']);
        $this->assertEquals(5, Status::getCount()['closed']);
    }
}
