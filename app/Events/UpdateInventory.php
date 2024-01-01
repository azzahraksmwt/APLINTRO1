<?php

namespace App\Events;

use App\Models\Usage;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UpdateInventory
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $usage;

    public function __construct(Usage $usage)
    {
        $this->usage = $usage;
    }
}
