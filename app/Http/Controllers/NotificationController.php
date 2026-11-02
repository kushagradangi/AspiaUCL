<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Get recent notifications and unread count for the authenticated user.
     */
    public function getNotifications(Request $request): JsonResponse
    {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'unread_count' => 0,
                'notifications' => [],
            ]);
        }

        $unreadCount = $user->unreadNotifications()->count();

        $notifications = $user->notifications()
            ->latest()
            ->take(15)
            ->get()
            ->map(function ($notif) {
                return [
                    'id'         => $notif->id,
                    'read'       => $notif->read_at !== null,
                    'read_at'    => $notif->read_at?->toIso8601String(),
                    'created_at' => $notif->created_at->diffForHumans(),
                    'status'     => $notif->data['status'] ?? 'info',
                    'title'      => $notif->data['title'] ?? 'Notification',
                    'message'    => $notif->data['message'] ?? '',
                    'url'        => $notif->data['url'] ?? null,
                    'filename'   => $notif->data['filename'] ?? null,
                    'module'     => $notif->data['module'] ?? null,
                ];
            });

        return response()->json([
            'unread_count'  => $unreadCount,
            'notifications' => $notifications,
        ]);
    }

    /**
     * Mark a specific notification as read.
     */
    public function markAsRead(Request $request, string $id): JsonResponse
    {
        $notification = $request->user()
            ?->notifications()
            ->where('id', $id)
            ->first();

        if ($notification) {
            $notification->markAsRead();
        }

        return response()->json(['success' => true]);
    }

    /**
     * Mark all notifications as read.
     */
    public function markAllAsRead(Request $request): JsonResponse
    {
        $request->user()?->unreadNotifications->markAsRead();

        return response()->json(['success' => true]);
    }
}

