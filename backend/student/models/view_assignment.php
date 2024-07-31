<button type="button" class="btn btn-info" data-toggle="modal" data-target="#basicModal-<?php echo $row['assignment_id'] ?>">View</button>

<?php
$id = $row['assignment_id'];
$a_sql = "SELECT assignments.*, instructors.first_name as InstructorFirstName,instructors.last_name as InstructorLastName, lectures.title as LectureTitle 
                    FROM assignments
                    join instructors on instructors.id = assignments.instructor_id
                    join lectures on lectures.lecture_id = assignments.lecture_id
                    WHERE assignment_id = '$id'";
$a_result = $conn->query($a_sql);
if ($a_row = $a_result->fetch_assoc()) {
?>
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="basicModal-<?php echo $row['assignment_id'] ?>" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo $a_row['title'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <th>Instructor</th>
                            <td class="text-right"><?php echo $a_row['InstructorFirstName'] ?> <?php echo $a_row['InstructorLastName'] ?></td>
                        </tr>
                        <tr>
                            <th>Lecture</th>
                            <td class="text-right"><?php echo $a_row['LectureTitle'] ?></td>
                        </tr>
                        <tr>
                            <th>Title</th>
                            <td class="text-right"><?php echo $a_row['title'] ?></td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td class="text-right"><?php echo $a_row['description'] ?></td>
                        </tr>
                        <tr>
                            <th>Due Date</th>
                            <td class="text-right"><?php echo $a_row['due_date'] ?></td>
                        </tr>
                        <tr>
                            <th>Submit Assignment</th>
                            <td class="text-right" style="width: 300px;">
                                <?php
                                $id = $row['assignment_id'];
                                $s_sql = "SELECT * FROM assignment_submission WHERE assignment_id = $id";
                                $s_result = $conn->query($s_sql);
                                if ($s_result && $s_result->num_rows > 0) {
                                    $sol = $s_result->fetch_assoc();
                                    echo '<a class="text-info" target="_blank"href='. $sol['solution'] .'>Solution</a> : <span>'. $sol['submission_date'] .'</span>'; 
                                } else {
                                    if ($a_row['due_date'] >= date("Y-m-d")) {
                                ?>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="assignment_id" value="<?php echo htmlspecialchars($a_row['assignment_id']); ?>">
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" name="solution" placeholder="Select Assignment" required>
                                                <div class="input-group-append">
                                                    <input class="btn btn-outline-secondary" type="submit" name="submit_assignment" value="Submit">
                                                </div>
                                            </div>
                                        </form>
                                <?php
                                    } else {
                                        echo '<p class="text-danger">Due date has passed</p>';
                                    }
                                }
                                ?>
                            </td>
                        </tr>

                    <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>