<div class="box">

	<div class="box-header">



		<!------CONTROL TABS START------->

		<ul class="nav nav-tabs nav-tabs-left">


			<li class="<?php if (!isset($edit_profile)) echo 'active'; ?>">

				<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i>

					<?php echo ('Appointment List'); ?>

				</a>
			</li>

			<li>

				<a href="#add" data-toggle="tab"><i class="icon-plus"></i>

					<?php echo ('Add Appointment'); ?>

				</a>
			</li>

		</ul>

		<!------CONTROL TABS END------->



	</div>

	<div class="box-content padded">

		<div class="tab-content">

			<!----EDITING FORM STARTS---->



			<!----EDITING FORM ENDS--->



			<!----TABLE LISTING STARTS--->

			<div class="tab-pane box <?php if (!isset($edit_profile)) echo 'active'; ?>" id="list">



				<table cellpadding="0" cellspacing="0" border="0" class="dTable responsive table-hover">

					<thead>

						<tr>

							<th>
								<div>#</div>
							</th>

							<th>
								<div><?php echo ('Date'); ?></div>
							</th>

							<th>
								<div><?php echo ('Patient'); ?></div>
							</th>

							<th>
								<div><?php echo ('Doctor'); ?></div>
							</th>


						</tr>

					</thead>

					<tbody>

						<?php $count = 1;
						foreach ($appointments as $row) : ?>

							<tr>

								<td><?php echo $count++; ?></td>

								<td><?php echo date('d M,Y', $row['appointment_timestamp']); ?></td>

								<td><?php echo $this->crud_model->get_type_name_by_id('patient', $row['patient_id'], 'name'); ?></td>

								<td><?php echo $this->crud_model->get_type_name_by_id('doctor', $row['doctor_id'], 'name'); ?></td>



							</tr>

						<?php endforeach; ?>

					</tbody>

				</table>

			</div>

			<!----TABLE LISTING ENDS--->





			<!----CREATION FORM STARTS---->

			<div class="tab-pane box" id="add" style="padding: 5px">

				<div class="box-content">

					<?php echo form_open('patient/manage_appointment/create/', array('class' => 'form-horizontal validatable')); ?>

					<div class="padded">

						<div class="control-group">

							<label class="control-label"><?php echo ('Patient'); ?></label>

							<div class="controls" style="border:1px solid #d7d7d7; width:23%; padding-left:5px;">

								<?php echo $this->crud_model->get_type_name_by_id('patient', $this->session->userdata('patient_id'), 'name'); ?>

								<input type="hidden" name="patient_id" value="<?php echo $this->session->userdata('patient_id'); ?>" />

							</div>

						</div>

						<div class="control-group">

							<label class="control-label"><?php echo ('Doctor'); ?></label>

							<div class="controls">

								<select class="chzn-select" name="doctor_id">

									<option value="">Select</option>

									<?php

									$doctors	=	$this->db->get('doctor')->result_array();

									foreach ($doctors as $row) :

									?>

										<option value="<?php echo $row['doctor_id']; ?>"><?php echo $row['name']; ?></option>

									<?php

									endforeach;

									?>

								</select>

							</div>

						</div>
						<div class="control-group">

							<label class="control-label"><?php echo ('Date'); ?></label>

							<div class="controls">

								<input type="text" class="datepicker fill-up" name="appointment_timestamp" />

							</div>

						</div>

					</div>

					<div class="form-actions">

						<button type="submit" class="btn btn-success"><?php echo ('Add Appointment'); ?></button>

					</div>

					<?php echo form_close(); ?>

				</div>

			</div>

			<!----CREATION FORM ENDS--->



		</div>

	</div>

</div>