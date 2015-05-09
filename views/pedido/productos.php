<div class="row">
	<div>
		<h5>
			<div>
				<div class="row clearfix">
					<div class="col-md-12 column col-xs-12">
						<table style="text-align:center;" class="table table-condensed table-hover">
						<thead>
							<tr class="active" >
								<th><h3><strong>Locales cerca a ti</strong></h3></th>
							</tr>
						</thead>
						<tbody class="active" >
                        <?php if(count($model) == 0):?>
                            <tr>
                                <td><h2>No hay locales de ese rubro cerca de ti.</h2></td>
                            </tr>
                        <?php endif; ?>
						<?php foreach($model as $m):?>
							<tr>
								<td>
									<div class="col-md-3">
										<h2><img  src="<?= $m['foto'] ?>" width="100" height="100" class="img-circle"> </h2>
									</div>
									<div class="col-md-5">
										<h3><strong> <?= $m['nombre'] ?> </strong></h3>
										<em></br>
											<?= $m['direccion'] ?>
										</em>
									</div>
									<div class="col-md-4">
										</br>
										<h3>
											<a href="/pedido/proceso?id=<?= $m['id_local']?>" type="button" class="btn btn-success"> Ver productos </a>
										</h3>
									</div>
								</td>
							</tr>                  
						<?php endforeach; ?>                                                                          
						</tbody>
						</table>
					</div>
				</div>
			</div>   
		</h5>
	</div>
</div>