<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class JobPlacement extends BaseModel
{
    use HasFactory;

    public $guarded = [];

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
                ['routeName' => 'job_placement.status.jp_edit',   'params' => [$id,'accept'], 'label' => 'Accept', 'className' => 'accept'],
                ['routeName' => 'job_placement.status.jp_edit',   'params' => [$id,'declined'], 'label' => 'Declined'],
                ['routeName' => 'job_placement.status.jp_edit',   'params' => [$id,'disclosed'], 'label' => 'Disclosed'],
                ['routeName' => 'job_placement.jp_edit',   'params' => [$id], 'label' => 'Update'],
                ['routeName' => 'job_placement.jp_delete', 'params' => [$id], 'label' => 'Delete', 'delete' => true],
            ]];
        } elseif($this->status == 1) {
            return['menuItems' => [
                ['routeName' => '', 'label' => 'View'],
                ['routeName' => '',   'params' => [$id,'accept'], 'label' => 'Accept', 'className' => 'accept'],
                ['routeName' => 'job_placement.status.jp_edit',   'params' => [$id,'declined'], 'label' => 'Declined'],
                ['routeName' => 'job_placement.status.jp_edit',   'params' => [$id,'disclosed'], 'label' => 'Disclosed'],
                ['routeName' => 'job_placement.jp_edit',   'params' => [$id], 'label' => 'Update'],
                ['routeName' => 'job_placement.jp_delete', 'params' => [$id], 'label' => 'Delete', 'delete' => true],
            ]];
        }elseif($this->status == -1){
            return['menuItems' => [
                ['routeName' => '', 'label' => 'View'],
                ['routeName' => 'job_placement.status.jp_edit',   'params' => [$id,'accept'], 'label' => 'Accept', 'className' => 'accept'],
                ['routeName' => '',   'params' => [$id,'declined'], 'label' => 'Declined'],
                ['routeName' => 'job_placement.status.jp_edit',   'params' => [$id,'disclosed'], 'label' => 'Disclosed'],
                ['routeName' => 'job_placement.jp_edit',   'params' => [$id], 'label' => 'Update'],
                ['routeName' => 'job_placement.jp_delete', 'params' => [$id], 'label' => 'Delete', 'delete' => true],
            ]];
        }else{
            return['menuItems' => [
                ['routeName' => '', 'label' => 'View'],
                ['routeName' => 'job_placement.jp_edit',   'params' => [$id], 'label' => 'Update'],
                ['routeName' => 'job_placement.jp_delete', 'params' => [$id], 'label' => 'Delete', 'delete' => true],
            ]];
        }
    }
}
