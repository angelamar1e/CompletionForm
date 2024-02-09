// accessing html elements from request_info.php through their ids
grades_form = document.getElementById("grades_form");
name_form = document.getElementById("name_form");

// fields required for late reporting and completion requests
final_grade_select = document.getElementById("grades");
units_field = document.getElementById('units');
request1_by = document.getElementById('request1_by');

// fields required for correction requests
fname = document.getElementById('modified_fname');
mname = document.getElementById('modified_mname');
lname = document.getElementById('modified_lname');
request2_by = document.getElementById('request2_by');

function modify_grade(){
    grades_form.style.display = 'flex';
    name_form.style.display = 'none';
    fname.removeAttribute('required');
    mname.removeAttribute('required');
    lname.removeAttribute('required');
    request2_by.removeAttribute('required');
    final_grade_select.setAttribute('required','');
    units_field.setAttribute('required','');
    request1_by.setAttribute('required','');
}

function correct_name(){
    grades_form.style.display = 'none';
    name_form.style.display = 'flex';
    final_grade_select.removeAttribute('required');
    units_field.removeAttribute('required');
    request1_by.removeAttribute('required');
    fname.setAttribute('required','');
    mname.setAttribute('required','');
    lname.setAttribute('required','');
    request2_by.setAttribute('required','');
}

// when a radio button is clicked, display its corresponding form
document.getElementById('late').addEventListener("click",modify_grade);
document.getElementById('completion').addEventListener("click",modify_grade);
document.getElementById('correction').addEventListener("click",correct_name);