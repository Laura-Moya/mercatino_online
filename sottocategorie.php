<!DOCTYPE html>
<html lang="en" dir="ltr">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
var catAndActs = {};
catAndActs['Classroom Instruction and Assessment'] = ['Assessment Day', 'Common Assessment Development', 'Data Team', 'Kindergarten Screening', 'Other'];
catAndActs['Curriculum Development and Alignment'] = ['Capstone Development', 'Course Of Study Development / Revision', 'Standards Alignment / Rollout', 'Other'];
catAndActs['District Committee'] = ['Curriculum Council', 'Grading & Assessment Task Force', 'Professional Development Planning Committee', 'Race To The Top Committee', 'Teacher Evaluation Committee', 'Other'];
catAndActs['Meeting'] = ['Academic Support Team', 'ELL / eKLIP Teachers', 'Gifted Intervention Specialist', 'Intervention Assistance Team', 'Intervention Teachers', 'Kindergarten Parent Conference', 'KLIP Teachers', 'Title I Teachers', 'Other'];
catAndActs['Other Category'] = ['Other'];
catAndActs['Professional Conference'] = ['Conference'];
catAndActs['Professional Workshop / Training'] = ['In-District', 'Out-Of-District'];
catAndActs['Pupil Services'] = ['IEP Meeting', 'IEP Writing'];

function ChangecatList() {
    var catList = document.getElementById("validationCustom03");
    var actList = document.getElementById("validationCustom04");
    var selCat = catList.options[catList.selectedIndex].value;
    while (actList.options.length) {
        actList.remove(0);
    }
    var cats = catAndActs[selCat];
    if (cats) {
        var i;
        for (i = 0; i < cats.length; i++) {
            var cat = new Option(cats[i], i);
            actList.options.add(cat);
        }
    }
}
</script>

<body>
<div class="row">
  <div class="col-md-6 mb-3">
  	<label for="validationCustom03">Category:</label>
      <select class="form-control form-control-lg" name="category" id="validationCustom03" onchange="ChangecatList()" required>
        <option value="">Choose... </option>
        <option value="Classroom Instruction and Assessment">Classroom Instruction and Assessment</option>
        <option value="Curriculum Development and Alignment">Curriculum Development and Alignment</option>
        <option value="District Committee">District Committee</option>
        <option value="Meeting">Meeting</option>
        <option value="Other Category">Other Category</option>
        <option value="Professional Conference">Professional Conference</option>
        <option value="Professional Workshop / Training">Professional Workshop / Training</option>
        <option value="Pupil Services">Pupil Services</option>
      </select>
	<div class="invalid-feedback">
		Please provide a category.
	</div>
  </div>
  <div class="col-md-6 mb-3">
  	<label for="validationCustom04">Activity:</label>
     <select class="form-control form-control-lg" id="validationCustom04" name="activity" required></select>
    <div class="invalid-feedback">
		Please provide an activity.
	</div>
  </div>
</div>

  </body>
</html>
