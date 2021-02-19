 <?php //$teste =  "<script>alert('ola_123')</script>";

 function trata($texto) {

 	if (is_string($texto)) {
 		$texto = str_replace(array('"',"'",'<','>','/','(',')','!','#','$','¨','*','%','=','+',';',',','DELETE','SELECT','DROP','SHOW TABLES', '&', '|', '?')," ",$texto);
 		$texto = trim(strtoupper($texto));
 		return $texto;
	} else {
		return (int)abs($texto);	// transforma os numeros em inteiros
	}
 }

 function trataNum($num) {

 	$num = abs($num);
 	$num = (int) $num;
 	return $num;
 }

 function trataDatas($dataNascimento) {

 	return str_ireplace(array('"',"'",'<','>',';'),'',$dataNascimento);
 }