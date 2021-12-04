<?php

namespace App\Http\Controllers;

use App\Models\Penalty;
use Illuminate\Http\Request;

class PenaltyController extends Controller
{
    /**
     * Updates the entry with 'paid' status.
     * 
     * @param \App\Models\Penalty $penalty
     * @return \Illuminate\Http\Response
     */
    public function pay(Penalty $penalty)
    {
        // TODO: Send email for test receipt.

        $penalty->status = 'paid';
        $penalty->save();
        return 1;
    }
}
