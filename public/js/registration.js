/* 
Orginal Page: http://thecodeplayer.com/walkthrough/jquery-multi-step-form-with-progress-bar 

*/
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

var emailPat = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

// new student 
var degree;
var universities = [];
var majors = [];

// new consultant
var country;
var university;
var major;
var skills = [];

var daForm = document.forms['msform'];
var passwordOk;

$(".next").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	//activate next step on progressbar using the index of next_fs
	$(".progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'transform': 'scale('+scale+')'});
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".previous").click(function(){
	for(var i=0;i<$(".action-button").size();i++) {
		$(".action-button")[i].style.boxShadow = "";
	}

	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$(".progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".submit").click(function(){
	return false;
});

$(".action-button").click(function() {
	if(this.style.boxShadow=="" || this.style.boxShadow=="0px 0px 0px 0px") {
		this.style.boxShadow = "0 0 0 1px white, 0 0 0 5px #6b6b6b";
		return;
	}
	else {
		this.style.boxShadow = "0px 0px 0px 0px";
		return;
	}
});

$(".textInput").change(function() {
	// check password
	if(daForm.elements['password'].value != daForm.elements['repeatpassword'].value || daForm.elements['password'].value.length<6) {
		daForm.elements['password'].style.borderColor = 'red';
		daForm.elements['repeatpassword'].style.borderColor = 'red';
		passwordOk = false;
		emailOk = false;
		$(".submit").addClass("not-active");
	}
	else {
		daForm.elements['password'].style.borderColor = '#CCC';
		daForm.elements['repeatpassword'].style.borderColor = '#CCC';
		passwordOk = true;
	};

	// check email
	if(!emailPat.test(daForm.elements['email'].value)) {
		daForm.elements['email'].style.borderColor = 'red';
		$(".submit").addClass("not-active");
		emailOk = false;
	}
	else {
		daForm.elements['email'].style.borderColor = '#CCC';
		emailOk = true;
	}

	if(passwordOk && emailOk) {
		$(".submit").removeClass("not-active");
	}
	else {
		$(".submit").addClass("not-active");
	}
});

function disableSubmit() {
	$(".submit").addClass("not-active");
	$(".fa-chevron-circle-right").addClass("not-active");
	passwordOk = false;
}

function setDegree(deg) {
	degree = deg;
}

function setCountry(coun) {
	country = coun;
}

function setUniversity(uni) {
	university = uni;
	$("#aUniversity").removeClass("not-active");
}

function setMajor(maj) {
	major = maj;
	$("#aMajor").removeClass("not-active");
}

function addUniversity(uni) {
	var tindex = jQuery.inArray(uni,universities);
	if(tindex === -1) {
		if(uni=='') ;
		else universities.push(uni);
		$("#aUniversities").removeClass("not-active");	
	}
	else {
		universities.splice(tindex,1);
		if(universities.length===0) {
			$("#aUniversities").addClass("not-active");
		}
	}
}

function addMajor(major) {
	var tindex = jQuery.inArray(major,majors);
	if(tindex === -1) {
		if(major=='') ;
		else majors.push(major);
		$("#aMajors").removeClass("not-active");	
	}
	else {
		majors.splice(tindex,1);
		if(majors.length===0) {
			$("#aMajors").addClass("not-active");
		}
	}
}

function addSkill(skill) {
	var tindex = jQuery.inArray(skill,skills);
	if(tindex === -1) {
		skills.push(skill);
		$("#aSkills").removeClass("not-active");	
	}
	else {
		skills.splice(tindex,1);
		if(skills.length===0) {
			$("#aSkills").addClass("not-active");
		}
	}
}

function msSubmit(type) {
	// student registration
	if(type == 1) {
		daForm.elements['degree'].value = degree;
		daForm.elements['universities'].value = universities;
		daForm.elements['majors'].value = majors;
		document.getElementById('msform').submit();
	}
	// consultant registration
	if(type == 2) {
		daForm.elements['degree'].value = degree;
		daForm.elements['major'].value = major;
		daForm.elements['university'].value = university;
		daForm.elements['skills'].value = skills;
		document.getElementById('msform').submit();
	}
}


