<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    public function sendMail(){
        echo "Mail sent"; // dont really use echo in Laravel
    }
}
$company = Company::find(1);
$company -> sendMail();
// private functions are not accessible outside the class
// public functions are accessible outside the class
// protected functions are accessible within the class and its children but not outside the class