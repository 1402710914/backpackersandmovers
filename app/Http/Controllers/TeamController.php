<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\View\View;

class TeamController extends Controller
{
    public function index(): View
    {
        $members = TeamMember::query()->where('is_active', true)->orderBy('sort_order')->orderBy('name')->get();

        return view('team.index', compact('members'));
    }
}
