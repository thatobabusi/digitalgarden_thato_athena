<?php

namespace App\Models\Resume;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Resume\ResumeWorkDetail
 *
 * @property int $id
 * @property int $resume_id
 * @property string|null $company
 * @property string|null $title
 * @property string|null $dates
 * @property string|null $details
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Resume\Resume $resume
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeWorkDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeWorkDetail newQuery()
 * @method static \Illuminate\Database\Query\Builder|ResumeWorkDetail onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeWorkDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeWorkDetail whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeWorkDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeWorkDetail whereDates($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeWorkDetail whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeWorkDetail whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeWorkDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeWorkDetail whereResumeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeWorkDetail whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeWorkDetail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ResumeWorkDetail withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ResumeWorkDetail withoutTrashed()
 * @mixin \Eloquent
 */
class ResumeWorkDetail extends Model
{
    use SoftDeletes;
    //use SoftDeletes, Cachable;

    /**
     * @var string
     */
    protected $table = 'resume_work_details';

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
        'company',
        'title',
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
