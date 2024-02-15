<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      schema="Photo",
 *      required={"user_id","photo_details_id","url"},
 *      @OA\Property(
 *          property="url",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="created_at",
 *          description="",
 *          readOnly=true,
 *          nullable=true,
 *          type="string",
 *          format="date-time"
 *      ),
 *      @OA\Property(
 *          property="updated_at",
 *          description="",
 *          readOnly=true,
 *          nullable=true,
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */class Photo extends Model
{
    public $table = 'photos';

    public $fillable = [
        'user_id',
        'photo_details_id',
        'url'
    ];

    protected $casts = [
        'url' => 'string'
    ];

    public static array $rules = [
        'user_id' => 'required',
        'photo_details_id' => 'required',
        'url' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function photoDetails(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Photodetalle::class, 'photo_details_id');
    }
}
