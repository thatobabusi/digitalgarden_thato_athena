<?php

namespace App\Models\Resume;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Resume\ResumeEducationDetail
 *
 * @property int $id
 * @property int $resume_id
 * @property string|null $qualification
 * @property string|null $school
 * @property string|null $dates
 * @property string|null $details
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Resume\Resume $resume
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeEducationDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeEducationDetail newQuery()
 * @method static \Illuminate\Database\Query\Builder|ResumeEducationDetail onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeEducationDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeEducationDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeEducationDetail whereDates($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeEducationDetail whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeEducationDetail whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeEducationDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeEducationDetail whereQualification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeEducationDetail whereResumeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeEducationDetail whereSchool($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeEducationDetail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ResumeEducationDetail withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ResumeEducationDetail withoutTrashed()
 * @mixin \Eloquent
 */
class ResumeEducationDetail extends Model
{
    use SoftDeletes;
    //use SoftDeletes, Cachable;

    /**
     * @var string
     */
    protected $table = 'resume_education_details';

    /**
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'resume_id',
        'qualification',
        'school',
        'dates',
        'details',
    ];

    /* RELATIONS **************************************************************************************************** */

    /**
     * @return BelongsTo
     */
    public function resume(): BelongsTo
    {
        return $this->belongsTo(Resume::class, 'resume_id');
    }
}
