<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ComplaintResource;
use App\Models\Complaint;
use App\Service\NotificationService;

class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::all();
        $complaints = ComplaintResource::collection($complaints)->resolve();

        return inertia('Admin/Complaint/Index', compact('complaints'));
    }

    public function update(Complaint $complaint)
    {
        $complaint->update([
            'is_solved' => ! $complaint->is_solved,
        ]);

        $title = $complaint->is_solved ? 'Your complain was reviewed' : 'Your complain on review';

        NotificationService::store($complaint->message, $complaint->user_id, $title);

        return ComplaintResource::make($complaint)->resolve();
    }
}
