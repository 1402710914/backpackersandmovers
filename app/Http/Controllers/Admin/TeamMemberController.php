<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class TeamMemberController extends Controller
{
    public function index(): View
    {
        $members = TeamMember::query()->orderBy('sort_order')->orderBy('name')->paginate(20);

        return view('admin.team_members.index', compact('members'));
    }

    public function create(): View
    {
        return view('admin.team_members.form', ['member' => new TeamMember]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request);
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('team', 'public');
        }
        TeamMember::create($data);

        return redirect()->route('admin.team-members.index')->with('status', 'Team member created.');
    }

    public function edit(TeamMember $team_member): View
    {
        return view('admin.team_members.form', ['member' => $team_member]);
    }

    public function update(Request $request, TeamMember $team_member): RedirectResponse
    {
        $data = $this->validateData($request, $team_member->id);
        if ($request->hasFile('photo')) {
            if ($team_member->photo) {
                Storage::disk('public')->delete($team_member->photo);
            }
            $data['photo'] = $request->file('photo')->store('team', 'public');
        }
        $team_member->update($data);

        return redirect()->route('admin.team-members.index')->with('status', 'Team member updated.');
    }

    public function destroy(TeamMember $team_member): RedirectResponse
    {
        $team_member->delete();

        return redirect()->route('admin.team-members.index')->with('status', 'Team member deleted.');
    }

    private function validateData(Request $request, ?int $id = null): array
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
            'role' => ['nullable', 'string', 'max:255'],
            'bio' => ['nullable', 'string'],
            'email' => ['nullable', 'email', 'max:190'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['sometimes', 'boolean'],
            'photo' => ['nullable', 'image', 'max:4096'],
        ]);
        $data['is_active'] = $request->boolean('is_active', true);
        $base = $data['slug'] ?: $data['name'];
        $slug = Str::slug($base);
        $q = TeamMember::where('slug', $slug);
        if ($id) {
            $q->where('id', '!=', $id);
        }
        while ($q->exists()) {
            $slug .= '-'.Str::lower(Str::random(2));
            $q = TeamMember::where('slug', $slug);
            if ($id) {
                $q->where('id', '!=', $id);
            }
        }
        $data['slug'] = $slug;
        unset($data['photo']);

        return $data;
    }
}
