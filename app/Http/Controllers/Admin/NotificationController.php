<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminNotification;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = AdminNotification::latest()
            ->paginate(30);

        return view(
            'admin.notifications.index',
            compact('notifications')
        );
    }

    public function read(AdminNotification $adminNotification)
    {
        $adminNotification->update([
            'is_read' => true,
        ]);

        if ($adminNotification->url) {
            return redirect($adminNotification->url);
        }

        return back();
    }

    public function markAllRead()
    {
        AdminNotification::where('is_read', false)
            ->update(['is_read' => true]);

        return back()->with(
            'success',
            'All notifications marked as read.'
        );
    }

    public function destroy(AdminNotification $adminNotification)
    {
        $adminNotification->delete();

        return back()->with(
            'success',
            'Notification deleted.'
        );
    }
}
