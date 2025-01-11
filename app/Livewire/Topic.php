<?php

namespace App\Livewire;

use App\Models\Conversation;
use Livewire\Attributes\On;
use Livewire\Component;

class Topic extends Component
{
    public $conversationId;
    public $messages = [];

    public function newChat()
    {
        $this->dispatch('newCon');
    }

    public function setConId($id)
    {
        $this->dispatch('triChat', id: $id);
    }
    public function render()
    {
        $conv = Conversation::all();
        return view('livewire.topic', ['conversation' => $conv]);
    }
}
