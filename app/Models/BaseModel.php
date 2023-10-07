<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function created_user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function updated_user()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
    public function deleted_user()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }

    public function getPermission()
    {
        if($this->permission == 1){
            return 'Accepted';
        }elseif($this->permission == 0){
            return 'Pending';
        }elseif($this->permission == -1){
            return 'Declined';
        }else{
            return'Not Specified';
        }
    }
    public function getPermissionClass()
    {
        if($this->permission == 1){
            return 'btn-success';
        }elseif($this->permission == 0){
            return 'btn-info';
        }elseif($this->permission == -1){
            return 'btn-danger';
        }else{
            return'';
        }
    }
    public function getPermissionAcceptTogleClassName()
    {
        if($this->permission != 1 || $this->permission == 0){
            return 'd-block';
        }else{
            return'd-none';
        }
    }
    public function getPermissionDeclineTogleClassName()
    {
        if($this->permission != -1 || $this->permission == 0){
            return 'd-block';
        }else{
            return'd-none';
        }
    }

    public function getStatus()
    {
        if ($this->status == 1) {
            return 'Active';
        } else {
            return 'Deactive';
        }
    }
    public function getMultiStatus()
    {
        if ($this->status == 0) {
            return 'Pending';
        } elseif($this->status == 1) {
            return 'Accepted';
        }elseif($this->status == -1){
            return 'Declined';
        }else{
            return 'Disclosed';
        }
    }

    public function getStatusClass()
    {
        if ($this->status == 1) {
            return 'btn-success';
        } else {
            return 'btn-danger';
        }
    }
    public function getMultiStatusClass()
    {
        if ($this->status == 0) {
            return 'badge-info';
        } elseif($this->status == 1) {
            return 'badge-success';
        }elseif($this->status == -1){
            return 'badge-warning';
        }else{
            return 'badge-danger';
        }
    }
    public function getMultiStatusBtn($id)
    {
        if ($this->status == 0) {
            return['menuItems' => [
                ['routeName' => '', 'label' => 'View'],
                ['routeName' => 'job_placement.status.jp_edit',   'params' => [$id,'accept'], 'label' => 'Accept'],
                ['routeName' => 'job_placement.status.jp_edit',   'params' => [$id,'declined'], 'label' => 'Declined'],
                ['routeName' => 'job_placement.status.jp_edit',   'params' => [$id,'disclosed'], 'label' => 'Disclosed'],
                ['routeName' => 'job_placement.jp_edit',   'params' => [$id], 'label' => 'Update'],
                ['routeName' => 'job_placement.jp_delete', 'params' => [$id], 'label' => 'Delete', 'delete' => true],
            ]];
        } elseif($this->status == 1) {
            return['menuItems' => [
                ['routeName' => '', 'label' => 'View'],
                ['routeName' => '',   'params' => [$id,'accept'], 'label' => 'Accept'],
                ['routeName' => 'job_placement.status.jp_edit',   'params' => [$id,'declined'], 'label' => 'Declined'],
                ['routeName' => 'job_placement.status.jp_edit',   'params' => [$id,'disclosed'], 'label' => 'Disclosed'],
                ['routeName' => 'job_placement.jp_edit',   'params' => [$id], 'label' => 'Update'],
                ['routeName' => 'job_placement.jp_delete', 'params' => [$id], 'label' => 'Delete', 'delete' => true],
            ]];
        }elseif($this->status == -1){
            return['menuItems' => [
                ['routeName' => '', 'label' => 'View'],
                ['routeName' => 'job_placement.status.jp_edit',   'params' => [$id,'accept'], 'label' => 'Accept'],
                ['routeName' => '',   'params' => [$id,'declined'], 'label' => 'Declined'],
                ['routeName' => 'job_placement.status.jp_edit',   'params' => [$id,'disclosed'], 'label' => 'Disclosed'],
                ['routeName' => 'job_placement.jp_edit',   'params' => [$id], 'label' => 'Update'],
                ['routeName' => 'job_placement.jp_delete', 'params' => [$id], 'label' => 'Delete', 'delete' => true],
            ]];
        }else{
            return['menuItems' => [
                ['routeName' => '', 'label' => 'View'],
                ['routeName' => 'job_placement.status.jp_edit',   'params' => [$id,'restore'], 'label' => 'Restore'],
                ['routeName' => 'job_placement.jp_edit',   'params' => [$id], 'label' => 'Update'],
                ['routeName' => 'job_placement.jp_delete', 'params' => [$id], 'label' => 'Delete', 'delete' => true],
            ]];
        }
    }
    public function getFeatured()
    {
        if ($this->is_featured == 1) {
            return 'Remove from featured';
        } else {
            return 'Make featured';
        }
    }
    public function getFeaturedStatus()
    {
        if ($this->is_featured == 1) {
            return "Yes";
        } else {
            return "No";
        }
    }
    public function getFeaturedStatusClass()
    {
        if ($this->is_featured == 1) {
            return "badge badge-primary";
        } else {
            return "badge badge-secondary";
        }
    }
}
