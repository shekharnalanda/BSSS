<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LeadershipMessage;
use Illuminate\Http\Request;

class LeadershipMessageController extends Controller
{
    public function index()
    {
        $messages = LeadershipMessage::orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.leadership.index', compact('messages'));
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        LeadershipMessage::create($data);

        return back()->with('success', 'Leadership message created successfully.');
    }

    public function update(Request $request, LeadershipMessage $leadershipMessage)
    {
        $leadershipMessage->update($this->validated($request));

        return back()->with('success', 'Leadership message updated successfully.');
    }

    public function destroy(LeadershipMessage $leadershipMessage)
    {
        $leadershipMessage->delete();

        return back()->with('success', 'Leadership message deleted successfully.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'designation' => ['required', 'string', 'max:255'],
            'title' => ['nullable', 'string', 'max:255'],
            'message' => ['nullable', 'string'],
            'photo' => ['nullable', 'string', 'max:255'],
            'mobile' => ['nullable', 'string', 'max:20'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active'] = $request->boolean('is_active');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        return $data;
    }
}
