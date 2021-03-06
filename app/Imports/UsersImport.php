<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'firstname'     => $row['firstname'],
            'lastname'      =>$row['lastname'],
            'email'    => $row['email'], 
            'password' => \Hash::make($row['password']),
            'telephone' => $row['telephone'],
            'token_count' => $row['token_count'],
            'verify_nonce'=> md5($row['password'].$row['email']),
        ]);
    }
}
