<?php

namespace App\Models\Resume;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Resume\ResumeInterest
 *
 * @property int $id
 * @property int $resume_id
 * @property string|null $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Resume\Resume $resume
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeInterest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeInterest newQuery()
 * @method static \Illuminate\Database\Query\Builder|ResumeInterest onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeInterest query()
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeInterest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeInterest whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeInterest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeInterest whereResumeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeInterest whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeInterest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ResumeInterest withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ResumeInterest withoutTrashed()
 * @mixin \Eloquent
 */
class ResumeInterest extends Model
{
    use SoftDeletes;
    //use SoftDeletes, Cachable;

    /**
     * @var string
     */
    protected $table = 'resume_interests';

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
        'title',
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
