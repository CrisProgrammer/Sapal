<?php
//$idconvocatoria=$_GET['idconvocatoria'];	
	/* Connect To Database*/
	console.log('va a listar');
	require_once ("../inicio.php");

$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
	$query1 = mysqli_real_escape_string($con,(strip_tags($_REQUEST['idconvocatoria'], ENT_QUOTES)));

	$tables="documento as d,documentoconvocatoria as dc, grupodocumental as g";
	$campos="*";
	$sWhere=" d.iddocumento=dc.iddocumento and d.idgrupodocumental=g.idgrupodocumental and dc.idconvocatoria=".$query1;
	$sWhere.=" order by dc.fechapublicacion desc";
		
	?>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<tbody>	
						<?php 
						while($row = mysqli_fetch_array($query)){
                            $numeroconvocatoria=$row['numeroconvocatoria'];	
                            $convocatoria=utf8_encode($row['convocatoria']);
							$idconvocatoria =  $row['idconvocatoria'];
							$iddocumento =  $row['iddocumento'];
							$documento =  utf8_encode($row['documento']);
							$grupodocumental =  $row['grupodocumental'];
							$reutilizable =  $row['reutilizable'];
							$fechaactualizacion =  $row['fechaactualizacion'];
							$archivo =  $row['archivo'];
							//lista de grupodocumental
							$campos2="*";
							$tables2="grupodocumental";
							$query2 = mysqli_query($con,"SELECT $campos2 FROM  $tables2");

						?>	
						<tr class="<?php echo $text_class;?>" style="width:100%;">
						<td><h6><?php echo $numeroconvocatoria.": ".$convocatoria;?></h6></td>
						<td colspan=3><?php echo $grupodocumental;?></td>
					<!-- grupo documental  -->
						<td style="width:120px;FONT-SIZE:9px;">	<b>Grupo documental</b><br>
            				<?php while($row2 = mysqli_fetch_array($query2)){	
									$idgrupodocumental= $row4['idgrupodocumental'];
									$grupodocumental = utf8_encode($row4['grupodocumental']);
									echo $grupodocumental;?><br><?php }?>
						</td>
						<td style="width:200px;FONT-SIZE:9px; LINE-HEIGHT:15px;">
						<?php while($row3 = mysqli_fetch_array($query3)){	
									$icono = $row3['tipo'];
									$titulo = $row3['titulo'];
									$archivo = $row3['archivo'];
									$path = $row3['path'];
									$descargas = $row3['descargas'];
									if(file_exists("../files/".$path."/".$archivo)){
									$tamano = filesize("../files/".$path."/".$archivo)/(1024);
									if ($tamano>1024) {
										$tamano =number_format(filesize("../files/".$path."/".$archivo)/(1024*1024),2);
										$medida="MB";}
										else{$tamano=number_format($tamano,2);
											$medida="KB";}
									$grupodocumental = utf8_encode($row3['grupodocumental']);
									?><a href=<?php echo "files/".$path."/".$archivo;?>> 
									<img class="img-fluid mx-auto d-block responsive-img" title="<?php echo $titulo;?>" src='<?php echo "images/tipos/".$icono.".png";?>' width="15" height="15"/><font size=1><?php echo $grupodocumental.". ".$tamano.$medida;?></font><br></a>
							
							<br><?php	}}?>
						</td>
						</tr>
						<?php }?>
				</tbody>			
			</table>
		</div>	
	<?php	
	}	
//}
//mysql_close($con);
?>          
		  
