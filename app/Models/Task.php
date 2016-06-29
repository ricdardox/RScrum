<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Task",
 *      required={},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="userstory_id",
 *          description="userstory_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      )
 * )
 */
class Task extends Model {

    use SoftDeletes;

    public $table = 'tasks';
    protected $dates = ['deleted_at'];
    public $fillable = [
        'userstory_id',
        'user_id',
        'description',
        'duration'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'userstory_id' => 'integer',
        'user_id' => 'integer',
        'description' => 'string',
        'duration' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'userstory_id' => 'required|integer|exists:user_stories,id',
        'user_id' => 'integer|exists:users,id',
        'description' => 'required',
        'duration' => 'float'
    ];

    public function userStory() {
        return $this->belongsTo('\App\Models\UserStory', 'userstory_id');
    }

    public function user() {
        return $this->belongsTo('\App\Models\User', 'user_id');
    }

    public function sprints() {
        return $this->belongsToMany('\App\Models\Sprint', 'sprint_tasks', 'task_id', 'sprint_id');
    }

    public function trackingtime() {
        return $this->hasMany('\App\Models\TrackingTask', 'task_id');
    }
    
    public function trackingtimeSum() {
        return $this->hasMany('\App\Models\TrackingTask', 'task_id')->sum('trackingtime_tasks.duration');
    }

    public function avProgress() {
        if ($this->duration != 0) {
            $durationTracking = $this->hasMany('\App\Models\TrackingTask', 'task_id')->sum('trackingtime_tasks.duration');
            return round(($durationTracking * 100 ) / $this->duration, 2);
        }
        return 0;
    }

}
