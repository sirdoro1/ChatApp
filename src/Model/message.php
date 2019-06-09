<?php
namespace ChatApp\Model;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['text'];
}
