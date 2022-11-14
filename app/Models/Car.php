<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = "tb_car";
    protected $guarded = "id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'modelo',
        'marca_fabricante',
        'ano',
        'valor_tabela',
        'created_at',
        'updated_at'
    ];
}
