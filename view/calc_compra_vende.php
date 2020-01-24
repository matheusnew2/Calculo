<html>
	<head>
		<title>Comprar / Vender</title>
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
		
		<script language="javascript"  src="assets/js/jquery.js" ></script>
		<script>
		$(document).ready(function(){
			$('#btn').click(function(){
				
				if(document.getElementById('rd').checked == true){
					preco = $('#preco').val();
					qtd = $('#qtd').val();
					total = qtd/preco; 
					$('#total').val(total);
				}else if (document.getElementById('rd1').checked == true){
					preco = $('#preco').val();
					qtd = $('#total').val();
					total = qtd*preco; 
					$('#qtd').val(total);
				}
			});
		});
		</script>
	<head>
	<body>
		<label>Preço Un.</label>
		<input type="text" class="input" id="preco">
		<label>Reais R$</label>
		<input type="text" class="input" id="qtd">
		<label>Bitcoin </label>
		<input type="text" class="input" id="total">
		<label><input type="radio" value="1" id='rd' name="rd">Bitcoin</label>
		<label><input type="radio" value="2" id='rd1' name="rd">Quantidade</label>
		<input type="button" id="btn" value="Calcular">
	</body>
</html>