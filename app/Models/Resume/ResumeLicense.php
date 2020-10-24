<?php

namespace App\Models\Resume;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Resume\ResumeLicense
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
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeLicense newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeLicense newQuery()
 * @method static \Illuminate\Database\Query\Builder|ResumeLicense onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeLicense query()
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeLicense whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeLicense whereDates($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeLicense whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeLicense whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeLicense whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeLicense whereQualification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeLicense whereResumeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeLicense whereSchool($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeLicense whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ResumeLicense withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ResumeLicense withoutTrashed()
 * @mixin \Eloquent
 */
class ResumeLicense extends Model
{
    use SoftDeletes;
    //use SoftDeletes, Cachable;

    /**
     * @var string
     */
    protected $table = 'resume_licenses';

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
