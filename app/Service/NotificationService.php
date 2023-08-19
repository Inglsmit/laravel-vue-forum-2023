<?php

namespace App\Service;

use App\Events\StoreNotificationEvent;
use App\Models\Notification;

class NotificationService
{
    public static function store($message, $id, $title)
    {
        $user_id = $id ? $id : $message->user_id;

        $notification = Notification::create([
            'title' => $title,
            'user_id' => $user_id,
            'url' => route('themes.show', $message->theme_id).'#'.$message->id,
        ]);

        // TODO: fix bag when second click on the same like happened
        // notification doesn't appeared - 500 error
        event(new StoreNotificationEvent($notification));
    }
}
