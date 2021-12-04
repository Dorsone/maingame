<?php

namespace App\Models;

use App\Models\Traits\setImageHelper;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

/**
 * Class User
 * @package App\Models
 */
class User extends Authenticatable implements HasMedia
{
    use CrudTrait;
    use HasFactory, Notifiable, setImageHelper;
    use HasMediaTrait;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'first_name',
        'surname',
        'email',
        'password',
        'steam_id',
        'image',
        'description',
        'interests',
        'gender',
        'birth_date',
        'country'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'interests' => 'array'
    ];

    public function articles()
    {
        return $this->hasMany(Articles::class, 'user_id', 'id');
    }

    /**
     * @return BelongsToMany
     * Relation for View History
     */
    public function histories() {
        return $this->belongsToMany(Articles::class, 'view_histories', 'user_id', 'article_id')->orderBy('created_at', 'desc');

    }

    public function getHowLongAgoAttribute($key)
    {
        $diff = $this->created_at->diff(now());
        $y = $diff->y;
        $m = $diff->m;
        $d = $diff->d;

        $result = [];
        if ($y) {
            $result[] = $y."&nbsp;".$this->getNumEnding($y, ['год', 'года', 'лет']);
        }
        if ($m) {
            $result[] = $m."&nbsp;мес";
        }
        if ($d) {
            $result[] = $d."&nbsp;дн";
        }

        return implode(' ', $result);
    }

    public function setImageAttribute($value)
    {
        $this->setImage("image", "public/uploads/users/", $value);
    }

    private function getNumEnding($iNumber, $aEnding)
    {
        $iNumber = $iNumber % 100;
        if ($iNumber >= 11 && $iNumber <= 19) {
            $sEnding = $aEnding[2];
        } else {
            $i = $iNumber % 10;
            switch ($i) {
                case (1):
                    $sEnding = $aEnding[0];
                    break;
                case (2):
                case (3):
                case (4):
                    $sEnding = $aEnding[1];
                    break;
                default:
                    $sEnding = $aEnding[2];
            }
        }

        return $sEnding;
    }
}
