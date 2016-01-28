/* 
Orginal Page: http://thecodeplayer.com/walkthrough/jquery-multi-step-form-with-progress-bar 

*/
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

// new student 
var degree;
var countries = [];
var ranks = [];

// new consultant
var country;
var university;
var skills = [];
var uniIndex = {
	'牛津大学' : 'oxford',
	'剑桥大学' : 'cambridge',
	'康奈尔大学' : 'cornell'
}

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
		$(".action-button")[i].style.boxShadow = 'none';
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

$(".con").click(function() {
	$(".bootstrap-select").hide();
	switch(this.value) {
		case '美国': {
			$(".usauni").show();
			break;
		}
		case '澳大利亚': {
			$(".ozuni").show();
			break;
		}
		case '英国': {
			$(".ukuni").show();
			break;
		}
		case '加拿大': {
			$(".canadauni").show();
			break;
		}
		case '法国': {
			$(".franceuni").show();
			break;
		}
		case '其他': {
			$(".otheruni").show();
			break;
		}
		default:;
	}
});

$(".textInput").change(function() {
	// check password
	if(daForm.elements['password'].value != daForm.elements['repeatpassword'].value || daForm.elements['password'].value.length<6) {
		daForm.elements['password'].style.borderColor = 'red';
		daForm.elements['repeatpassword'].style.borderColor = 'red';
		passwordOk = false;
		$(".submit").addClass("not-active");
		return;
	}
	else {
		daForm.elements['password'].style.borderColor = '#CCC';
		daForm.elements['repeatpassword'].style.borderColor = '#CCC';
		passwordOk = true;
	}

	// check username
	if(daForm.elements['username'].value.length<6) {
		alert("用户名应是大于6位的字母数字组合");
		$(".submit").addClass("not-active");
		return;
	}

	// check email
	if(daForm.elements['email'].value.length<5) {
		daForm.elements['email'].style.borderColor = 'red';
		$(".submit").addClass("not-active");
		return;
	}
	else {
		daForm.elements['email'].style.borderColor = '#CCC';
	}

	if(passwordOk) {
		$(".submit").removeClass("not-active");
		return;
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
	university = uniIndex[uni];
	$("#aUniversity").removeClass("not-active");
}

function addCountry(country) {
	countries.push(country);
	$("#aCountries").removeClass("not-active");
}

function addRank(rank) {
	ranks.push(rank);
	$("#aRanks").removeClass("not-active");
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
	console.log(skills);
	
}

function msSubmit(type) {
	// student registration
	if(type == 1) {
		daForm.elements['degree'].value = degree;
		daForm.elements['countries'].value = countries;
		daForm.elements['ranks'].value = ranks;
		document.getElementById('msform').submit();
	}
	// consultant registration
	if(type == 2) {
		daForm.elements['degree'].value = degree;
		daForm.elements['country'].value = country;
		daForm.elements['university'].value = university;
		daForm.elements['skills'].value = skills;
		document.getElementById('msform').submit();
	}
}


