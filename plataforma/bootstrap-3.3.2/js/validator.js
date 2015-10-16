/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$('#adduser').bootstrapValidator({
	 feedbackIcons: {
		 valid: 'glyphicon glyphicon-ok',
		 invalid: 'glyphicon glyphicon-remove',
		 validating: 'glyphicon glyphicon-refresh'
	 },
	 fields: {
                perfil: {
			 validators: {
				 notEmpty: {
					 message: 'El perfil es requerido'
				 }
			 }
		 },
        
                username: {
			 validators: {
				 notEmpty: {
					 message: 'El nombre es requerido'
				 }
			 }
		 },
                 nocontrol: {
			 validators: {
				 notEmpty: {
					 message: 'El id unico es requerido'
				 }
			 }
		 },
		 appaterno: {
			 validators: {
				 notEmpty: {
					 message: 'El apellido es requerido'
				 }
			 }
		 },
                 apmaterno: {
			 validators: {
				 notEmpty: {
					 message: 'El apellido es requerido'
				 }
			 }
		 },
		 email: {
			 validators: {
				 notEmpty: {
					 message: 'El correo es requerido y no puede ser vacio'
				 },
				 emailAddress: {
					 message: 'El correo electronico no es valido'
				 }
			 }
		 },
		 password: {
			 validators: {
				 notEmpty: {
					 message: 'El password es requerido y no puede ser vacio'
				 },
				 stringLength: {
					 min: 8,
					 message: 'El password debe contener al menos 8 caracteres'
				 }
			 }
		 },
                 curp: {
			 validators: {
				 notEmpty: {
					 message: 'La curp es requerido'
				 }
			 }
		 },
		 sexo: {
			 validators: {
				 notEmpty: {
					 message: 'El sexo es requerido'
				 }
			 }
		 },
		 telefono: {
			 message: 'El teléfono no es valido',
			 validators: {
				 notEmpty: {
					 message: 'El teléfono es requerido y no puede ser vacio'
				 },
				 regexp: {
					 regexp: /^[0-9]+$/,
					 message: 'El teléfono solo puede contener números'
				 }
			 }
		 },
	 }
});