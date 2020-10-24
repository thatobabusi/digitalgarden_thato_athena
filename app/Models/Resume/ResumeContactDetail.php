<?php

namespace App\Models\Resume;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Resume\ResumeContactDetail
 *
 * @property int $id
 * @property int $resume_id
 * @property string|null $cell_number
 * @property string|null $email
 * @property string|null $website
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Resume\Resume $resume
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeContactDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeContactDetail newQuery()
 * @method static \Illuminate\Database\Query\Builder|ResumeContactDetail onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeContactDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeContactDetail whereCellNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeContactDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeContactDetail whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeContactDetail whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeContactDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeContactDetail whereResumeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeContactDetail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeContactDetail whereWebsite($value)
 * @method static \Illuminate\Database\Query\Builder|ResumeContactDetail withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ResumeContactDetail withoutTrashed()
 * @mixin \Eloquent
 */
class ResumeContactDetail extends Model
{
    use SoftDeletes;
    //use SoftDeletes, Cachable;

    /**
     * @var string
     */
    protected $table = 'resume_contact_details';

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
        'cell_number',
        'email',
        'website',
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
