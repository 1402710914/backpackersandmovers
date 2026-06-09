<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteSettingsController extends Controller
{
    public function header(): View
    {
        return view('admin.settings.header', [
            'welcomePrefix' => SiteSetting::get('header_welcome_prefix', 'Welcome to'),
            'welcomeBrand' => SiteSetting::get('header_welcome_brand', 'Backpackers and Movers'),
            'pickupLine' => SiteSetting::get('header_pickup_line', 'Tour pickup: Pune & Mumbai only'),
        ]);
    }

    public function updateHeader(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'header_welcome_prefix' => ['required', 'string', 'max:120'],
            'header_welcome_brand' => ['required', 'string', 'max:120'],
            'header_pickup_line' => ['required', 'string', 'max:200'],
        ]);

        SiteSetting::setMany([
            'header_welcome_prefix' => $data['header_welcome_prefix'],
            'header_welcome_brand' => $data['header_welcome_brand'],
            'header_pickup_line' => $data['header_pickup_line'],
        ]);

        return redirect()
            ->route('admin.settings.header')
            ->with('status', 'Header bar text updated.');
    }

    public function homepage(): View
    {
        return view('admin.settings.homepage', [
            'tourProgramsEnabled' => site_setting_bool('home_tour_programs_section_enabled', false),
        ]);
    }

    public function updateHomepage(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'home_tour_programs_section_enabled' => ['nullable', 'boolean'],
        ]);

        SiteSetting::set(
            'home_tour_programs_section_enabled',
            ! empty($data['home_tour_programs_section_enabled']) ? '1' : '0'
        );

        return redirect()
            ->route('admin.settings.homepage')
            ->with('status', 'Homepage sections updated.');
    }
}
