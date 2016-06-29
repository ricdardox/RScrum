<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Sprint",
 *      required={name},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="datereview",
 *          description="datereview",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="resumereview",
 *          description="resumereview",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="dateretrospective",
 *          description="dateretrospective",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="resumeretrospective",
 *          description="resumeretrospective",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="project_id",
 *          description="project_id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class Sprint extends Model {

    use SoftDeletes;

    public $table = 'sprints';
    protected $dates = ['deleted_at'];
    public $fillable = [
        'name',
        'startdate',
        'enddate',
        'dateplanning',
        'resumeplanning',
        'datereview',
        'resumereview',
        'dateretrospective',
        'resumeretrospective',
        'project_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'resumeplanning' => 'string',
        'resumereview' => 'string',
        'resumeretrospective' => 'string',
        'project_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:255',
        'startdate' => 'date',
        'enddate' => 'date',
        'dateplanning' => 'date',
        'resumeplanning' => 'max:2000',
        'datereview' => 'date ',
        'resumereview' => 'max:2000',
        'dateretrospective' => 'date ',
        'resumeretrospective' => 'max:2000',
        'project_id' => 'integer|exists:projects,id'
    ];

    public function project() {
        return $this->belongsTo('\App\Models\Project');
    }

    public function tasks() {
        return $this->belongsToMany('\App\Models\Task', 'sprint_tasks', 'sprint_id', 'task_id');
    }

    public function progress() {
        $totalTrackingTime = 0;
        $totalDuration = 0;
        foreach ($this->belongsToMany('\App\Models\Task', 'sprint_tasks', 'sprint_id', 'task_id')->get() as $key => $value) {
            $totalTrackingTime+=$value->trackingtimeSum();
            $totalDuration+=$value->duration;
        }
        if ($totalDuration != 0) {
            return round(($totalTrackingTime * 100) / $totalDuration, 2);
        }
        return 0;
    }

    public function getStartdateAttribute() {
        $endDateFile = new \DateTime($this->attributes['startdate']);
        return $endDateFile->format('d/m/Y');
    }

    public function getEndDateAttribute() {
        $endDateFile = new \DateTime($this->attributes['enddate']);
        return $endDateFile->format('d/m/Y h:i:s a');
    }

    public function getDatePlanningAttribute() {
        $endDateFile = new \DateTime($this->attributes['dateplanning']);
        return $endDateFile->format('d/m/Y h:i:s a');
    }

    public function getDateReviewAttribute() {
        $endDateFile = new \DateTime($this->attributes['datereview']);
        return $endDateFile->format('d/m/Y  h:i:s a');
    }
   
    public function getDateRetrospectiveAttribute() {
        $endDateFile = new \DateTime($this->attributes['dateretrospective']);
        return $endDateFile->format('d/m/Y  h:i:s a');
    }

}
