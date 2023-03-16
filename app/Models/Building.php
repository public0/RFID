<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Building extends Eloquent

{

   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */

   protected $fillable = [

       'name'

   ];

   /*
   * Get Todo of User
   *
   */

   public function departments(): BelongsToMany
   {
       return $this->belongsToMany(Department::class);
   }

 }