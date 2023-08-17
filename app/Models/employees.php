<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
    use HasFactory;
    protected $table = 'employees'; // Thay 'table_name' bằng tên của bảng dữ liệu
    protected $primaryKey = 'id'; // Thay 'id' bằng tên cột làm khóa chính của bảng
    public $timestamps = false; // Nếu không sử dụng cột 'created_at' và 'updated_at'
    protected $fillable = ['id', 'name', 'address', 'salary', 'date_of_birth', 'email', 'phonenumber', 'gender'];
}
