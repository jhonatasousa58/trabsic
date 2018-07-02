<?php

function create($tabela, array $datas){
	global $conn;
	$fields = implode(", ",array_keys($datas));
	$values = "'".implode("', '",array_values($datas))."'";
	$qrCreate = "INSERT INTO {$tabela} ($fields) VALUES ($values)";
	$stCreate = mysqli_query($conn, $qrCreate) or die ('Erro ao cadastrar em '.$tabela.' '.mysqli_error($conn));

	if($stCreate){
		return true;
	}
}

/*function read($tabela, $cond = NULL){
	$qrRead = "SELECT * FROM {$tabela} {$cond}";
	$stRead = mysql_query($qrRead) or die ('Erro ao ler em '.$tabela.' '.mysql_error());
	$cField = mysql_num_fields($stRead);
	for($y = 0; $y < $cField; $y++){
		$names[$y] = mysql_field_name($stRead,$y);
	}
	for($x = 0; $res = mysql_fetch_assoc($stRead); $x++){
		for($i = 0; $i < $cField; $i++){
			$resultado[$x][$names[$i]] = $res[$names[$i]];
		}
	}
	return $resultado;
}*/

function read($tabela, $cond = NULL){
	global $conn;
	$qrRead = "SELECT * FROM {$tabela} {$cond}";
	$stRead = mysqli_query($conn, $qrRead) or die ('Erro ao ler em '.$tabela.' '.mysqli_error($conn));
	$cField = mysqli_num_fields($stRead);
	$i = 0;
	while ($property = mysqli_fetch_field($stRead)) {
		$names[$i] = $property->name;
		$i++;
	}
	for($x = 0; $res = mysqli_fetch_assoc($stRead); $x++){
		for($i = 0; $i < $cField; $i++){
			$resultado[$x][$names[$i]] = $res[$names[$i]];
		}
	}
	return $resultado;
}

/*function update($tabela, array $datas, $where){
	foreach($datas as $fields => $values){
		$campos[] = "$fields = '$values'";
	}

	$campos = implode(", ",$campos);
	$qrUpdate = "UPDATE {$tabela} SET $campos WHERE {$where}";
	$stUpdate = mysql_query($qrUpdate) or die ('Erro ao atualizar em '.$tabela.' '.mysql_error());

	if($stUpdate){
		return true;
	}

}	*/

function update($tabela, array $datas, $where){
	global $conn;
	foreach($datas as $fields => $values){
		$campos[] = "$fields = '$values'";
	}

	$campos = implode(", ",$campos);
	$qrUpdate = "UPDATE {$tabela} SET $campos WHERE {$where}";
	$stUpdate = mysqli_query($conn, $qrUpdate) or die ('Erro ao atualizar em '.$tabela.' '.mysqli_error());

	if($stUpdate){
		return true;
	}

}

function delete($tabela, $where){
	global $conn;
	$qrDelete = "DELETE FROM {$tabela} WHERE {$where}";
	$stDelete = mysqli_query($conn, $qrDelete) or die ('Erro ao deletar em '.$tabela.' '.mysqli_error($conn));
}

function readPaginator($tabela, $cond, $maximos, $link, $pag, $width = NULL, $maxlinks = 4){
	$readPaginator = read("$tabela","$cond");
	$total = count($readPaginator);
	if($total > $maximos){
		$paginas = ceil($total/$maximos);
		if($width){
			echo '<div class="paginator" style="width:'.$width.'">';
		}else{
			echo '<div class="paginator">';
		}
		echo '<a href="'.$link.'1">Primeira Página</a>';
		for($i = $pag - $maxlinks; $i <= $pag - 1; $i++){
			if($i >= 1){
				echo '<a href="'.$link.$i.'">'.$i.'</a>';
			}
		}
		echo '<span class="atv">'.$pag.'</span>';
		for($i = $pag + 1; $i <= $pag + $maxlinks; $i++){
			if($i <= $paginas){
				echo '<a href="'.$link.$i.'">'.$i.'</a>';
			}
		}
		echo '<a href="'.$link.$paginas.'">Última Página</a>';
		echo '</div><!-- /paginator -->';
	}
}