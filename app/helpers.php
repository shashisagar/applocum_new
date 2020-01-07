<?php
namespace App\Helpers;
//use Illuminate\Http\Request;
use App\ActivityLog as LogActivityModel;
use Spatie\Activitylog\Contracts\Activity;
use Request;
class LogActivity{
    public static function addToLog($description,$performon,$attribute = null){
        activity()
           ->causedBy(\Auth::user())
           ->performedOn($performon)
           ->withProperties($attribute)
           ->log($description);
    }
    public static function logActivityLists(){
    	return LogActivityModel::latest()->get();
    }
}
