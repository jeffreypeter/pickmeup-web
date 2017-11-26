<?php
/**
 * Created by IntelliJ IDEA.
 * User: jeffr
 * Date: 26-11-2017
 * Time: 16:18
 */

namespace App\Services;


use App\Models\Event;

class EventManagementService
{

    function saveEvent(Event $event) {
        $event->save();
    }

}