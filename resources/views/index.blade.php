<?php
// Số dòng dữ liệu hiển thị trên mỗi trang
// $rowsPerPage = 7;

// // Tính toán tổng số trang dựa trên số lượng dòng dữ liệu
// $totalRows = count($records);
// $totalPages = ceil($totalRows / $rowsPerPage);

// // Xác định trang hiện tại thông qua truyền tham số page vào URL
// $currentPage = 1;
// if (isset($_GET['page'])) {
//     $currentPage = $_GET['page'];
// }

// // Tính chỉ số bắt đầu và kết thúc dữ liệu trên trang hiện tại
// $startIndex = ($currentPage - 1) * $rowsPerPage;
// $endIndex = $startIndex + $rowsPerPage;

// // Lấy các dòng dữ liệu tương ứng với trang hiện tại
// $currentPageData = array_slice($records, $startIndex, $rowsPerPage);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý nhân viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <div class="d-flex justify-content-center">
        <div>
            <div class="d-flex justify-content-lg-between">
                <h1><i><b>list the employees</b></i></h1>
                <div>
                    <!-- Button trigger modal -->
                    <button type="button" class="mt-2 btn btn-primary btn-outline-secondary text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">+ Add new Employee</button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('addRecord') }}" method="post">
                                    <div>
                                        @csrf
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Name">
                                        <label>Address</label>
                                        <input type="text" class="form-control" name="address" placeholder="Address">
                                        <label>Salary</label>
                                        <input type="number" class="form-control" name="salary" placeholder="Salary">
                                        <label>Date of birth</label>
                                        <input type="datetime" class="form-control" name="date_of_birth" placeholder="Date of birth">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Email">
                                        <label>PhoneNumber</label>
                                        <input type="tel" class="form-control" name="phonenumber" placeholder="PhoneNumber">
                                        <label>Gender</label>
                                        <select class="form-select" aria-label="Default select example" name="gender">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>

                                        <div class="d-flex justify-content-end mt-3">
                                            <button type="button" class="btn btn-secondary m-2" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-dark m-2">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <table class="mt-4">
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Address</th>
                    <th class="text-center">Salary</th>
                    <th class="text-center">Action</th>
                </tr>
                <?php foreach ($records as $record){
                    $dateOfBirth = date('d/m/Y', strtotime($record['date_of_birth']));
                ?>
                    <tr>
                        <td class="text-center"><?php echo $record['id'];?></td>
                        <td class="testt text-center"><?php echo $record['name'];?></td>
                        <td class="test text-center"><?php echo $record['address'];?></td>
                        <td class="text-center"><?php echo $record['salary'];?></td>
                        <td class="text-center">
                            <div class="d-flex">
                                <!-- <button type="button" class=" btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModall"><i class="fa-solid fa-eye" style="color: #005eff;"></i></button> -->
                                <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $record['id']; ?>">
                                    <i class="fa-solid fa-eye" style="color: #005eff;"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal<?php echo $record['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Employee</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div>
                                                        <label style="float: left;">Name</label>
                                                        <input type="text" class="form-control" name="name" value="<?php echo $record['name'];?>">
                                                        <label style="float: left;">Address</label>
                                                        <input type="text" class="form-control" name="address" value="<?php echo $record['address'];?>">
                                                        <label style="float: left;">Salary</label>
                                                        <input type="number" class="form-control" name="salary" value="<?php echo $record['salary'];?>">
                                                        <label style="float: left;">Date of birth</label>
                                                        <input type="datetime" class="form-control" name="date_of_birth" value="<?php echo $dateOfBirth;?>">
                                                        <label style="float: left;">Email</label>
                                                        <input type="email" class="form-control" name="email" value="<?php echo $record['email'];?>">
                                                        <label style="float: left;">PhoneNumber</label>
                                                        <input type="tel" class="form-control" name="phonenumber" value="<?php echo $record['phonenumber'];?>">
                                                        <label style="float: left;">Gender</label>
                                                        <select class="form-select" aria-label="Default select example">
                                                            <option value=""><?php echo $record['gender'];?></option>
                                                            <?php if ($record['gender'] !== 'Male') echo "<option value='Male'>Male</option>"; ?>
                                                            <?php if ($record['gender'] !== 'Female') echo "<option value='Female'>Female</option>"; ?>
                                                            <?php if ($record['gender'] !== 'Other') echo "<option value='Other'>Other</option>"; ?>
                                                        </select>
                                                        <div class="d-flex justify-content-end mt-3">
                                                            <button type="button" class="btn btn-secondary m-2" data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class=" btn btn-secondary m-2" data-bs-toggle="modal" data-bs-target="#exampleModall<?php echo $record['id']; ?>">Edit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class=" btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModall<?php echo $record['id']; ?>">
                                    <i class="fa-solid fa-pen" style="color: #005eff;"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModall<?php echo $record['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="{{ route('updateRecord', ['id' => $record['id'], 'a' => 'update', 'b' => $record['id']]) }}" method="POST">
                                                    <div>
                                                        @csrf
                                                        <label style="float: left;">Name</label>
                                                        <input type="text" class="form-control" name="name" value="<?php echo $record['name'];?>">
                                                        <label style="float: left;">Address</label>
                                                        <input type="text" class="form-control" name="address" value="<?php echo $record['address'];?>">
                                                        <label style="float: left;">Salary</label>
                                                        <input type="number" class="form-control" name="salary" value="<?php echo $record['salary'];?>">
                                                        <label style="float: left;">Date of birth</label>
                                                        <input type="datetime" class="form-control" name="date_of_birth" value="<?php echo $dateOfBirth;?>">
                                                        <label style="float: left;">Email</label>
                                                        <input type="email" class="form-control" name="email" value="<?php echo $record['email'];?>">
                                                        <label style="float: left;">PhoneNumber</label>
                                                        <input type="tel" class="form-control" name="phonenumber" value="<?php echo $record['phonenumber'];?>">
                                                        <label style="float: left;">Gender</label>
                                                        <select class="form-select" aria-label="Default select example" name="gender">
                                                            <option value=""><?php echo $record['gender'];?></option>
                                                            <?php if ($record['gender'] !== 'Male') echo "<option value='Male'>Male</option>"; ?>
                                                            <?php if ($record['gender'] !== 'Female') echo "<option value='Female'>Female</option>"; ?>
                                                            <?php if ($record['gender'] !== 'Other') echo "<option value='Other'>Other</option>"; ?>
                                                        </select>

                                                        <div class="d-flex justify-content-end mt-3">
                                                            <button type="button" class="btn btn-secondary m-2" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-dark m-2">Save</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ route('deleteRecord', ['id' => $record['id'], 'a' => 'delete', 'b' => $record['id']]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class=" btn btn-link">
                                        <i class="fa-solid fa-trash-can" style="color: #005eff;"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </table>
        </div>

        <style>
            table, th, td{
                border: 1px solid black;
                text-align: left;
            }
            td,th {
                width: 100px;
            }
            .test {
                width: 200px;
            }
            .testt {
                width: 150px;
            }
            .btn-primary {
                background-color: green;
            }
        </style>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
