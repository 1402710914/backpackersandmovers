<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\ContactMessage;
use App\Models\Destination;
use App\Models\Order;
use App\Models\TeamMember;
use App\Models\Tour;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.dashboard', [
            'users' => User::query()->count(),
            'verifiedUsers' => User::query()->whereNotNull('email_verified_at')->count(),
            'tours' => Tour::query()->count(),
            'orders' => Order::query()->count(),
            'destinations' => Destination::query()->count(),
            'posts' => BlogPost::query()->count(),
            'team' => TeamMember::query()->count(),
            'enquiries' => ContactMessage::query()->count(),
            'recentEnquiries' => ContactMessage::query()->latest()->limit(10)->get(),
        ]);
    }
}
