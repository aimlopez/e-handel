<?php

Class Validator{

	//storing form fields name
	private $fields= array();
// storing errors from form fields
	private $field_errors = array();

	private $form_is_valid = true;

public function addField($field_name){

	$this-> fields[] = $field_name;
	$this-> field_errors[$field_name] = array();

}

public function addRulesToField($field_name, $field_rule){

		$rule_name = $field_rule[0];

		switch ($rule_name) {
			case 'min_length':
			if (strlen($_POST[$field_name]) < $field_rule[1]){
				$this->addErrorToField($field_name, ucwords($field_name). " can not be less that {$field_rule[1]} in length");

			}
				
				break;
			case 'empty':
				if (strlen($_POST[$field_name]) == 0){
					$this->addErrorToField($field_name, ucwords($field_name). " can not be empty");
				}
				break;
				case 'matchRegexMail':
				if (!filter_var($_POST[$field_name], FILTER_VALIDATE_EMAIL)){
					$this->addErrorToField($field_name, ucwords($field_name). " are not a correct email adress");
				}
				break;

				case 'alphaNum':
				if (!ctype_alnum($_POST[$field_name])){
					$this->addErrorToField($field_name, ucwords($field_name). " only can have numbers and letters");
				}
				break;
				
				case 'onlyNumbers':
				if (!ctype_digit($_POST[$field_name])){
					$this->addErrorToField($field_name, ucwords($field_name). " only can be numbers");
				}
				break;
				case 'equal':
				if ($_POST[$field_name] !== $_POST[$field_rule[1]]){
					$this->addErrorToField($field_name, ucwords($field_name). " must be equal to password");
				}
				break;
				case 'max_length':
				if (strlen($_POST[$field_name]) > $field_rule[1]){
				$this->addErrorToField($field_name, ucwords($field_name). " can not exceed  {$field_rule[1]} character");

			}
				
				break;
			
			//	case 'message_text':
			//	$pattern= '/^[a-zA-Z0-9. ]+$/';
			//	if (!preg_match($pattern , $_POST[$field_name]){
			//	$this->addErrorToField($field_name, ucwords($field_name). " can only accept letters, number, commas and dot.");

			//}
			
			//break;
			default:
				# code...
				break;
		
		}//end switch

}//end function addRulesToField


private function addErrorToField($field_name, $error_message){

	$this->form_is_valid = false;
	$this->field_errors[$field_name][]=$error_message;

}


public function validForm(){
	return $this->form_is_valid;


}

public function outFieldError($field_name){
	if (isset($this->field_errors[$field_name])){
		foreach ($this->field_errors[$field_name] as $field_error) {
			echo "<p class='error'>($field_error) </p>";
		}


	}


}//end outFieldError


} // end validator



