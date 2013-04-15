<h2 class="span4">Video Manager</h2>
<div style="padding-top:40px" >
<a href="<?=site_url('video/company/upload_video') ?>">click here to upload a new video!</a>
</div>
<?php if($videos !==false):?>
<table class="table table-bordered table-striped span10 offset1"  style=" 
height:>500px? height:500px; overflow:auto">
			
            <thead>
			<tr>
				<th class="span3"><h5>Video</h5></th>
				<th class="span3"><h5>Title of Video</h5></th>
				<th class="span3"><h5>Published Date</h5></th>
				<th class="span3"><h5>Operations</h5></th>
			</tr>
			</thead>
            <tbody>
            
            <?php foreach ($videos as $video): ?>
				<tr>
					<td><img src="<?=$video->thumbnail?>" style="width:100px; height:60px"> </td>
					<td> <?= $video -> video_title ?></td>
					<td> <?= $video -> created_on ?></td>
					<td>
						<a class="btn btn-info" href="<?= site_url('video/company/set_video_info/' . $video -> id) ?>">edit</a>
						<a class="btn btn-danger" href="<?= site_url('video/company/delete_video/' . $video -> id) ?>">delete</a>
					</td>
				</tr>
				 
			<?php endforeach;?>
			</tbody>
          	</table>
			<?php else:?>
			<br>
			<h4>no video!</h4>	
			<?php endif; ?>
			
			
           


