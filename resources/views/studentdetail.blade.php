@include('layouts')
@section('title')
    {{ __('Products') }}
@endsection
<?php
$reg_no = $dept = '';
$students = DB::table('students')
    ->join('studentfees', 'students.studentId', '=', 'studentfees.studentId')
    ->select('students.*', 'studentfees.*');
if(isset($_REQUEST['reg_no']) && $_REQUEST['reg_no'] != '')
{
    $students->where([['students.registerNumber','=',$_REQUEST['reg_no']]]);
    $reg_no = $_REQUEST['reg_no'];
}
if(isset($_REQUEST['dept']) && $_REQUEST['dept'] != '')
{
    $students->where([['students.department','=',$_REQUEST['dept']]]);
    $dept = $_REQUEST['dept'];
}
$students = $students->get();
?>
<div class="col-md-12 mt-4 p-2">
    <div class="card">
        <div class="card-header heading">
            <h5>Student Fees Detail</h5>
        </div>
        <div class="card_body">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
                <div class="row p-3">
                    <div class="col-md-4">
                        <label>Register Number</label>
                        <input type="number" name="reg_no" class="form-control" value="<?=$reg_no?>">
                    </div>
                    <div class="col-md-4">
                        <label>Department</label>
                        <input type="text" name="dept" class="form-control" value="<?=$dept?>">
                    </div>
                    <div class="col-md-4 mt-3">
                        {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-block heading btn-order', 'id' => 'submitButton', 'style' => '', 'onclick' => '']) !!}
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body" style="overflow-x:auto;">
            <table class="table table-bordered">
                <thead>
                    <th>Sno</th>
                    <th>Student Name</th>
                    <th>Register No</th>
                    <th>Student Type</th>
                    <th>Department</th>
                    <th>Year Of Joining</th>
                    <th>Quota</th>
                    <th>Previous Due</th>
                    <th>Tuition Amount</th>
                    <th>D/H</th>
                    <th>Total Fees</th>
                    <th>Fees Paid</th>
                    <th>Pending</th>
                </thead>
                <tbody>
                    <?php
                    $sno = 1;
                    foreach($students as $student)
                    {
                        // echo '<pre>';print_r($student);exit;
                        $fees_paid = 0;
                        echo "<tr>";
                        echo "<td>".$sno."</td>";
                        echo "<td>".$student->firstName." ".$student->lastName."</td>";
                        echo "<td>".$student->registerNumber."</td>";
                        echo "<td>".$student->studentType."</td>";
                        echo "<td>".$student->department."</td>";
                        echo "<td>".$student->yearOfJoining."</td>";
                        echo "<td>".$student->quota."</td>";
                        echo "<td>".$student->previoustutionDue."</td>";
                        echo "<td>".$student->tutionFees."</td>";
                        echo "<td>-</td>";
                        echo "<td>".$student->totalFees."</td>";
                        $fees = DB::table('payment_history')->selectRaw('SUM(totalFees) AS totalFees')->where([['student_id','=',$student->studentId],['payment_status','=','SUCCESS']])->get();
                        if(isset($fees[0]) && $fees[0]->totalFees != '')
                        {
                            $fees_paid = $fees[0]->totalFees;
                        }
                        echo "<td>".$fees_paid."</td>";
                        if($student->totalFees > 0)
                        {
                            $pending = $student->totalFees - $fees_paid;
                        }
                        else
                        {
                            $pending = $student->totalFees + $fees_paid;   
                        }
                        echo "<td>".$pending."</td>";
                        echo "</tr>";
                        $sno++;
                    } 
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>