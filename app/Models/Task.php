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
        'description',
        'duration'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'userstory_id' => 'integer|exists,user_stories,id',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'userstory_id' => 'integer|exists:user_stories,id'
    ];

    public function userStory() {
        return $this->belongsTo('\App\Models\UserStory','userstory_id');
    }

}
