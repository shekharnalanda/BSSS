<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::orderBy('sort_order')->orderBy('id')->get();
        return view('admin.programs.index', compact('programs'));
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        Program::create($data);

        return back()->with('success', 'Program added successfully.');
    }

    public function update(Request $request, Program $program)
    {
        $program->update($this->validated($request, $program));
        return back()->with('success', 'Program updated successfully.');
    }

    public function destroy(Program $program)
    {
        $program->delete();
        return back()->with('success', 'Program deleted successfully.');
    }

    private function validated(Request $request, ?Program $program = null): array
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'slug' => ['nullable','string','max:255'],
            'short_description' => ['nullable','string'],
            'description' => ['nullable','string'],
            'image' => ['nullable','string','max:255'],
            'sort_order' => ['nullable','integer','min:0'],
        ]);

        $slug = $data['slug'] ?: Str::slug($data['title']);

        if (!$slug) {
            $slug = 'program-' . time();
        }

        $base = $slug;
        $i = 1;

        while (
            Program::where('slug', $slug)
                ->when($program, fn($q) => $q->where('id', '!=', $program->id))
                ->exists()
        ) {
            $slug = $base . '-' . $i++;
        }

        $data['slug'] = $slug;
        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active'] = $request->boolean('is_active');

        return $data;
    }
}
