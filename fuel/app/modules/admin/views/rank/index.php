<div class="row">
	<div class="col-md-5 col-md-offset-9">
		<button class="btn btn-primary">Button 1</button>
		<button class="btn btn-danger">Button 2</button>
	</div>
	<div class="col-md-5 col-md-offset-9">
		<button class="btn btn-success">Button 3</button>
		<button class="btn btn-warning">Button 4</button>
	</div>
</div>

<div class="tab">
  <button class="tablinks" onclick="openTab(event, 'tab-1')">London</button>
  <button class="tablinks" onclick="openTab(event, 'Paris')">Paris</button>
  <button class="tablinks" onclick="openTab(event, 'Tokyo')">Tokyo</button>
</div>
<div class="row">
  	<div id="tab-1" class="tabcontent" style="display: block;">
  		<div class="row">
  			<div class="col-md-3 col-md-offset-9 form-inline">
				<div class="col-md-6">
					<select class="form-control" name="year">
						<option>2017</option>
					</select>
				</div>
				<div class="col-md-6">
					<select class="form-control" name="month">
						<option>7</option>
						<option>6</option>
					</select>
				</div>
				
			</div>
  		</div>
  		<div class="col-xs-10" id="list">
  		<?php $i = 1; ?>
  		<?php foreach ($users as $user) { ?>
			<div class="row">
				<div class="col-xs-1 number-circle"><?php echo $i++; ?></div>
				<div class="col-xs-3 avatar">
					<img src='../assets/img/<?php echo $user->avatar;?>' alt="" width="200" height="200">
				</div>
				<div class="col-xs-3">
					<h3 class="user-name"><?php echo $user->name; ?></h3>
					<h3><?php echo number_format($user->point,0)." pt"; ?></h3>
				</div>
			</div>

			<hr>
		<?php } ?>
		</div>
		
		<div class="col-xs-2">
			<h3 class="col-md-offset-4">1</h3>
			<!-- <div class="row" id="ranking">
				<div class="arrow-right col-md-3"></div>
				<div class="col-md-3 skills css">40%</div>
			</div> -->
			<div id="jqmeter-container"></div>
			<h3 class="col-md-offset-4"><?php echo $total_user; ?></h3>
		</div>
  	</div>

	<div id="Paris" class="tabcontent">
	  <h3>Paris</h3>
	  <p>Paris is the capital of France.</p> 
	</div>

	<div id="Tokyo" class="tabcontent">
	  <h3>Tokyo</h3>
	  <p>Tokyo is the capital of Japan.</p>
	</div>


</div>

<script type="text/javascript">
	function openTab(evt, cityName) {
	    // Declare all variables
	    var i, tabcontent, tablinks;
	    // Get all elements with class="tabcontent" and hide them
	    tabcontent = document.getElementsByClassName("tabcontent");
	    for (i = 0; i < tabcontent.length; i++) {
	        tabcontent[i].style.display = "none";
	    }

	    // Get all elements with class="tablinks" and remove the class "active"
	    tablinks = document.getElementsByClassName("tablinks");
	    for (i = 0; i < tablinks.length; i++) {
	        tablinks[i].className = tablinks[i].className.replace(" active", "");
	    }

	    // Show the current tab, and add an "active" class to the button that opened the tab
	    document.getElementById(cityName).style.display = "block";
	    evt.currentTarget.className += " active";
	}
</script>

<!-- Ranking -->
<script type="text/javascript">
	$(document).ready(function(){
		var clientHeight = document.getElementById('list').clientHeight;
	    $('#jqmeter-container').jQMeter({
			goal:'<?php echo $total_user;?>',
		    raised:'<?php echo ($rank);?>',
		    meterOrientation:'vertical',
		    width:'50px',
		    height: clientHeight + 'px',
		    barColor: 'linear-gradient(to top, #DEEEFF, #0782FF)',
		    bgColor: 'linear-gradient(to top, #DEEEFF, #0782FF)'
	    });
	});
</script>