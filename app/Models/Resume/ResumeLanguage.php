<?php

namespace App\Models\Resume;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Resume\ResumeLanguage
 *
 * @property int $id
 * @property int $resume_id
 * @property string|null $language
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Resume\Resume $resume
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeLanguage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeLanguage newQuery()
 * @method static \Illuminate\Database\Query\Builder|ResumeLanguage onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeLanguage query()
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeLanguage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeLanguage whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeLanguage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeLanguage whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeLanguage whereResumeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeLanguage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ResumeLanguage withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ResumeLanguage withoutTrashed()
 * @mixin \Eloquent
 */
class ResumeLanguage extends Model
{
    use SoftDeletes;
    //use SoftDeletes, Cachable;

    /**
     * @var string
     */
    protected $table = 'resume_languages';

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
        'language',
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
