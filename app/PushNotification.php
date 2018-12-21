<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PushNotification extends Model
{
    protected $table="pushNotification";
    protected $primaryKey="notificationId";
    public $incrementing=false;
}
