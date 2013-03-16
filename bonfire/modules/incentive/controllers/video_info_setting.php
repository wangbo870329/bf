<div class="info_video_general">
	<?php if(isset($error)):?>
	<h2>
		<?= $error ?>
	</h2>
	<?php elseif(isset($video_info)):
			if($video_info->ajax == 0): ?>
				<h2>Edit Video</h2>
			<?php endif ?>
			
		<?php $attributes = array('id' => 'video_upadte', 'class' => "form-horizontal", 'method' => "POST");
		 echo form_open_multipart('company/company_company/video_info_updating/'.$video_info->id.$video_info->video_path, $attributes) ?>		
						<div class="control-group">
						 	<label class="control-label">Video</label>
							<div class="video_box_settings controls" >
			<video style="width: 100%"
				src="<?=site_url('upload/video').'/'.$video_info->video_path.'video.mp4';?>"
				controls></video>
							</div>
						</div>
						
						<div class="control-group">
						 	<label class="control-label">Title</label>
							<div class="controls">
								 <input id="video_upload" type="text" name = "video_title" class="video_info_elements" value="<?=$video_info->video_title?>">
							</div>
						</div>
						
						<div class="control-group">
						 	<label class="control-label">Description</label>
							<div class="controls">
								 <textarea id="video_upload" name="video_description" class="video_info_elements" type="text" ><?=$video_info->video_description?></textarea>
							</div>
						</div>
						
						<div class="control-group">
						 	<label class="control-label">Thumbnail</label>
							<div class="controls">
								 <input class="thumbnail_choice" type="hidden" name="video_thumbnail" value="1" style="width:0px; height:0px">
								 
								 <img style="width:130px" class="thumbnail_img" src="http://i00.i.aliimg.com/photo/v12/430742126/inflatable_water_game_water_amusement_park_water.summ.jpg"></img>
								 <img style="width:130px" src="http://i00.i.aliimg.com/photo/v12/430742126/inflatable_water_game_water_amusement_park_water.summ.jpg"></img>
								 <img style="width:130px" src="http://i00.i.aliimg.com/photo/v12/430742126/inflatable_water_game_water_amusement_park_water.summ.jpg"></img>
							</div>
						</div>
						
						<div class="control-group">
						 	<label class="control-label">Tags</label>
							<div class="controls">
								 <input type="text" value="" name="video_tags" class="video_info_elements">
							</div>
						</div>
						<div class="control-group">
						 	<label class="control-label">Video Questions</label>
							<div class="controls">
							<?php if($video_info->selected_questions):
								foreach($video_info->selected_questions as $index=>$selected_question):?>
								<div class="choose_question">	
									<div>
										<b>question <?=$index+1?>:</b>
										<label>choose questions:</label>
										<select name="question<?=$index+1?>" id="question<?=$index+1?>" class="video_info_elements quesiton_choose">
										 		<option value="" ><--choose a question here--></option>
										 		<?php 
										 			foreach($video_info->questions as $video_question):?>
													<option value=<?=$video_question->id ?> 
														<?php if($video_info->selected_questions !== false){
														 if($video_question->id == $video_info->selected_questions[$index]->video_question_question_id) 
														 echo "selected" ;} ?> >
														Question: <?= $video_question->question_content?> 
														Answers: 
														<?php if($video_question->question_answer_contents):
															foreach($video_question->question_answer_contents as $answer_content):?>
																<?=$answer_content?>;
														<?php endforeach; endif;?> 
														
													</option>
										 		<?php endforeach; ?>
										 </select>
										 
										<div>
											<br>
											<label>or type your own</label>
											<div>
												<p>question:</p>
											 	<textarea name="question_type_<?=$index+1?>" class="video_info_elements question<?=$index+1?> question_type"></textarea>
											 	<div class="answers_type" hidden>
												 	<p>answer 1</p>
												 	<input name="answer<?=$index+1?>_1" class="A1_1 question<?=$index+1?>" type="text">
												 	<p>answer 2</p>
												 	<input name="answer<?=$index+1?>_2" class="A1_2 question<?=$index+1?>" type="text">
												 	<p>answer 3</p>
												 	<input name="answer<?=$index+1?>_3" class="A1_3 question<?=$index+1?>" type="text">
												 	<p>answer 4</p>
												 	<input name="answer<?=$index+1?>_4" class="A1_4 question<?=$index+1?>" type="text">
											 	</div>
										 	</div>
									 	</div>
									</div>
									<br><br>
								</div>
								<?php endforeach; ?>
								<?php else: ?>
									<?php for($index=0;$index<2;$index++):?>
										<div class="choose_question">	
											<div>
												<b>question <?=$index+1?>:</b>
												<label>choose questions:</label>
												<select name="question<?=$index+1?>" id="question<?=$index+1?>" class="video_info_elements quesiton_choose">
												 		<option value="" selected="selected"><--choose a question here--></option>
												 		<?php 
												 			foreach($video_info->questions as $video_question):?>
															<option value=<?=$video_question->id ?> 
																<?php if($video_info->selected_questions !== false){
																 if($video_question->id == $video_info->selected_questions[$index]->video_question_question_id) 
																 echo "selected" ;} ?> >
																	Question: <?= $video_question->question_content?> 
																	Answers: 
																<?php if($video_question->question_answer_contents):
																	foreach($video_question->question_answer_contents as $answer_content):?>
																		<?=$answer_content?>;
																<?php endforeach; endif;?> 
															</option>
												 		<?php endforeach; ?>
												 </select>
												 
												<div>
													<br>
													<label>or type your own</label>
													<p>question:</p>
													<div>
													 	<textarea name="question_type_<?=$index+1?>" class="video_info_elements question<?=$index+1?> question_type"></textarea>
													 	<div class="answers_type" hidden>
														 	<p>answer 1</p>
														 	<input name="answer<?=$index+1?>_1" class="A1_1 question<?=$index+1?>" type="text">
														 	<p>answer 2</p>
														 	<input name="answer<?=$index+1?>_2" class="A1_2 question<?=$index+1?>" type="text">
														 	<p>answer 3</p>
														 	<input name="answer<?=$index+1?>_3" class="A1_3 question<?=$index+1?>" type="text">
														 	<p>answer 4</p>
														 	<input name="answer<?=$index+1?>_4" class="A1_4 question<?=$index+1?>" type="text">
													 	</div>
												 	</div>
											 	</div>
											</div>
											<br><br>
										</div>
									<?php endfor; ?>
								<?php endif; ?>
							</div>
						</div>

					    <div class="control-group">
							<div class="controls">
								 <input class="btn btn-primary  change_submit" type="submit" name="submit" id="submit" value="save changes">
								 <?php if($video_info->ajax == 0): ?>
								 	<a class="btn offset1" href="<?=site_url('company/company_company/video_manager')?>">cancel</a>
								 <?php else: ?>
								 	<a class="btn btn-danger offset1" href="<?=site_url('company/company_company/video_deleting').'/'.$video_info->id.'/'.$video_info->video_path?>">cancel upload</a>
								 <?php endif ?>
							</div>
						</div>
						
		<?php echo form_close(); ?>
	<?php endif ?>
</div>
