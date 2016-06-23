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
        'status'
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
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'project_id' => 'required|integer|exists:projects,id',
        'description' => 'required|max:150',
        'criteriaofacceptance' => 'string',
        'estimation' => 'integer',
        'status' => 'integer|in:0,1,2'
    ];

    public function project() {
        return $this->belongsTo('\App\Models\Project');
    }

}
