<?php

namespace Bpocallaghan\Corporate\Models;

use App\Models\Traits\Documentable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Titan\Models\TitanCMSModel;
use Titan\Models\Traits\ActiveTrait;

/**
 * Class Tender
 * @mixin \Eloquent
 */
class Tender extends TitanCMSModel
{
    use SoftDeletes, ActiveTrait, Documentable;

    protected $table = 'tenders';

    protected $guarded = ['id'];

    protected $dates = ['active_from', 'active_to'];

    /**
     * Get the active from carbon instance
     *
     * @return static
     */
    public function getActiveToFormattedAttribute()
    {
        if($this->active_to)
        {
            return $this->active_to->format('d F Y');
        }

        return 'No Closing Date';
    }

    /**
     * Validation rules for this model
     */
    static public $rules = [
        'name'        => 'required|min:3:max:255',
        'content'     => 'required|min:5:max:2000',
        'active_from' => 'nullable|date',
        'active_to'   => 'nullable|date',
        'file'        => 'required|max:5000|mimes:pdf',
    ];
}