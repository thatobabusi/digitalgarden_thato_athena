<?php

namespace App\Models\Resume;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Resume\ResumeDevStackItems
 *
 * @property int $id
 * @property int $resume_dev_stack_id
 * @property string|null $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Resume\Resume $resumeDevStack
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeDevStackItems newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeDevStackItems newQuery()
 * @method static \Illuminate\Database\Query\Builder|ResumeDevStackItems onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeDevStackItems query()
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeDevStackItems whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeDevStackItems whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeDevStackItems whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeDevStackItems whereResumeDevStackId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeDevStackItems whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeDevStackItems whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ResumeDevStackItems withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ResumeDevStackItems withoutTrashed()
 * @mixin \Eloquent
 */
class ResumeDevStackItems extends Model
{
    use SoftDeletes;
    //use SoftDeletes, Cachable;

    /**
     * @var string
     */
    protected $table = 'resume_dev_stack_items';

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
        'title',
    ];

    /* RELATIONS **************************************************************************************************** */

    /**
     * @return BelongsTo
     */
    public function resumeDevStack(): BelongsTo
    {
        return $this->belongsTo(Resume::class, 'resume_id');
    }
}
