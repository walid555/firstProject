<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PushNotification extends Model
{
    protected $table="PushNotification";
    protected $primaryKey="notificationId";
    public $incrementing=false;
}
