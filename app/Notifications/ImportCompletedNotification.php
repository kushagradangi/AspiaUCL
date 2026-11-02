<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ImportCompletedNotification extends Notification
{
    use Queueable;

    public string $status;
    public string $title;
    public string $message;
    public ?string $url;
    public ?string $fileName;
    public ?string $module;
    public ?array $details;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        string $status,
        string $title,
        string $message,
        ?string $url = null,
        ?string $fileName = null,
        ?string $module = null,
        ?array $details = []
    ) {
        $this->status = $status;
        $this->title = $title;
        $this->message = $message;
        $this->url = $url;
        $this->fileName = $fileName;
        $this->module = $module;
        $this->details = $details ?? [];
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'status'     => $this->status,
            'title'      => $this->title,
            'message'    => $this->message,
            'url'        => $this->url,
            'filename'   => $this->fileName,
            'module'     => $this->module,
            'details'    => $this->details,
            'created_at' => now()->toIso8601String(),
        ];
    }
}
