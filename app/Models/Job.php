<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function parent()
    {
        return $this->belongsTo(Job::class, 'parent_id');
    }

    public function type()
    {
        return $this->belongsTo(JobType::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function priority()
    {
        return $this->belongsTo(Priority::class);
    }

    public function files()
    {
        return $this->belongsToMany(File::class);
    }

    public function assigner()
    {
        return $this->belongsTo(Staff::class, 'assigner_id');
    }

    public function assignee()
    {
        return $this->belongsToMany(Staff::class, 'job_assigns')->using(JobAssign::class)->withPivot('role', 'direct_report', 'sms');
    }

    public function updateHistories()
    {
        return $this->hasMany(UpdateJobHistory::class);
    }
}
