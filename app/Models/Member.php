<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends BaseModel
{
    use HasFactory, SoftDeletes;

    public $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function type()
    {
        return $this->belongsTo(MemberType::class, 'member_type');
    }
    public function csFirm()
    {
        return $this->hasOne(CsFirm::class, 'member_id');
    }

    public function member_type()
    {
        switch ($this->type) {
            case '0':
                return 'Associate Member';

            case '1':
                return 'Fellow Member';

            default:
                return '';
        }
    }

    public function member_honorary()
    {
        switch ($this->honorary) {
            case '0':
                return 'False';

            case '1':
                return 'True';

            default:
                return 'Not Found';
        }
    }

    public function member_status()
    {
        switch ($this->mem_current_status	) {
            case '1':
                return 'Active';

            case '2':
                return 'Inactive';

            case '3':
                return 'Deceased';

            case '4':
                return 'Cancelled';

            default:
                return 'Not Found';
        }
    }

    public function email_status()
    {
        switch ($this->notify_email	) {
            case 0:
                return 'Muted';

            case 1:
                return 'Notify';

            default:
                return '';
        }
    }

}
