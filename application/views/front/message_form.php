<table class="table" id="tb">
	<thead>
		<tr>
			<th>No</th>
			<th>Subject</th>
			<th>Waktu</th>
			<th>View</th>
		</tr>
	</thead>
	<tbody>
	<?php
		$n=1;
		foreach ($data as $r) {
	?>
		<tr>
			<td><?=$n++?></td>
			<td><?=$r['subject']?></td>
			<td><?=dateToIndo($r['waktu'],true,true)?></td>
			<td>
				<a href="<?=site_url('shop/detailmessage/'.$r['id'])?>" class="btn btn-xs btn-info"><i class="fa fa-search"></i> View</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>