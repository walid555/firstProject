<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileData extends Model
{
    protected $table="files";
    protected $primaryKey="fileId";
    public $incrementing=false;
}
