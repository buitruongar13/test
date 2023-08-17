<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employees;
$baseDir = 'C:\xampp\htdocs\CongNgheWeb\testLaravel\Xproject';
require $baseDir.'/vendor/autoload.php';
$app = require_once $baseDir.'/bootstrap/app.php';

class employeesController extends Controller
{
    public function getAllRecords()
    {
        $records = employees::all();
        return view('index', ['records' => $records]);
    }
    public function add(Request $request)
    {
        $name = $request->input('name');
        $address = $request->input('address');
        $salary = $request->input('salary');
        $date_of_birth = $request->input('date_of_birth');
        $dateOfBirth = date('Y/m/d', strtotime($date_of_birth));
        $email = $request->input('email');
        $phonenumber = $request->input('phonenumber');
        $gender = $request->input('gender');
        // echo $name;
        // thêm nhân viên mới
        $employee = new Employees();
        $employee->name = $name;
        $employee->address = $address;
        $employee->salary = $salary;
        $employee->date_of_birth = $dateOfBirth;
        $employee->email = $email;
        $employee->phonenumber = $phonenumber;
        $employee->gender = $gender;
        $employee->save();
        return $this->getAllRecords();
    }
    public function update(Request $request, $id)
    {
        // Lấy thông tin nhân viên từ CSDL
        $employee = employees::find($id);

        $name = $request->input('name');
        $address = $request->input('address');
        $salary = $request->input('salary');
        $date_of_birth = $request->input('date_of_birth');
        $dateOfBirth = date('Y/m/d', strtotime($date_of_birth));
        $email = $request->input('email');
        $phonenumber = $request->input('phonenumber');
        $gender = $request->input('gender');
        // Cập nhật thông tin cho nhân viên
        // $employee->name = $name;
        // $employee->address = $address;
        // $employee->salary = $salary;
        // $employee->date_of_birth = $dateOfBirth;
        // $employee->email = $email;
        // $employee->phonenumber = $phonenumber;
        // $employee->gender = $gender;
        // $employee->save();
        $employee->update([
            'name' => $name,
            'address' => $address,
            'salary' => $salary,
            'date_of_birth' => $dateOfBirth,
            'email' => $email,
            'phonenumber' => $phonenumber,
            'gender' => $gender,
        ]);
        return $this->getAllRecords();
    }
    public function delete($id)
    {
        // Tìm nhân viên cần xóa
        $employee = Employees::findOrFail($id);

        // Xóa nhân viên
        $employee->delete();
        return $this->getAllRecords();
    }
}
