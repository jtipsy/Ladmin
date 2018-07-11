<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\WebActionAttributeTrait;

class Image extends Model
{
	use WebActionAttributeTrait;
	
    protected $table = 'images';

	protected $action = "admin/image/select";
	
    protected $fillable = ['path','file_id'];
}
