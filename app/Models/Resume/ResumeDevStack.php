<?php

namespace App\Models\Resume;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Resume\ResumeDevStack
 *
 * @property int $id
 * @property int $resume_id
 * @property string|null $title
 * @property string|null $icons
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Resume\Resume $resume
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Resume\ResumeDevStackItems[] $resumeDevStackItems
 * @property-read int|null $resume_dev_stack_items_count
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeDevStack newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeDevStack newQuery()
 * @method static \Illuminate\Database\Query\Builder|ResumeDevStack onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeDevStack query()
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeDevStack whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeDevStack whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeDevStack whereIcons($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeDevStack whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeDevStack whereResumeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeDevStack whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeDevStack whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ResumeDevStack withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ResumeDevStack withoutTrashed()
 * @mixin \Eloquent
 */
class ResumeDevStack extends Model
{
    use SoftDeletes;
    //use SoftDeletes, Cachable;

    /**
     * @var string
     */
    protected $table = 'resume_dev_stack';

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
        'resume_dev_stack_id',
        'title',
        'icons',
    ];

    /* RELATIONS **************************************************************************************************** */

    /**
     * @return BelongsTo
     */
    public function resume(): BelongsTo
    {
        return $this->belongsTo(Resume::class, 'resume_id');
    }

    /**
     * @return HasMany
     */
    public function resumeDevStackItems(): HasMany
    {
        return $this->hasMany(ResumeDevStackItems::class);
    }
}
