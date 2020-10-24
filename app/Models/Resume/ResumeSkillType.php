<?php

namespace App\Models\Resume;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Resume\ResumeSkillType
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Resume\ResumeSkill[] $resumeSkills
 * @property-read int|null $resume_skills_count
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeSkillType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeSkillType newQuery()
 * @method static \Illuminate\Database\Query\Builder|ResumeSkillType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeSkillType query()
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeSkillType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeSkillType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeSkillType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeSkillType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumeSkillType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ResumeSkillType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ResumeSkillType withoutTrashed()
 * @mixin \Eloquent
 */
class ResumeSkillType extends Model
{
    use SoftDeletes;
    //use SoftDeletes, Cachable;

    /**
     * @var string
     */
    protected $table = 'resume_skill_types';

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
     * @return HasMany
     */
    public function resumeSkills(): HasMany
    {
        return $this->hasMany(ResumeSkill::class);
    }
}
