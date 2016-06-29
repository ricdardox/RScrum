<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Project",
 *      required={name, description},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class Project extends Model {

    use SoftDeletes;

    public $table = 'projects';
    protected $dates = ['deleted_at'];
    public $fillable = [
        'name',
        'description',
        'sprints_durations',
        'statusproject_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:150',
        'description' => 'required|max:250',
        'sprints_durations' => 'integer',
        'statusproject_id' => 'required|integer|exists:status_projects,id'
    ];

    public function userStories() {
        return $this->hasMany('\App\Models\UserStory');
    }

    public function sprints() {
        return $this->hasMany('\App\Models\Sprint');
    }

    public function users() {
        return $this->belongsToMany('\App\Models\User', 'project_users', 'project_id', 'user_id');
    }

    public function allTasks() {
        return $this->hasMany('\App\Models\UserStory')->join('tasks', 'user_stories.id', '=', 'tasks.userstory_id')->get();
    }

    public function statusProject() {
        return $this->belongsTo('\App\Models\StatusProject', 'statusproject_id');
    }

}
