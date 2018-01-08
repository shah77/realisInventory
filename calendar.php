<style>

	table tr td {
		border: 1px solid #c4c5c6;
        color: #F9690E;
        padding: 2px;
        background-color: #edeeef; 
        text-align:center;
        }

	table{width: 100%; border-collapse: collapse;}

	.box{
		background-color: #1a1d2b;
		color: #F9690E;
	}

	@media only screen and(max-width: 1200px)
	{
		table tr td {
		border: 1px solid #c4c5c6;
        
        padding: 0px;
        background-color: #edeeef; 
        text-align:center;
        font-size: 10px;}
	}

</style>

<?php
/* Set the default timezone */
date_default_timezone_set("Asia/Kuala_Lumpur");

/* Set the date */
$date = strtotime(date("Y-m-d"));

$day = date('d', $date);
$month = date('m', $date);
$year = date('Y', $date);
$firstDay = mktime(0,0,0,$month, 1, $year);
$title = strftime('%B', $firstDay);
$dayOfWeek = date('D', $firstDay);
$daysInMonth = cal_days_in_month(0, $month, $year);
/* Get the name of the week days */
$timestamp = strtotime('next Sunday');
$weekDays = array();
for ($i = 0; $i < 7; $i++) {
	$weekDays[] = strftime('%a', $timestamp);
	$timestamp = strtotime('+1 day', $timestamp);
}
$blank = date('w', strtotime("{$year}-{$month}-01"));
?>
<table class='table table-bordered' style="table-layout: ;">
	<tr>
		<th colspan="7" class="text-center"> <?php echo $title ?> <?php echo $year ?> </th>
	</tr>
	<tr>
		<?php foreach($weekDays as $key => $weekDay) : ?>
			<td class="box"><?php echo $weekDay ?></td>
		<?php endforeach ?>
	</tr>
	<tr>
		<?php for($i = 0; $i < $blank; $i++): ?>
			<td></td>
		<?php endfor; ?>
		<?php for($i = 1; $i <= $daysInMonth; $i++): ?>
			<?php if($day == $i): ?>
				<td style="background-color: #F9690E;color: white;"><strong><?php echo $i ?></strong></td>
			<?php else: ?>
				<td><?php echo $i ?></td>
			<?php endif; ?>
			<?php if(($i + $blank) % 7 == 0): ?>
				</tr><tr>
			<?php endif; ?>
		<?php endfor; ?>
		<?php for($i = 0; ($i + $blank + $daysInMonth) % 7 != 0; $i++): ?>
			<td></td>
		<?php endfor; ?>
	</tr>
</table>