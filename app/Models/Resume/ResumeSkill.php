<?php

namespace App\Models\Resume;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Resume\ResumeSkill
 *
 * @property int $id
 * @property int $resume_id
 * @property int $resume_skill_type_id
 * @property string|null $skill
 * @property string|null $since
 * @property string|null $details
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Resume\Resume $resume
 * @property-read \App\Models\Resume\ResumeSkillType $skillType
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeSkill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeSkill newQuery()
 * @method static \Illuminate\Database\Query\Builder|ResumeSkill onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeSkill query()
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeSkill whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeSkill whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeSkill whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeSkill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeSkill whereResumeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeSkill whereResumeSkillTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeSkill whereSince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeSkill whereSkill($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeSkill whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ResumeSkill withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ResumeSkill withoutTrashed()
 * @mixin \Eloquent
 */
class ResumeSkill extends Model
{
    use SoftDeletes;
    //use SoftDeletes, Cachable;

    /**
     * @var string
     */
    protected $table = 'resume_skills';

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
        'resume_skill_type_id',
        'skill',
        'since',
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

    public function skillType(): BelongsTo
    {
        return $this->belongsTo(ResumeSkillType::class, 'resume_skill_type_id');
    }
}
