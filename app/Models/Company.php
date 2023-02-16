<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class Company extends Model implements ToModel, FromCollection
{
    use HasFactory;
    protected $primaryKey = 'company_id';
    protected $fillable = ['company_code', 'company_name', 'company_description', 'company_status'];
    
    public function model(array $row)
    {
        return new Company([
            'company_code' => $row['0'],
            'company_name' => $row['1'],
            'company_description' => $row['2'],
            'company_status' => $row['3'],
        ]);
    }
    public function collection()
    {
        return Company::all();
    }
   

    
}


