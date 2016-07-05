
//function to change the attributes of elements involved in error handling
//i decided to create a function as these lines were being repeated for all fields in the following functions
function formAtt(elem){
	//changing element border width to draw more attention
	document.getElementById(elem).style.borderWidth="4px";
	//changing element background to highlight the problem field
	document.getElementById(elem).style.backgroundColor="pink";
	//change border color to add more emphasis
	document.getElementById(elem).style.borderColor="white";
}


//function to validate the input in the contact form on index.php before being posted to contact.php for action
function validateContact() {
   
	//check to see if the name field is empty
    if (document.getElementById("c_name").value == null || document.getElementById("c_name").value == "") {
		
		//finding the error element to insert a warning message to screen
		document.getElementById("nameerror").innerHTML= "*first name not filled in";
		
		//calling a function that changes the fields attributes to highlight the error
		formAtt("c_name");
		
		//telling the event handler not to execute the onSubmit command
        return false;
    }
	
	//check to see if the email field is empty
	if (document.getElementById("c_email").value == null || document.getElementById("c_email").value == "") {
		
		//finding the error element to insert a warning message to screen
		document.getElementById("emailerror").innerHTML= "*email not filled in";
		
		//calling a function that changes the fields attributes to highlight the error
		formAtt("c_email");
		
		//telling the event handler not to execute the onSubmit command
        return false;
    }
	
	//check to see if the email is valid by checking if there is input first
	if (document.getElementById("c_email").value != "" || document.getElementById("c_email").value != ""){
		
		//assigning a variable to email value entered by user
		var a = document.getElementById("c_email").value;
		
		//assigning a variable to the index of the @ character if found, assigns -1 if not found
		atPos = a.indexOf("@");
	
		//if the @ sign is not found
		if (atPos == -1){
			
		//finding the error element to insert a warning message to screen
		document.getElementById("emailerror").innerHTML= "*invalid email";
		
		//calling a function that changes the fields attributes to highlight the error
		formAtt("c_email");
		
		//telling the event handler not to execute the onSubmit command
		return false;	
		}
	}	
		
	//check to see if the comment field is empty
	if (document.getElementById("comment").value == null || document.getElementById("comment").value == "") {
		
		//finding the error element to insert a warning message to screen
		document.getElementById("commenterror").innerHTML= "*comment field empty";
		
		//calling a function that changes the fields attributes to highlight the error
		formAtt("comment");
		
		//telling the event handler to not execute the onSubmit command
        return false;
    }

	//if the users submission returns no false checks, then tell the even handler to execute the onSubmit command
	return true;
}


//this function validates the member registration form before being given permission to be posted to the php
//it is important for this form to be validated as the php code it gets sent to has direct access to the database
function validateRegistration(){
	
	//check to see if the user left the name field blank
	if (document.getElementById("r_name").value == null || document.getElementById("r_name").value == ""){
		
		//finding the error element to insert a warning message to screen
		document.getElementById("nameerror").innerHTML= "*name not filled in";
		
		//changes to the fields properties to highlight the incorrect field
		formAtt("r_name");
		
		//telling the event handler not to execute the onSubmit command
        return false;
    }
	
	//check to see if the user left the surname field blank
	if (document.getElementById("r_surname").value == null || document.getElementById("r_surname").value == ""){
		
		//finding the error element to insert a warning message to screen
		document.getElementById("snameerror").innerHTML= "*surname not filled in";
		
		//changes to the fields properties to highlight the incorrect field
		formAtt("r_surname");
		
		//telling the event handler not to execute the onSubmit command
        return false;
    }
	
	//check to see if the user left username field blank
	if (document.getElementById("r_username").value == null || document.getElementById("r_username").value == ""){
		
		//finding the error element to insert a warning message to screen
		document.getElementById("usernameerror").innerHTML= "*username not filled in";
		
		//changes to the fields properties to highlight the incorrect field
		formAtt("r_username");
		
		//telling the event handler not to execute the onSubmit command
        return false;
    }
	
	//check to make sure username is at least 6 characters long
	if (document.getElementById("r_username").value.length < 4){
		
		//finding the error element to insert a warning message to screen
		document.getElementById("usernameerror").innerHTML= "*username must be at least 5 characters long";
		
		//changes to the fields properties to highlight the incorrect field
		formAtt("r_username");
		
		//telling the event handler not to execute the onSubmit command
        return false;	
	}
	
	
	//check to see if the password was left empty
	if (document.getElementById("r_password").value == null || document.getElementById("r_password").value == ""){
		
		//finding the error element to insert a warning message to screen
		document.getElementById("passworderror").innerHTML= "*password not filled in";
		
		//changes to the fields properties to highlight the incorrect field
		formAtt("r_password");
		
		//telling the event handler not to execute the onSubmit command
        return false;
    }
	
	//check to see if the password is at least 6 characters long
	if (document.getElementById("r_password").value.length < 5){
		
		//finding the error element to insert a warning message to screen
		document.getElementById("passworderror").innerHTML= "*password must be at least 6 characters long";
		
		//changes to the fields properties to highlight the incorrect field
		formAtt("r_password");
		
		//telling the event handler not to execute the onSubmit command
        return false;	
	}
	
	
	/*
	//i tried to call a function that would check to see if there was a number in the password and return a false value if it didn't
	if (document.getElementById("r_password").value.length >= 6 && passNum(document.getElementById("r_password")) == false){
		
		alert("Password must contain at least 1 number!");
		
		formAtt("r_password");
		
		return false;

	}
	*/
	
	//checks to make sure that the password confirmation is not empty
	if (document.getElementById("c_password").value == null || document.getElementById("c_password").value == ""){
		
		//finding the error element to insert a warning message to screen
		document.getElementById("c_passworderror").innerHTML= "*confirm password not filled in";
		
		//changes to the fields properties to highlight the incorrect field
		formAtt("c_password");
		
		//telling the event handler not to execute the onSubmit command
        return false;
    }
	
	//checks to see if the password and confirmed password entries are the same 
	if(!(document.getElementById("r_password").value === document.getElementById("c_password").value)){
		
		//finding the error element to insert a warning message to screen
		document.getElementById("c_passworderror").innerHTML= "*passwords do not match";
		
		//changes to the fields properties to highlight the incorrect field
		formAtt("r_password");
		formAtt("c_password");
		
		//telling the event handler not to execute the onSubmit command
        return false;
	}
	
	//checks to see if the email field is empty
	if (document.getElementById("r_email").value == null || document.getElementById("r_email").value == ""){
		
		//finding the error element to insert a warning message to screen
		document.getElementById("emailerror").innerHTML= "*email not filled in";
		
		//changes to the fields properties to highlight the incorrect field
		formAtt("r_email");
		
		//telling the event handler not to execute the onSubmit command
        return false;
    }
	
	
	//check to see if the email is valid by checking if there is input first
	//taking care of the client side check if the input is valid/ php will take care of checking if email already in the database
	if (document.getElementById("r_email").value != "" || document.getElementById("r_email").value != ""){
		
		//assigning a variable to email value entered by user
		var a = document.getElementById("r_email").value;
		
		//assigning a variable to the index of the @ character if found, assigns -1 if not found
		atPos = a.indexOf("@");
	
		//if the @ sign is not found
		if (atPos == -1){
			
		//finding the error element to insert a warning message to screen
		document.getElementById("emailerror").innerHTML= "*invalid email";
		
		//changes made to fields properties to highlight the incorrect field
		formAtt("r_email");	

		//telling the event handler not to execute the onSubmit command
		return false;	
		}
	}
	//if the users submission returns no false checks, then tell the even handler to execute the onSubmit command
	return true;
}


/*
function passNum(pw){
	
	
	if(/\d/.test(pw) == true){
		
		return true;
	}
	
	else{
		return false;
	}
	
}

*/



	
//function to validate the input in the login form on login.php before being posted to member.php for action
//this only check to see if there is input, php file will check to see if the username and password match
function validateLogin() {
   
	//check to see if the username field is empty
    if (document.getElementById("username").value == null || document.getElementById("username").value == "") {
		
		//finding the error element to insert a warning message to screen
		document.getElementById("usernameerror").innerHTML= "*username not filled in";
		
		//calling a function that changes the fields attributes to highlight the error
		formAtt("username");
		
		//telling the event handler not to execute the onSubmit command
        return false;
    }
	
	//check to see if the password field is empty
	if (document.getElementById("password").value == null || document.getElementById("password").value == "") {
		
		//finding the error element to insert a warning message to screen
		document.getElementById("passworderror").innerHTML= "*password not filled in";
		
		//calling a function that changes the fields attributes to highlight the error
		formAtt("password");
		
		//telling the event handler not to execute the onSubmit command
        return false;
    }
	//if the users submission returns no false checks, then tell the even handler to execute the onSubmit command
	return true;
	
}


//function to validate the input in the login form on login.php before being posted to member.php for action
function validateSignUp() {
   
	//check to see if the username field is empty
    if (document.getElementById("name").value == null || document.getElementById("name").value == "") {
		
		//finding the error element to insert a warning message to screen
		document.getElementById("fnameerror").innerHTML= "*first name not filled in";
		
		//calling a function that changes the fields attributes to highlight the error
		formAtt("name");
		
		//telling the event handler not to execute the onSubmit command
        return false;
    }
	
	//check to see if the password field is empty
	if (document.getElementById("surname").value == null || document.getElementById("surname").value == "") {
		
		//finding the error element to insert a warning message to screen
		document.getElementById("snameerror").innerHTML= "*surname not filled in";
		
		//calling a function that changes the fields attributes to highlight the error
		formAtt("surname");
		
		//telling the event handler not to execute the onSubmit command
        return false;
    }
	
	//check to see if the age field is empty
	if (document.getElementById("age").value == null || document.getElementById("age").value == "") {
		
		//finding the error element to insert a warning message to screen
		document.getElementById("ageerror").innerHTML= "*age not selected";
		
		//calling a function that changes the fields attributes to highlight the error
		formAtt("age");
		
		//telling the event handler not to execute the onSubmit command
        return false;
    }
	//if the users submission returns no false checks, then tell the even handler to execute the onSubmit command		
	return true;
	
}

//this function validates the member registration form before being given permission to be posted to the php
//it is important for this form to be validated as the php code it gets sent to has direct access to the database
function validateEdit(){
	
	//check to see if the user left the name field blank
	if (document.getElementById("e_name").value == null || document.getElementById("e_name").value == ""){
		
		//finding the error element to insert a warning message to screen
		document.getElementById("e_nameerror").innerHTML= "*name not filled in";
		
		//changes to the fields properties to highlight the incorrect field
		formAtt("e_name");
		
		//telling the event handler not to execute the onSubmit command
        return false;
    }
	
	//check to see if the user left the surname field blank
	if (document.getElementById("e_surname").value == null || document.getElementById("e_surname").value == ""){
		
		//finding the error element to insert a warning message to screen
		document.getElementById("e_snameerror").innerHTML= "*surname not filled in";
		
		//changes to the fields properties to highlight the incorrect field
		formAtt("e_surname");
		
		//telling the event handler not to execute the onSubmit command
        return false;
    }
	//if the users submission returns no false checks, then tell the even handler to execute the onSubmit command
	return true;
}




		