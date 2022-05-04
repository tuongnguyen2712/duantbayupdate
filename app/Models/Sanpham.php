<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    use HasFactory;
    protected $table = 'sanpham';
    protected $primaryKey = 'id';
    protected $fillable = [
        'meta_title',
        'iddanhmuc',
        'name',
        'meta_desc',
        'slug',
        'img',
        'soluotmua',
        'tonkho',
        'dongia',
        'mota',
        'noidung',
        'giamgia',
        'trangthai',
    ];
}
