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
        'datereview' => 'date',
        'dateretrospective' => 'date',
        'project_id' => 'integer|exists:projects,id'
    ];

    public function project() {
        return $this->belongsTo('\App\Models\Project');
    }

}
