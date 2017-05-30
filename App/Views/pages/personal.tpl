{assign title "Dossier de {$identity.lastname} {$identity.firstname}"}
{extends file='layout.tpl'}
{block js}
<script type="text/javascript" charset="utf-8" >
	$().ready(function () {
		$('.inputform').hide();
		$(".activeform").click(function(){
			$(".inputform").toggle();
		});


		var options = {
			url: '{View::Path('personal-identity-edit')}',
			type: 'post',
			data: {
				id: '{$identity.id}',
				user_id: '{$auth->get('id')}',
				csrf_token: '{$auth->get('csrf_token')}',
			},
			dataType: 'json',
			success:    function() {
				$("button").hide();
				$(".inputform").prop("disabled", true);
				toastr.success("Les modifications ont bien été enregistrés", "Enregistré !", { positionClass: "toast-bottom-right" });
				setTimeout(function(){ window.location = "{View::Path('personal-view', ['id'=>$identity.id])}"; }, 1200);
			},
			uploadProgress: function(){},
			error: function(){
				toastr.error("Une erreur s'est produite", "Echec", { positionClass: "toast-bottom-right" });
			}
		};
		$('#post-identity').ajaxForm(options);


		var options = {
			url: '{View::Path('personal-rank-add')}',
			type: 'post',
			data: {
				id: '{$identity.id}',
				user_id: '{$auth->get('id')}',
				csrf_token: '{$auth->get('csrf_token')}',
			},
			dataType: 'json',
			success:    function() {
				//$("button").hide();
				//$(".inputform").prop("disabled", true);
				toastr.success("Les modifications ont bien été enregistrés", "Enregistré !", { positionClass: "toast-bottom-right" });
				setTimeout(function(){ window.location = "{View::Path('personal-view', ['id'=>$identity.id])}"; }, 1200);
			},
			uploadProgress: function(){},
			error: function(){
				toastr.error("Une erreur s'est produite", "Echec", { positionClass: "toast-bottom-right" });
			}
		};
		$('#post-ranks').ajaxForm(options);







});
</script>
{/block}
{block content}

<div class="letter">
	<div class="container-fixed">
		<div class="row">
			<div class="col-xs-12">
				<div id="photo-header" class="text-center">
					<div id="photo">
						<img style="float: left;width: 154px;" src="/{#dir_imgs#}/rf.png">
						<img style="float: right;width: 111px;" src="/{#dir_imgs#}/spt.png">
					</div>
					<div id="text-header">
						<h1>Dossier de {$identity.lastname} {$identity.firstname}<br>BRIGADE DES SAPEURS-POMPIERS DE TEMBELAN</h1>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#identity">Identité</a></li>
					<li><a data-toggle="tab" href="#interviews">Entretiens</a></li>
					<li><a data-toggle="tab" href="#fia">FIA</a></li>
					<li><a data-toggle="tab" href="#ranks">Grades</a></li>
					<li><a data-toggle="tab" href="#sanctions">Sanctions</a></li>
					<li><a data-toggle="tab" href="#trainings">Formations</a></li>
				</ul>
			</div>
		</div>
	</div>



	<div class="row">
		<div class="col-xs-12 col-lg-12">



			<div class="tab-content">
				<div id="identity" class="tab-pane fade in active">

					<form id="post-identity">

						<div class="row">
							<div class="col-xs-offset-4 col-xs-4">
								{if $identity.status==2}
								<img class="buffer thanked" src="/{#dir_imgs#}/buffers/thanked.png" alt="">
								{/if}

								{if $identity.status==3}
								<img class="buffer resigned" src="/{#dir_imgs#}/buffers/resigned.png" alt="">
								{/if}

								{if $identity.status==4}
								<img class="buffer deadinservice" src="/{#dir_imgs#}/buffers/deadinservice.png" alt="">
								{/if}

								{if $identity.status==5}
								<img class="buffer retirement" src="/{#dir_imgs#}/buffers/retirement.png" alt="">

								{/if}
								<img class="avatar" src="{if empty($identity.avatar_path)}https://i2.wp.com/militarytalentsource.com/wp-content/uploads/2017/07/img-headshot-placeholder-male.jpg?ssl=1{else}/{#dir_imgs#}/avatars/{$identity.avatar_path}{/if}" alt="">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="form-group">
								<label class="control-label col-sm-2" for="rank">Grade:</label>
								<div class="col-sm-10">
									<code>{$identity.rank_name}</code>
								</div>
							</div>
						</div>

						<div class="row inputform">
							<div class="form-group">
								<label class="control-label col-sm-2" for="status">Status:</label>
								<div class="col-sm-10">
									<label class="radio-inline"><input class="inputform" type="radio" name="status" value="1" {if $identity.status==1}checked{/if}>Actif</label>
									<label class="radio-inline"><input class="inputform" type="radio" name="status" value="2" {if $identity.status==2}checked{/if}>Remercié</label>
									<label class="radio-inline"><input class="inputform" type="radio" name="status" value="3" {if $identity.status==3}checked{/if}>Demissioné</label>
									<label class="radio-inline"><input class="inputform" type="radio" name="status" value="4" {if $identity.status==4}checked{/if}>Mort en service</label>
									<label class="radio-inline"><input class="inputform" type="radio" name="status" value="5" {if $identity.status==5}checked{/if}>Retraité</label>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="form-group">
								<label class="control-label col-sm-2" for="lastname">Nom:</label>
								<div class="col-sm-4">
									<span class="value">{$identity.lastname}</span>
									<input type="text" class="form-control inputform" name="lastname" placeholder="Nom"  value="{$identity.lastname}">
								</div>

								<label class="control-label col-sm-2" for="firstname">Prénom:</label>
								<div class="col-sm-4">
									<span class="value">{$identity.firstname}</span>
									<input type="text" class="form-control inputform" name="firstname" placeholder="Prénom" value="{$identity.firstname}">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="form-group">
								<label class="control-label col-sm-2" for="sex">Sexe:</label>
								<div class="col-sm-10">
									<span class="value">{if $identity.sex==1}Femme{elseif $identity.sex==2}Homme{/if}</span>
									<label class="radio-inline inputform"><input class="inputform" type="radio" name="sex" value="1" {if $identity.sex==1}checked{/if}>Femme</label>
									<label class="radio-inline inputform"><input class="inputform" type="radio" name="sex" value="2" {if $identity.sex==2}checked{/if}>Homme</label>
								</div>
							</div>
						</div>


						<div class="row">
							<div class="form-group">
								<label class="control-label col-sm-2" for="nationality">Nationalité:</label>
								<div class="col-sm-10">
									<span class="value">{$identity.nationality}</span>
									<input type="text" class="form-control inputform" name="nationality" placeholder="Nationalité" value="{$identity.nationality}">
								</div>
							</div>
						</div>


						<div class="row">
							<div class="form-group">
								<label class="control-label col-sm-2" for="birthday">Date de naissance:</label>
								<div class="col-sm-3">
									<span class="value">{$identity.birthday}</span>
									<input type="text" class="form-control inputform" name="birthday" placeholder="Date de naissance" value="{$identity.birthday}">
								</div>

								<label class="control-label col-sm-3" for="birthplace">Lieu de naissance:</label>
								<div class="col-sm-4">
									<span class="value">{$identity.birthplace}</span>
									<input type="text" class="form-control inputform" name="birthplace" placeholder="Lieu de naissance" value="{$identity.birthplace}">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="form-group">
								<label class="control-label col-sm-2" for="city">Ville:</label>
								<div class="col-sm-10">
									<span class="value">{$identity.city}</span>
									<input type="text" class="form-control inputform" name="city" placeholder="Ville" value="{$identity.city}">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="form-group">
								<label class="control-label col-sm-2" for="phone">Téléphone:</label>
								<div class="col-sm-10">
									<span class="value">{$identity.phone}</span>
									<input type="text" class="form-control inputform" name="phone" placeholder="Téléphone" value="{$identity.phone}">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="form-group">
								<div class="col-sm-12">
									<br>
									<input type="submit" class="btn btn-primary btn-xs btn-block inputform"/>
								</div>
							</div>
						</div>

					</form>
				</div>

				<div id="interviews" class="tab-pane fade">
					<div class="row">
						<div class="col-md-12">
							<table class="table" style="border-collapse:collapse;">
								<thead>
									<tr>
										<th>Date</th>
										<th>Instructeur</th>
									</tr>
								</thead>
								<tbody>
									{foreach from=$interviews item=v}
									<tr data-toggle="collapse" data-target="#interview-{$v.id}" class="accordion-toggle">
										<td>{date("t/m/Y", strtotime($v.date))}</td>
										<td><input type="text" class="form-control inputform input-sm" name="participants" placeholder="Participants" value="{$v.participants}"></td>
									</tr>
									<tr >
										<td colspan="6" class="hiddenRow"><div class="accordian-body collapse" id="interview-{$v.id}">
											<div class="form-group">
												<label for="comment">Compte rendu</label>
												<textarea class="form-control inputform" rows="5" id="comment">{$v.content}</textarea>
											</div>
										</div></td>
									</tr>
									{/foreach}
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div id="fia" class="tab-pane fade">
					<div class="row">
						<div class="col-md-12">

							<table class="table table-condensed" style="border-collapse:collapse;">
								<thead>
									<tr>
										<th>Date</th>
										<th>Physique</th>
										<th>Théorique</th>
										<th>VSAV</th>
										<th>Total</th>
									</tr>
								</thead>
								<tbody>
									{foreach from=$fia item=v}

									<tr data-toggle="collapse" data-target="#fia-{$v.id}" class="accordion-toggle">
										<td>{date("t/m/Y", strtotime($v.date))}</td>
										<td>{$v.physical}</td>
										<td>{$v.theory}</td>
										<td>{$v.medic}</td>
										<td><strong>{$v.physical+$v.theory+$v.medic}</strong>/30</td>
									</tr>
									<tr >
										<td colspan="6" class="hiddenRow"><div class="accordian-body collapse" id="fia-{$v.id}">
											<div class="form-group">
												<label for="comment">Avis</label>
												<span class="value">{$v.comment}</span>
												<textarea class="form-control inputform" rows="5" id="comment">{$v.comment}</textarea>
											</div>
										</div></td>
									</tr>

									{/foreach}

								</tbody>
							</table>

						</div>
					</div>
				</div>


				<div id="ranks" class="tab-pane fade">
					<div class="row">
						<div class="col-md-12">

							<table class="table table-condensed">
								<thead>
									<tr>
										<th>Date</th>
										<th>Ancien</th>
										<th>Actuel</th>
									</tr>
								</thead>
								<tbody>
									{assign var="previous_rank" value=""}
									{assign var="previous_rank_id" value=0}
									{foreach from=$rank_tracking item=v}

									<tr class="{if  $v.rank_id<$previous_rank_id}danger{else}success{/if}">
										<td>{date("d/m/Y", strtotime($v.date))}</td>
										<td>{if empty($previous_rank)}<em>Non gradé</em>{else}{$previous_rank}{/if}</td>
										<td><strong>{if empty($v.name)}<em>Non gradé</em>{else}{$v.name}{/if}</strong></td>
										<td>{if  $v.rank_id<$previous_rank_id}-{else}+{/if}</td>
									</tr>
									{$previous_rank_id=$v.rank_id}
									{$previous_rank=$v.name}
									{/foreach}

								</tbody>
							</table>

						</div>
					</div>

					<div class="row inputform">
						<div class="col-md-12">
							<form id="post-ranks">
								<select class="form-control"name="rank_id">
									<option value="0" {if  0==$identity.rank_id}disabled{/if}>(-) Non gradé</option>
									{assign var="next_rank_id" value=$identity.rank_id+1}

{foreach from=$ranks item=rank}
									<option value="{$rank.id}" {if  $rank.id==$identity.rank_id}disabled{/if} {if $rank.id==$next_rank_id}selected{/if}>{if $rank.id>$identity.rank_id}(+) {elseif $rank.id<$identity.rank_id}(-) {/if}{$rank.name}</option>
{/foreach}
								</select>

								<input type="submit" class="btn btn-primary btn-xs btn-block inputform" value="Ajouter"/>
							</form>
						</div>
					</div>

				</div>


				<div id="sanctions" class="tab-pane fade">
					<div class="row">
						<div class="col-md-12">
							<table class="table" style="border-collapse:collapse;">
								<thead>
									<tr>
										<th>Date</th>
										<th>Sanctionneur</th>
									</tr>
								</thead>
								<tbody>
									{foreach from=$sanctions item=sanction}

									<tr data-toggle="collapse" data-target="#reason-{$sanction.id}" class="accordion-toggle">
										<td>{date("t/m/Y", strtotime($sanction.date))}</td>
										<td><input type="text" class="form-control inputform input-sm" name="title" placeholder="author" value="{$sanction.author}"></td>
									</tr>

									<tr>
										<td colspan="6" class="hiddenRow"><div class="accordian-body collapse" id="reason-{$sanction.id}">
											<div class="form-group">
												<label for="author">Motif</label>
												<textarea class="form-control inputform" rows="5" id="reason">{$sanction.reason}</textarea>
											</div>
										</div></td>
									</tr>
									{/foreach}
								</tbody>
							</table>
							<button class="btn btn-md btn-block btn-primary"><i class="fa fa-id-card" aria-hidden="true"></i></button>
						</div>
					</div>
				</div>





				<div id="trainings" class="tab-pane fade">
					<div class="row">
						<div class="col-md-12">
							<table class="table">
								<thead>
									<tr>
										<th>Date</th>
										<th>Formation</th>
										<th>Instructeur</th>
									</tr>
								</thead>
								<tbody>
									{foreach from=$formations item=formation}

									<tr>
										<td>{date("t/m/Y", strtotime($formation.date))}</td>
										<td><input type="text" class="form-control inputform input-sm" name="title" placeholder="Formation" value="{$formation.title}"></td>
										<td><input type="text" class="form-control inputform input-sm" name="instructor" placeholder="Instructeur" value="{$formation.instructor}"></td>
									</tr>
									{/foreach}
								</tbody>
							</table>
						</div>
					</div>
				</div>





			</div>

		</div>
	</div>

	<div class="row">
		<div class="form-group">
			<div class="col-sm-12">
				<br>
				<input type="button" class="btn btn-default btn-xs btn-block activeform" value="Lecture/Edition"/>
				<a href="{View::Path('dashboard')}" class="btn btn-default btn-xs btn-block">Retour</a>
			</div>
		</div>
	</div>


</div>
{/block}
