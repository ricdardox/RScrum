<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="UserStory",
 *      required={description},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="criteriaofacceptance",
 *          description="criteriaofacceptance",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="estimation",
 *          description="estimation",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="status",
 *          description="status",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class UserStory extends Model {

    use SoftDeletes;

    public $table = 'user_stories';
    protected $dates = ['deleted_at'];
    public $fillable = [
        'project_id',
        'description',
        'criteriaofacceptance',
        'estimation',
        'statususerstory_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'project_id' => 'integer',
        'description' => 'string',
        'criteriaofacceptance' => 'string',
        'estimation' => 'integer',
        'statususerstory_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'project_id' => 'required|integer|exists:projects,id',
        'description' => 'required',
        'criteriaofacceptance' => 'string',
        'estimation' => 'integer',
        'statususerstory_id' => 'required|integer|exists:status_userstories,id'
    ];

    public function project() {
        return $this->belongsTo('\App\Models\Project');
    }

    public function statusUserStory() {
        return $this->belongsTo('\App\Models\StatusUserStory', 'statususerstory_id');
    }

    public function tasks() {
        return $this->hasMany('\App\Models\Task', 'userstory_id');
    }

    public function progress() {
        $totalTrackingTime = 0;
        $totalDuration = 0;
        foreach ($this->hasMany('\App\Models\Task', 'userstory_id')->get() as $key => $value) {
            $totalTrackingTime+=$value->trackingtimeSum();
            $totalDuration+=$value->duration;
        }
        if ($totalDuration != 0) {
            return round(($totalTrackingTime * 100) / $totalDuration, 2);
        }
        return 0;
    }

}
