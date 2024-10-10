<?php
namespace App\Events;

use App\Models\Relatorio;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RelatorioPronto implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $relatorio;

    public function __construct(Relatorio $relatorio)
    {
        $this->relatorio = $relatorio;
    }

    public function broadcastOn()
    {
        return new Channel('relatorios');
    }

    public function broadcastAs()
    {
        return 'relatorio.pronto';
    }
}
