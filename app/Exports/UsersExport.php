<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
//class UsersExport implements FromCollection
//{
//    /**
//    * @return \Illuminate\Support\Collection
//    */
//    public function collection()
//    {
//        return User::get();
//        //return User::select('name', 'username', 'email', 'phone', 'gender', 'image')->get();
//    }
//}


//
//
//
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromView {

    public function view(): View {
        return view('users.pdfUser', [
            'users' => User::get()
        ]);
    }

}
