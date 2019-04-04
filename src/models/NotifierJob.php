
<?php namespace Betalectic\Notifier\Models;

use Illuminate\Database\Eloquent\Model;

class NotifierJob extends Model
{
    protected $table = "notifier_jobs";
    protected $guarded = [];


    public function templates()
    {
        return $this->hasMany('App\NotifierTemplate', 'job_identifier_id');
    }
}






