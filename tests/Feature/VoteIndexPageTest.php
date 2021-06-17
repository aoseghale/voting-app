<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Idea;
use App\Models\User;
use App\Models\Vote;
use Livewire\Livewire;
use App\Http\Livewire\IdeaIndex;
use App\Http\Livewire\IdeasIndex;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VoteIndexPageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function index_page_contains_idea_index_livewire_component()
    {
        Idea::factory()->create();

        $this->get(route('idea.index'))
            ->assertSeeLivewire('idea-index');
    }

    /** @test */
    public function ideas_index_livewire_component_correctly_receives_votes_count()
    {
        $user = User::factory()->create();
        $userB = User::factory()->create();

        $idea = Idea::factory()->create();

        Vote::factory()->create([
            'idea_id' => $idea->id,
            'user_id' => $user->id,
        ]);

        Vote::factory()->create([
            'idea_id' => $idea->id,
            'user_id' => $userB->id,
        ]);

        // $this->get(route('idea.index', $idea))
        //     ->assertViewHas('ideas', function ($ideas) {
        //         return $ideas->first()->votes_count == 2;
        //     });

        Livewire::test(IdeasIndex::class)
            ->assertViewHas('ideas', function ($ideas) {
                return $ideas->first()->votes_count == 2;
            });
    }

    /** @test */
    public function votes_count_shows_correctly_on_index_page_livewire_component()
    {
        $idea = Idea::factory()->create();

        Livewire::test(IdeaIndex::class, [
            'idea' => $idea,
            'votesCount' => 5,
        ])
        ->assertSet('votesCount', 5);
        // ->assertSeeHtml('<div class="font-semibold text-2xl">5</div>')
        // ->assertSeeHtml('<div class="text-sm font-bold leading-none">5</div>');
    }

    /** @test */
    public function user_who_is_logged_in_shows_voted_if_idea_already_voted_for()
    {
        $user = User::factory()->create();

        $idea = Idea::factory()->create();

        Vote::factory()->create([
            'idea_id' => $idea->id,
            'user_id' => $user->id,
        ]);

        // $response = $this->actingAs($user)
        //     ->get(route('idea.index'));

        // $ideaWithVotes = $response['ideas']->items()[0];

        $idea->votes_count = 1;
        $idea->voted_by_user = 1;

        Livewire::actingAs($user)
            ->test(IdeaIndex::class, [
                // 'idea' => $ideaWithVotes,
                'idea' => $idea,
                'votesCount' => 5,
            ])
            ->assertSet('hasVoted', true)
            ->assertSee('Voted');
    }

    /** @test */
    public function user_who_is_not_logged_in_is_redirected_to_login_page_when_trying_to_vote()
    {
        $idea = Idea::factory()->create();

        Livewire::test(IdeaIndex::class, [
            'idea' => $idea,
            'votesCount' => 5,
        ])
            ->call('vote')
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function user_who_is_logged_in_can_vote_for_idea()
    {
        $user = User::factory()->create();

        $idea = Idea::factory()->create();

        $this->assertDatabaseMissing('votes', [
            'user_id' => $user->id,
            'idea_id' => $idea->id,
        ]);

        // $response = $this->actingAs($user)
        //     ->get(route('idea.index'));

        // $ideaWithVotes = $response['ideas']->items()[0];

        $idea->votes_count = 5;

        Livewire::actingAs($user)
            ->test(IdeaIndex::class, [
                // 'idea' => $ideaWithVotes,
                'idea' => $idea,
                'votesCount' => 5,
            ])
        ->call('vote')
        ->assertSet('votesCount', 6)
        ->assertSet('hasVoted', true)
        ->assertSee('Voted');

        $this->assertDatabaseHas('votes', [
            'user_id' => $user->id,
            'idea_id' => $idea->id,
        ]);
    }

    /** @test */
    public function user_who_is_logged_in_can_remove_vote_for_idea()
    {
        $user = User::factory()->create();

        $idea = Idea::factory()->create();

        Vote::factory()->create([
            'idea_id' => $idea->id,
            'user_id' => $user->id,
        ]);

        $this->assertDatabaseHas('votes', [
            'user_id' => $user->id,
            'idea_id' => $idea->id,
        ]);

        // $response = $this->actingAs($user)
        //     ->get(route('idea.index'));

        // $ideaWithVotes = $response['ideas']->items()[0];

        $idea->votes_count = 1;
        $idea->voted_by_user = 1;

        Livewire::actingAs($user)
            ->test(IdeaIndex::class, [
                // 'idea' => $ideaWithVotes,
                'idea' => $idea,
                'votesCount' => 5,
            ])
        ->call('vote')
        ->assertSet('votesCount', 4)
        ->assertSet('hasVoted', false)
        ->assertDontSee('Voted');

        $this->assertDatabaseMissing('votes', [
            'user_id' => $user->id,
            'idea_id' => $idea->id,
        ]);
    }
}
