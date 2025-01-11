<?php

namespace App\Livewire;

use App\Models\Conversation;
use App\Services\OpenAIService;
use Livewire\Attributes\On;
use Livewire\Component;

class ChatInterface extends Topic
{
    public $inputMessage = '';
    protected $openAIService;

    public function mount(OpenAIService $openAIService, $conversationId = null)
    {
        $this->openAIService = $openAIService;
        $this->conversationId = $conversationId;

        if ($conversationId) {
            $conversation = Conversation::find($conversationId);
            $this->messages = $conversation->messages ?? [];
        }
    }

    public function sendMessage()
    {
        $openAIService = new OpenAIService();
        $this->messages[] = ['role' => 'user', 'content' => $this->inputMessage, 'timestamp' => now()->format('Y-m-d H:i:s')];

        try {
            $response = $openAIService->getChatResponse($this->messages);
            $this->messages[] = ['role' => 'assistant', 'content' => $response, 'timestamp' => now()->format('Y-m-d H:i:s'),];
            $this->saveConversation();
        } catch (\Exception $e) {
            $this->messages[] = ['role' => 'system', 'content' => 'Error: ' . $e->getMessage()];
        }

        $this->inputMessage = '';
    }

    private function saveConversation()
    {
        if ($this->conversationId) {
            $conversation = Conversation::find($this->conversationId);
            if ($conversation) {
                $conversation->update(['messages' => $this->messages]);
            }
        } else {
            $topic = (strlen($this->inputMessage) > 12)
                ? substr($this->inputMessage, 0, 12) . '...'
                : $this->inputMessage;

            $conversation = Conversation::create([
                'topic' => $topic,
                'messages' => $this->messages,
            ]);

            $this->conversationId = $conversation->id;
        }
    }

    #[On('newCon')]
    public function setNull()
    {
        $this->conversationId = null;
        $this->messages = [];
    }

    #[On('triChat')]
    public function selectChat($id)
    {
        $this->conversationId = $id;
        $conversation = Conversation::find($this->conversationId);
        $this->messages = $conversation->messages ?? [];
    }

    public function render()
    {
        return view('livewire.chat-interface');
    }
}
