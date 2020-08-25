<?php

namespace App\Http\Controllers;

use App\User;
use App\Hobby;
use App\Division;
use App\District;
use App\thana;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use PDF;

class UserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        $data = $request->all();
        //$users = User::get();
        $users = User::select('id', 'name', 'username', 'email', 'phone', 'gender', 'image');
        if (!empty($request->filter_text)) {
            $filterText = $request->filter_text;
            $users->where(function($query) use($filterText) {
                $query->where('username', 'like', '%' . $filterText . '%')
                        ->orWhere('phone', $filterText);
            });
        }
        if (!empty($request->gender)) {
            $users = $users->where('gender', $request->gender);
        }
        $users = $users->paginate(3);
//
//        echo '<pre>';
//        print_r($users);
//        exit;
        return view('users.index')->with(compact('users', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $divisionList = ['0' => __('label.SELECT_DIVISION_OPT')] + Division::pluck('name', 'id')->toArray();
        $hobbyList = ['0' => __('label.SELECT_HOBBY_OPT')] + Hobby::pluck('name', 'id')->toArray();
        $districtList = ['0' => __('label.SELECT_DISTRICT_OPT')];
        $thanaList = ['0' => __('label.SELECT_THANA_OPT')];
        return view('users.create')->with(compact('hobbyList', 'divisionList'
                                , 'districtList', 'thanaList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $rules = [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3|same:password_confirmation',
            'password_confirmation' => 'required|min:3',
            'image' => 'image|mimes:jpeg,png,jfif,jpg,gif,webp|max:2048',
        ];

        $message = [
            //'name.required' => 'Required',
            'string' => 'The :attribute field is string.',
            'image.max' => 'The :attribute should not exeed from 2.',
            'same' => 'The :attribute and :other must match.',
//            '' => 'The :attribute field is required.',
//            '' => 'The :attribute field is required.',
        ];
//        echo '<pre>';
//        print_r($message);
//        exit;
        $request->validate($rules, $message);

        // $password = Hash::make($request->password);
        #############  File Upload :: START #######################     
        if ($file = $request->file('image')) {
            $filePath = 'public/uploads/images/users';
            $fileName = uniqid() . "." . $file->getClientOriginalExtension();
            $file->move($filePath, $fileName);
        }
        $user = new User;
        if (!empty($request->file('image'))) {
            $user->image = $fileName;
        }
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if (!empty($request->phone)) {
            $user->phone = $request->phone;
        }
        if (!empty($request->gender)) {
            $user->gender = $request->gender;
        }
        //$user->thana_id = $request->thana_id;
        $user->hobby_id = $request->hobby_id;
//        if (!empty($request->address_id)) {
//            $user->address_flag = $request->address_id;
//        }

        if (!empty($request->address_id) && !empty($request->thana_id)) {
            $user->address_flag = $request->address_id;
        }
        if (!empty($request->thana_id) && $request->address == '1') {
            $user->thana_id = $request->thana_id;
        } else {
            $user->thana_id = '0';
        }


        if ($user->save()) {
            return redirect('users')->with('create', 'User added successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $user = User::find($id);
        $thanaID = $user->thana_id;

        $selectedThana = Thana::where('id', !empty($thanaID) ? $thanaID : 0)->select('id', 'district_id', 'name')->first();
        $selectedDistrict = District::where('id', !empty($selectedThana->district_id) ? $selectedThana->district_id : 0)->select('id', 'division_id', 'name')->first();
        $selectedDivision = Division::where('id', !empty($selectedDistrict->division_id) ? $selectedDistrict->division_id : 0)->select('id', 'name')->first();



        $divisionList = ['0' => __('label.SELECT_DIVISION_OPT')] + Division::pluck('name', 'id')->toArray();
        $districtList = ['0' => __('label.SELECT_DISTRICT_OPT')] + District::where('division_id', !empty($selectedDistrict->division_id) ? $selectedDistrict->division_id : 0)->pluck('name', 'id')->toArray();
        $thanaList = ['0' => __('label.SELECT_THANA_OPT')] + Thana::where('district_id', !empty($selectedThana->district_id) ? $selectedThana->district_id : 0)->pluck('name', 'id')->toArray();

        $hobbyList = ['0' => __('label.SELECT_HOBBY_OPT')] + Hobby::pluck('name', 'id')->toArray();
        return view('users.edit', compact('user', 'hobbyList', 'divisionList', 'districtList', 'thanaList', 'selectedDistrict', 'selectedDivision'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $rules = [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'same:password_confirmation',
            'image' => 'image|mimes:jpeg,png,jfif,jpg,gif,webp|max:2048',
        ];
        if (!empty($request->password)) {
            $rules = [
                'password' => 'min:3'
            ];
        }
        $request->validate($rules);

        $user = User::find($id);

        #############  File Upload :: START #######################     
        if ($file = $request->file('image')) {
            $filePath = 'public/uploads/images/users';
            $fileName = uniqid() . "." . $file->getClientOriginalExtension();
            $file->move($filePath, $fileName);
        }

        if (!empty($request->file('image'))) {
            $user->image = $fileName;
            //Update with Folder
            $filePath2 = public_path("uploads/images/users/" . $request->get('prev_image'));
            if (File::exists($filePath2))
                File::delete($filePath2);
        }

        $user->name = $request->get('name');
        $user->username = $request->get('username');
        $user->email = $request->get('email');
        if (!empty($request->password)) {
            $user->password = Hash::make($request->get('password'));
        }

        if (!empty($request->phone)) {
            $user->phone = $request->phone;
        }
        if (!empty($request->gender)) {
            $user->gender = $request->gender;
        }
        if (!empty($request->gender)) {
            $user->hobby_id = $request->hobby_id;
        }
        if (!empty($request->address_id) && !empty($request->thana_id)) {
            $user->address_flag = $request->address_id;
        }
        if (!empty($request->thana_id) && $request->address == '1') {
            $user->thana_id = $request->thana_id;
        } else {
            $user->thana_id = '0';
        }
        $user->save();

        return redirect('users')->with('update', 'User have been  updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $user = User::find($id);
        $filePath = public_path("uploads/images/users/" . $user->image);
//        echo '<pre>';
//        print_r($filePath);
//        exit;
        if (File::exists($filePath))
            File::delete($filePath);
        $user->delete();

        return redirect('users')->with('delete', 'User have been deleted!');
    }

    //For Districts
    public function getDistrict(Request $request) {
        $districtList = ['0' => __('label.SELECT_DISTRICT_OPT')] + District::where('division_id', $request->division_id)->pluck('name', 'id')->toArray();
        $thanaList = ['0' => __('label.SELECT_THANA_OPT')];

        $html = view('users.districts')->with(compact('districtList'))->render();
        $htmlThana = view('users.thana')->with(compact('thanaList'))->render();

        return response()->json(['html' => $html, 'htmlThana' => $htmlThana]);
    }

    //For Districts
    public function getThana(Request $request) {
        $thanaList = ['0' => __('label.SELECT_THANA_OPT')] + THANA::where('district_id', $request->district_id)->pluck('name', 'id')->toArray();
        $html = view('users.thana')->with(compact('thanaList'))->render();
        return response()->json(['html' => $html]);
    }

    public function filter(Request $request) {
        $filterText = $request->filter_text;
        $gender = $request->gender;
        $url = 'filter_text=' . $filterText . "&gender=" . $gender;
        return redirect('users?' . $url);
    }

    //User in Excel
    public function exportUser() {
        return Excel::download(new UsersExport, 'users.xlsx');
        // return (new UsersExport)->download('users.pdfUser', \Maatwebsite\Excel\Excel::DOMPDF);
    }

    //User print
    public function printUser() {
        $users = User::get();
        return view('users.pdfUser')->with(compact('users'));
    }

    //User print
    public function pdfUser() {
        $users = User::select('name', 'username', 'email', 'phone', 'gender', 'image')->get();
        $pdf = PDF::loadView('users.pdfUser', compact('users'));

        // download PDF file with download method
        return $pdf->download('users.pdf');
        //return view('users.printUser')->with(compact('users'));
    }

    //End UserController Class
}
