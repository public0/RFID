<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Eloquent

{

   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */

   protected $fillable = [

       'name', 'email', 'password','userimage'

   ];

   /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */

   protected $hidden = [

       'password', 'remember_token',

   ];

   public function departments(): BelongsToMany
   {
       return $this->belongsToMany(Department::class);
   }

 }