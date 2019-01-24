<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<div class="container">
  <h2>Bordered Table</h2>
  <p>The .table-bordered class adds borders to a table:</p>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>SL</th>
        <th>Questions</th>
        <th>Questions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Home address is correct as per NID/Chairman/birth certificate/Passport-</td>
        <td>
			<div class="form-group">
			<label class="control-label col-md-3">Answer</label>
			<div class="col-md-4">
				<select class="form-control" name="subjectchoice5" id="subjectchoice5" >
				<option value="Please select..."></option>
				<option value="5">Yes</option>
				<option value="0">No</option>
				<?php	
					/*foreach ($data as $row){
						echo "<option value='".$row['SubjectID']."'";
							if($subjectchoice5==$row['SubjectID']){
								echo " selected ";
							}
						echo ">".$row['SubjectName']."</option>";
					}*/
				?>									
				</select>
			</div>
			</div>
		</td>
      </tr>
    </tbody>
  </table>
</div>


