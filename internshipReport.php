
<?php include "db_config.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Report Page</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="section-body mt-4">
                <div class="container-fluid">
                    <div class="tab-content">
                        <div class="tab-pane active" id="Staff-all">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="staffTable"
                                            class="table table-hover js-basic-example dataTable table-striped table_custom border-style spacing5">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>image</th>
                                                    <th>first Name</th>
                                                    <th>last Name</th>
                                                    <th>Number</th>
                                                    <th>Designation</th>
                                                    <!-- <th>Email</th> -->
                                                    <th>Joining Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $sql ="select * from internship";
                                                $result_student = $conn->query($sql);

                                                if ($result_student->num_rows > 0) {
                                                    // Output data of each row
                                                    $i = 1;
                                                    while ($row_student = $result_student->fetch_assoc()) {
                                                        $int_id = $row_student['int_id'];
                                                        $int_name = $row_student['int_name'];
                                                        $int_email = $row_student['int_email'];
                                                        $int_gender = $row_student['int_gender'];
                                                        $int_resume = $row_student['int_resume'];
                                                        $int_duration = $row_student['int_duration'];

                                                        ?>

                                                        <tr>
                                                            <td>
                                                                <div class="font-15"><?php echo $i;
                                                                $i++; ?></div>
                                                            </td>
                                                           
                                                            <td>
                                                                <div class="font-15"><?php echo $int_name; ?></div>
                                                            </td>
                                                            <td>
                                                                <div class="font-15"><?php echo $int_email; ?></div>
                                                            </td>
                                                            <td><a href="download.php?int_id=<?php echo $int_id; ?>">Download Resume</a></td>
                                                            <td><span class="text-muted"><?php echo $int_gender; ?></span></td>

                                                            <td><strong><?php echo $int_duration; ?> days</strong></td>

                                                            <td>
                                                                <button type="button" onclick="viewStaff(<?php echo $srt_id; ?>)"
                                                                    class="btn btn-icon btn-sm" title="View" data-toggle="tab"
                                                                    href="#Staff-profile"><i class="fa fa-eye"></i></button>

                                                                <button type="button" onclick="editStaff(<?php echo $srt_id; ?>)"
                                                                    class="btn btn-icon btn-sm" data-toggle="tab" href="#Staff-add">
                                                                    <i class="fa fa-edit"></i></button>

                                                                <button type="button" onclick="deleteStaff('<?php echo $srt_id; ?>', 
                                                                    '<?php echo $stf_first_name; ?>', '<?php echo $stf_last_name; ?>')"
                                                                    class="btn btn-icon btn-sm"><i
                                                                        class="fa fa-trash-o text-danger"></i></button>
                                                                <!-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Staff-add"></a></li> -->

                                                            </td>
                                                        </tr>
                                                    <?php }
                                                } ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="Staff-profile">
                            <div class="row justify-content-end mb-2">
                                <div class="col-auto">
                                    <a href="Staff.php" type="button" class="btn btn-outline-secondary">Close</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-md-12">
                                    <div class="card">
                                        <div class="card-body w_user">
                                            <div class="user_avtar">
                                                <img class="rounded-circle" id="staff_profileImage" src="" alt="">
                                            </div>
                                            <div class="wid-u-info">
                                                <h3>
                                                    <label for="" id="staff_firstname"></label>
                                                    <label for="" id="staff_lastname"></label>
                                                </h3>
                                                <h5>
                                                    User Name :<label for="" id="staff_username"></label><br>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Staff Information</h3>
                                            <div class="card-options">
                                                <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i
                                                        class="fe fe-chevron-up"></i></a>
                                            </div>
                                        </div>
                                        <div class="card-body">

                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <b>Joining Date</b>
                                                    <div class="pull-right" id="staff_Joining_Date"></div>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Gender </b>
                                                    <div class="pull-right" id="staff_gender"></div>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Position</b>
                                                    <div class="pull-right" id="staff_position"></div>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Phone</b>
                                                    <div class="pull-right" id="staff_Phone"></div>
                                                </li>

                                                <li class="list-group-item">
                                                    <b>Blood Group </b>
                                                    <div class="pull-right" id="staff_Blood_Group"></div>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Married Status</b>
                                                    <div class="pull-right" id="staff_Married_Status"></div>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Email</b>
                                                    <div class="pull-right" id="staff_email"></div>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Address</b>
                                                    <div class="pull-right" id="staff_Address"></div>
                                                </li>

                                            </ul>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="Staff-add">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Basic Information</h3>
                                            <div class="card-options ">
                                                <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i
                                                        class="fe fe-chevron-up"></i></a>
                                                <a href="staff.php" class="card-options-remove"><i
                                                        class="fe fe-x"></i></a>
                                            </div>
                                        </div>
                                        <form class="card-body" id="formStaff" 
                                             enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="first_name">First Name</label>
                                                        <input type="hidden" class="form-control" id="staff_id"
                                                            name="staff_id">
                                                        <input type="text" class="form-control" id="first_name"
                                                            name="first_name">
                                                        <div id="first_name-error" class="error-message">First Name is
                                                            required.</div>

                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="last_name">Last Name</label>
                                                        <input type="text" class="form-control" id="last_name"
                                                            name="last_name">
                                                        <div id="last_name-error" class="error-message">Last Name is
                                                            required.</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="joining_date">Joining Date</label>
                                                        <input type="date" data-date-autoclose="true"
                                                            class="form-control" id="joining_date" name="joining_date"
                                                            placeholder="">
                                                        <div id="joining_date-error" class="error-message">Joining Date
                                                            is required.</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <label for="gender">Gender</label>
                                                    <select class="form-control show-tick" id="gender" name="gender">
                                                        <option value="">-- Gender --</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                    <div id="gender-error" class="error-message">Gender is required.
                                                    </div>
                                                </div>


                                                <div class="col-md-6 col-sm-6">
                                                    <label for="gender">Position</label>
                                                    <select class="form-control show-tick" id="position"
                                                        name="position">
                                                        <option value="">Select the Positon</option>
                                                        <?php
                                                        $sql = "SELECT pos_id, pos_name FROM position";
                                                        $result = $conn->query($sql);
                                                        if ($result->num_rows > 0) {
                                                            // Output data of each row
                                                            while ($row = $result->fetch_assoc()) {

                                                                ?>
                                                                <option value="<?php echo $row['pos_id'] ?>">
                                                                    <?php echo $row['pos_name'] ?>
                                                                </option>
                                                            <?php }
                                                        }
                                                        $conn->close();
                                                        ?>
                                                    </select>
                                                    <div id="position-error" class="error-message">Position is required.
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="phone">Phone</label>
                                                        <input type="number" class="form-control" id="phone"
                                                            name="phone">
                                                        <div id="phone-error" class="error-message">Phone is required.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="email">Blood Group</label>
                                                        <select class="form-control input-height" id="bloodgroup"
                                                            name="bloodgroup">
                                                            <option value="">Select...</option>
                                                            <option value="A+">A+</option>
                                                            <option value="A-">A-</option>
                                                            <option value="B+">B+</option>
                                                            <option value="B-">B-</option>
                                                            <option value="AB+">AB+</option>
                                                            <option value="AB-">AB-</option>
                                                            <option value="O+">O+</option>
                                                            <option value="O-">O-</option>
                                                        </select>
                                                        <div id="bloodgroup-error" class="error-message">Blood Group is
                                                            required.</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="email">Married Status</label>
                                                        <select class="form-control show-tick" id="married_status"
                                                            name="married">
                                                            <option value="">Select Married Status</option>
                                                            <option value="Married">Married</option>
                                                            <option value="Single">Single</option>
                                                        </select>
                                                        <div id="married_status-error" class="error-message">Married
                                                            Status is required.</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="email">Enter Your Email</label>
                                                        <input type="email" class="form-control" id="email"
                                                            name="email">
                                                        <div id="email-error" class="error-message">Email is required.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="address">Address</label>
                                                        <input type="text" class="form-control" id="address"
                                                            name="address">
                                                        <div id="address-error" class="error-message">Address is
                                                            required.</div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="username">User Name</label>
                                                        <input type="text" class="form-control" id="username"
                                                            name="username">
                                                        <div id="username-error" class="error-message">User Name is
                                                            required.</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="password">Password</label>
                                                        <input type="password" class="form-control" id="password"
                                                            name="password">
                                                        <div id="password-error" class="error-message">Password is
                                                            required.</div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="form-group mt-2 mb-3">
                                                        <input type="file" class="dropify" id="file_upload"
                                                            name="file_upload" required>
                                                        <a id="imgLink" href="#" target="_blank"><span
                                                                id="spanImg"></span></a>
                                                        <small id="fileHelp" class="form-text text-muted">This is some
                                                            placeholder block-level help text for the above input. It's
                                                            a bit lighter and easily wraps to a new line.</small>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-primary" onclick="staffDetails()">Submit</button>
                                                <a href="Staff.php"><button type="button"
                                                        class="btn btn-outline-secondary">Cancel</button></a>
                                            </div>
                                    </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
            </div>
  <!-- Bootstrap JS (Optional, for certain features like dropdowns) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
