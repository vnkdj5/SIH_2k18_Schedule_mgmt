
<section class="content-header">
          <h1>
            Registration
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            
			<?php
				if($_GET['folder']=="registrations" && $_GET['file']=="participantdetails")
				{
				?>
			<li class="active"><a href="index.php?folder=registrations&file=registrationsdetails">Officer Registrations</a></li>
			<li class="active">Add User</li>
			<?php
				}
				else
				{
			?>
				<li class="active">Registrations</li>
			<?php
				}
			?>
          </ol>
</section>
