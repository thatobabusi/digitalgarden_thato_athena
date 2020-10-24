<?php

namespace App\Models\Resume;

use App\Models\Image\Image;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Resume\Resume
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $image_id
 * @property string $firstname
 * @property string $surname
 * @property string|null $date_of_birth
 * @property string|null $gender
 * @property string|null $marital_status
 * @property string|null $nationality
 * @property string|null $location
 * @property string|null $industry
 * @property string|null $job_title
 * @property string|null $highest_qualification
 * @property string|null $headline
 * @property string|null $bio
 * @property string|null $bio_what_i_do
 * @property string|null $about
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Resume\ResumeContactDetail[] $resumeContactDetails
 * @property-read int|null $resume_contact_details_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Resume\ResumeDevStack[] $resumeDevStack
 * @property-read int|null $resume_dev_stack_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Resume\ResumeEducationDetail[] $resumeEducationDetails
 * @property-read int|null $resume_education_details_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Resume\ResumeInterest[] $resumeInterests
 * @property-read int|null $resume_interests_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Resume\ResumeLanguage[] $resumeLanguages
 * @property-read int|null $resume_languages_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Resume\ResumeLicense[] $resumeLicenses
 * @property-read int|null $resume_licenses_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Image[] $resumeProfilePhotos
 * @property-read int|null $resume_profile_photos_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Resume\ResumeSkill[] $resumeSkills
 * @property-read int|null $resume_skills_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Resume\ResumeWorkDetail[] $resumeWorkDetails
 * @property-read int|null $resume_work_details_count
 * @method static \Illuminate\Database\Eloquent\Builder|Resume disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Resume newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Resume newQuery()
 * @method static \Illuminate\Database\Query\Builder|Resume onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Resume query()
 * @method static \Illuminate\Database\Eloquent\Builder|Resume whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resume whereBio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resume whereBioWhatIDo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resume whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resume whereDateOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resume whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resume whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resume whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resume whereHeadline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resume whereHighestQualification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resume whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resume whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resume whereIndustry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resume whereJobTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resume whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resume whereMaritalStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resume whereNationality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resume whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resume whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resume whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resume withCacheCooldownSeconds($seconds = null)
 * @method static \Illuminate\Database\Query\Builder|Resume withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Resume withoutTrashed()
 * @mixin \Eloquent
 */
class Resume extends Model
{
    use SoftDeletes, Cachable;

    /**
     * @var string
     */
    protected $table = 'resumes';

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
        'user_id',
        'image_id',
        'firstname',
        'surname',
        'date_of_birth',
        'gender',
        'marital_status',
        'nationality',
        'location',
        'industry',
        'job_title',
        'highest_qualification',
        'headline',
        'bio',
        'bio_what_i_do',
        'about',
    ];

    /* RELATIONS **************************************************************************************************** */

    /**
     * @return mixed|null
     */
    public function getResumeProfilePhoto()
    {
        return $this->resumeProfilePhotos()->first();
    }

    /**
     * @return BelongsToMany
     */
    public function resumeProfilePhotos(): BelongsToMany
    {
        return $this->belongsToMany(Image::class, 'resume_image');
    }

    /**
     * @return HasMany
     */
    public function resumeContactDetails(): HasMany
    {
        return $this->hasMany(ResumeContactDetail::class);
    }

    /**
     * @return HasMany
     */
    public function resumeWorkDetails(): HasMany
    {
        return $this->hasMany(ResumeWorkDetail::class);
    }

    /**
     * @return HasMany
     */
    public function resumeEducationDetails(): HasMany
    {
        return $this->hasMany(ResumeEducationDetail::class);
    }

    /**
     * @return HasMany
     */
    public function resumeInterests(): HasMany
    {
        return $this->hasMany(ResumeInterest::class);
    }

    /**
     * @return HasMany
     */
    public function resumeLanguages(): HasMany
    {
        return $this->hasMany(ResumeLanguage::class);
    }

    /**
     * @return HasMany
     */
    public function resumeLicenses(): HasMany
    {
        return $this->hasMany(ResumeLicense::class);
    }

    /**
     * @return HasMany
     */
    public function resumeSkills(): HasMany
    {
        return $this->hasMany(ResumeSkill::class);
    }

    /**
     * @return HasMany
     */
    public function resumeDevStack(): HasMany
    {
        return $this->hasMany(ResumeDevStack::class);
    }


}
