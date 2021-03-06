<!DOCTYPE html>
<?
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SESSION['UserID']))
{
	$UserID = $_SESSION['UserID'];
	$Username = $_SESSION['User Name'];
	$ProfileType =$_SESSION['User Type'];
  $Student_id = $_SESSION['StudentId'];

  require_once("../Controller/Lookup_Controller.php");
  //require_once("../Controller/Upload_interndetails_Controller.php");
?>
<html lang="en">
<head>

	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Internship Mgmt System</title>
	<meta name="description" content="IMS Dashboard">
	<meta name="author" content="Satish">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->

	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->

	<!-- start: CSS -->
	<link id="bootstrap-style" href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="../css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="../css/style-responsive.css" rel="stylesheet">
	<link href='../css/google_font_api.css' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->


	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->

	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->

	<!-- start: Favicon -->
	<link rel="shortcut icon" href="../img/favicon.ico">
	<!-- end: Favicon -->

  <script type="text/javascript">

    }
  </script>
</head>

<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="../index.php"><span>Internship Mgmt System (IMS) </span></a>

				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">

						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i>
								Access level: <? echo $ProfileType; ?>
							</a>
						</li>

						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> <?echo 	$Username;?>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Account Settings</span>
								</li>
								<li><a href="#"><i class="halflings-icon user"></i> Profile</a></li>
								<li><a href="../Controller/Logout_Controller.php"><i class="halflings-icon off"></i> Logout</a></li>
							</ul>
						</li>



						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->

			</div>
		</div>
	</div>
	<!-- start: Header -->

		<div class="container-fluid-full" >
			<div class="row-fluid" >

				<!-- start: Main Menu -->
				<div id="sidebar-left" class="span2" >
					<div class="nav-collapse sidebar-nav">
						<ul class="nav nav-tabs nav-stacked main-menu">
              <? if($ProfileType == "Admin") { ?>

                    <li><a href="../View/Dashboard.php"><i class="icon-bar-chart"></i><span class="active hidden-tablet"> Dashboard</span></a></li>
                    <li><a href="../Controller/Upload_interndetails_Controller.php "><i class="icon-download-alt"></i><span class="hidden-tablet"> Positions</span></a></li>
                    <li><a href="../View/Upload_form.php "><i class="icon-edit"></i><span class="hidden-tablet"> Upload Details</span></a></li>
                    <li><a href="../Controller/View_Controller.php "><i class="icon-align-justify"></i><span class="hidden-tablet"> View Details</span></a></li>

                    <li><a href="../View/chart.php "><i class="icon-signal"></i><span class="hidden-tablet"> Analysis</span></a></li>
                    <li><a href="../View/calendar.php"><i class="icon-calendar"></i><span class="hidden-tablet"> Calendar</span></a></li>
                    <li><a href="../View/file-manager.php"><i class="icon-folder-open"></i><span class="hidden-tablet"> CV Manager</span></a></li>

              <? }
                else { ?>
                      <li><a href="../View/Dashboard.php"><i class="icon-bar-chart"></i><span class="active hidden-tablet"> Dashboard</span></a></li>
                      <li><a href="../Controller/Upload_interndetails_Controller.php"><i class="icon-download-alt"></i><span class="active hidden-tablet"> Positions </span></a></li>
                      <li><a href="../Controller/Upload_Controller.php "><i class="icon-edit"></i><span class="hidden-tablet"> View/Update Details</span></a></li>

              <?  } ?>
						</ul>
					</div>
				</div>
				<!-- end: Main Menu -->

				<noscript>
					<div class="alert alert-block span10">
						<h4 class="alert-heading">Warning!</h4>
						<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
					</div>
				</noscript>

				<!-- start: Content -->
				<div id="content" class="span10" >

					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="index.html">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li><a href="#">Positions</a></li>
					</ul>

          <? if($ProfileType == "Admin") {?>
          <div class="row-fluid sortable">
    				<div class="box span12">
    					<div class="box-header" data-original-title>
    						<h2><i class="halflings-icon white user"></i>
                  <span class="break"></span>
                  <span class="col-md-3" > Add Internship Position  </span>
                  <span class="col-md-6" style="margin-left: 3em;"> </span>
                  <span class="col-md-6" style="margin-left: 27em;">
                    <?
                     if(isset($_GET['info']))
                        echo "Position Added..";

                    ?>
                  </span>
                 </h2>
    						<div class="box-icon">
    							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
    							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
    						</div>
    					</div>

    				<div class="box-content">
              <form class="form-horizontal" name="Upload_Intern_Positions_form" action="../Controller/Upload_interndetails_Controller.php" method="post" onsubmit="return check_upload_form()">
                <fieldset>

                  <div class="control-group">
                    <label class="control-label" for="Intern_type">Internship Type</label>
                    <div class="controls">
                      <div class="input">

                        <select id="Intern_type" name="Intern_type">
                        <?
                        foreach($FormLookup_Details_InternType as $Intern_Type)
                        {
                        ?>
                                 <option value="<?echo $Intern_Type; ?>"> <?echo $Intern_Type;?> </option>
                        <?
                        }
                        ?>
                        </select>

                        <input type="radio" name="Intern_payment" id="Intern_paid" value="Paid" checked="">
                                 Paid
                        <input type="radio" name="Intern_payment" id="Intern_unpaid" value="Un-Paid">
                                 Unpaid

                      </div>
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label" for="Company_name">Company name</label>
                    <div class="controls">
                      <div class="input">
                         <input id="Company_name" name="Company_name" size="16" type="text" />
                      </div>
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label" for="Company_addr">Company Address</label>
                    <div class="controls ">
                      <div class="input">
                         <input class="input-xlarge" id="Company_addr" name="Company_addr" size="30" type="text" placeholder="Address" />
            						 <input class="span2" id="Company_city" name="Company_city" size="30" type="text" placeholder="City">
            						 <input class="span2" id="Company_PostalCode" name="Company_PostalCode" size="30" type="text" placeholder="Postal Code">
                      </div>
                    </div>
                  </div>

				 <div class="control-group">
                    <label class="control-label" for="Company_Phonenum">Org - Contact Info</label>
                    <div class="controls">
                      <div class="input">
                         <input class="span3" id="Company_Phonenum" name="Company_Phonenum" size="30" type="text" placeholder="Org Phone num" />
						             <input class="span4" id="Company_OrgWebsite" name="Company_OrgWebsite" size="30" type="text" placeholder="Org Website" />
                      </div>
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label" for="Company_POC_Fname">POC - Info</label>
                    <div class="controls">
                      <div class="input">
                         <input class="span3" id="Company_POC_Fname" name="Company_POC_Fname" size="30" type="text" placeholder="First Name"/>
            						 <input class="span3" id="Company_POC_Lname" name="Company_POC_Lname" size="30" type="text" placeholder="Last Name"/>
            						 <input class="span4" id="Company_POCEmail" name="Company_POCEmail" size="30" type="text" placeholder="POC E-mail"/>
                      </div>
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label" for="Company_POC_Position">POC - Position</label>
                    <div class="controls">
                      <div class="input">
                         <input id="Company_POC_Position" name="Company_POC_Position" size="30" type="text" />
                      </div>
                    </div>
                  </div>

				  <div class="control-group">
                    <label class="control-label" for="Job_Position">Job - Info</label>
                    <div class="controls">
                      <div class="input">
                         <input class="span3" id="Job_Position" name="Job_Position" size="30" type="text" placeholder="Position"/>
                          <select id="Job_group" name="Job_group">
                           <?
                           foreach($FormLookup_Details_JobGroup as $Job_Group)
                           {
                           ?>
                                    <option value="<?echo $Job_Group; ?>"> <?echo $Job_Group;?> </option>
                           <?
                           }
                           ?>
                          </select>
                      </div>
                    </div>
                  </div>

				  <div class="control-group">
                    <label class="control-label" for="Intern_PositionNotes">Job Description</label>
                    <div class="controls">
                      <div class="input">
                        <textarea id="Job_Desc" name="Job_Desc" rows="8" style="width:30em;"></textarea>
                      </div>
                    </div>
                  </div>

				  <div class="control-group">
                    <label class="control-label" for="Intern_PositionNotes">Job Responsibilities</label>
                    <div class="controls">
                      <div class="input">
                        <textarea id="Job_Responsibility"  name="Job_Responsibility" rows="8" style="width:30em;"></textarea>
                      </div>
                    </div>
                  </div>

				  <div class="control-group">
                    <label class="control-label" for="Intern_PositionNotes">Requirements</label>
                    <div class="controls">
                      <div class="input">
                        <textarea id="Job_Reqmnts" name="Job_Reqmnts" rows="8" style="width:30em;"></textarea>
                      </div>
                    </div>
                  </div>

				  <div class="control-group">
                    <label class="control-label" for="Intern_PositionNotes">Notes</label>
                    <div class="controls">
                      <div class="input">
                        <textarea id="Intern_PositionNotes" name="Intern_PositionNotes" rows="8" style="width:30em;"></textarea>
                      </div>
                    </div>
                  </div>


                </fieldset>

                <fieldset>

                <div class="form-actions">
                  <button type="submit" name="Upload_InternPosition_form" class="btn btn-primary">Save changes</button>
                  <button type="reset" class="btn">Cancel</button>
                </div>
                </fieldset>
              </form>

              </div>
    				</div>
    			</div>

          <? } ?>
    			<!-- End : Inputs for Query -->



          <?  if($ProfileType == "Admin") { ?>
    			<div class="row-fluid sortable">
    				<div class="box span12">
    					<div class="box-header" data-original-title>
    						<h2><i class="halflings-icon white user"></i>
                  <span class="break"></span>
                  <span class="col-md-3" > Available Positions  </span>
                  <span class="col-md-6" style="margin-left: 3em;"> </span>
                  <span class="col-md-6" style="margin-left: 27em;">
                    <?
                     if(isset($_GET['deleted']))
                        echo "Selected Positions Deleted..";
                    ?>
                  </span>
                </h2>
    						<div class="box-icon">
    							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
    							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
    						</div>
    					</div>

    					<div class="box-content">

                <? if(isset($Available_Interndetails_arr) && (count($Available_Interndetails_arr) > 0) ){

                ?>
                <form class="form-horizontal" name="Delete_Positions_form" action="../Controller/Upload_interndetails_Controller.php" method="post" onsubmit="return check_upload_form()">
                <fieldset>

    						<table class="table table-striped table-bordered bootstrap-datatable datatable">
    						  <thead>
    							  <tr>
                      <th></th>
    								  <th>Position</th>
                      <th>Job Group</th>
    								  <th>Company</th>
                      <th>Location</th>
                      <th>Type</th>
    								  <th style="text-align:center;">Interested</th>
    								  <th style="text-align:center;">Hired</th>
    							  </tr>
    						  </thead>
    						  <tbody>
                    <?

                    $arr_keys = array_keys($Available_Interndetails_arr);

                    foreach($arr_keys as $key ){
                    ?>
                    <tr>
                      <td style="text-align:center;">
                        <input type="checkbox" name="chkbox_select_<?echo $key;?>" id="inlineCheckbox_<?echo $key;?>" value="<?echo $key;?>_selected">
                      </td>
                      <td>
                            <a href="../Controller/Positions_Controller.php?Available_Position_id=<? echo $key; ?>" class="open-AddBookDialog" data-toggle="modal" data-target="#PositionDetailsModal"   >
                            <? echo  $Available_Interndetails_arr[$key]['intern_position'];  ?>
                            </a>
                      </td>
                      <td>  <? echo  $Available_Interndetails_arr[$key]['intern_jobgroup_name'];   ?> </td>
                      <td class="center">  <? echo  $Available_Interndetails_arr[$key]['company_name'];   ?> </td>
                      <td class="center">  <? echo  $Available_Interndetails_arr[$key]['company_addr_city'];   ?> </td>
                      <td class="center">  <? echo  $Available_Interndetails_arr[$key]['intern_payment'];   ?> </td>

                      <!-- Trigger the modal with a button -->
                    <!--  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

                      <td class="center" style="text-align:center;">
                        <?if ($Available_Interndetails_arr[$key]['interested_count'] > 0){?>
                            <a href="../Controller/Positions_Controller.php?InterestedPosition_id=<? echo $key; ?>" class="open-AddBookDialog" data-toggle="modal" data-target="#InterestedModal"  >
                                <? echo  $Available_Interndetails_arr[$key]['interested_count'];   ?>
                            </a>
                        <?}  else {?>
                                  <? echo  $Available_Interndetails_arr[$key]['interested_count'];   ?>
                        <? }  ?>
                      </td>
                      <td class="center" style="text-align:center;">
                        <?if ($Available_Interndetails_arr[$key]['hired_count'] > 0){?>
                              <a href="../Controller/Positions_Controller.php?HiredPosition_id=<? echo $key; ?>" class="open-AddBookDialog" data-toggle="modal" data-target="#HiredModal"  >
                                <? echo  $Available_Interndetails_arr[$key]['hired_count'];   ?>
                              </a>
                        <?}  else {?>
                                  <? echo  $Available_Interndetails_arr[$key]['hired_count'];   ?>
                        <? }  ?>

                      </td>
                    </tr>
                    <? } ?>

                  <!--<tr>
    								<td>PHP Developer</td>
                    <td>Web Developer</td>
    								<td class="center">IBM</td>
    								<td class="center">Toronto</td>
                    <td class="center">Paid</td>
                    <td class="center">
                      <a href=""> 10 </a>
                    </td>
                    <td class="center">
    									<a href=""> 5 </a>
    								</td>
    							</tr>
                  -->
    						  </tbody>
    					  </table>
                <fieldset>

                <div class="form-actions">
                  <button type="submit" name="Delete_Available_Positions_form" class="btn btn-primary">Delete Positions</button>
                </div>
                </fieldset>
              </form>

                <? } else {?>
                  <h3> No Records yet...</h3>

                <? } ?>

    					</div>
    				</div><!--/span-->
    			</div><!--/row-->
          <? } else {
            # code...
          ?>
          <div class="row-fluid sortable">
            <div class="box span12">
              <div class="box-header" data-original-title>
                <h2><i class="halflings-icon white user"></i>
                  <span class="col-md-3" > Available Positions  </span>
                  <span class="col-md-6" style="margin-left: 5em;"> </span>
                  <span class="col-md-6" style="margin-left: 27em;">
                    <?
                     if(isset($_GET['Interest_update']))
                        echo "Interest Updated..";
                    ?>
                  </span>
                </h2>
                <div class="box-icon">
                  <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
                  <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
                </div>
              </div>
              <div class="box-content">

                <form class="form-horizontal" name="Upload_StuPreIntern_form" action="../Controller/Upload_interndetails_Controller.php" method="post" onsubmit="return check_upload_form()">
                <fieldset>
                <?
                    if(isset($Available_Interndetails_arr) && (count($Available_Interndetails_arr) > 0) ){
                ?>
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                  <thead>
                    <tr>
                      <th>Position</th>
                      <th>Job Group</th>
                      <th>Company</th>
                      <th>Location</th>
                      <th>Type</th>
                      <th style="text-align:center">Interested</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?

                  $arr_keys = array_keys($Available_Interndetails_arr);

                  foreach($arr_keys as $key ){
                  ?>
                  <tr>
                    <td>
                      <a href="../Controller/Positions_Controller.php?Available_Position_id=<? echo $key; ?>" class="open-AddBookDialog" data-toggle="modal" data-target="#PositionDetailsModal"   >
                      <? echo  $Available_Interndetails_arr[$key]['intern_position'];  ?>
                      </a>
                    </td>
                    <td>  <? echo  $Available_Interndetails_arr[$key]['intern_jobgroup_name'];   ?> </td>
                    <td class="center">  <? echo  $Available_Interndetails_arr[$key]['company_name'];   ?> </td>
                    <td class="center">  <? echo  $Available_Interndetails_arr[$key]['company_addr_city'];   ?> </td>
                    <td class="center">  <? echo  $Available_Interndetails_arr[$key]['intern_payment'];   ?> </td>

                    <td class="center" style="text-align:center">
                      <?
                      if(Interested_chk($Student_id,$key)) {?>
                          <input type="checkbox" name="chkbox_interested_<?echo $key;?>" id="chkbox_interested_<?echo $key;?>" value="option1" checked>
                      <?   }elseif(Hired_chk($Student_id,$key)) {  ?>
                          <input type="button" name="button_hired_<?echo $key;?>" id="button_hired_<?echo $key;?>" value="Hired" disabled>
                      <?  }   else {?>
                          <input type="checkbox" name="chkbox_interested_<?echo $key;?>" id="chkbox_interested_<?echo $key;?>" value="option1">
                      <? }  ?>
                    </td>
                  </tr>
                  <? } ?>

                  </tbody>
                </table>

                <? } else {?>
                  <h3> No Records yet...</h3>

                <? } ?>

                </fieldset>

                <fieldset>

                <div class="form-actions">
                  <button type="submit" name="Update_Position_interest_form" class="btn btn-primary">Save changes</button>
                  <button type="reset" class="btn">Cancel</button>
                </div>
                </fieldset>
              </form>


              </div>
            </div><!--/span-->

          </div><!--/row-->
          <? } ?>

    	</div><!--/.fluid-container-->

						</div><!--/span--> <!-- end: Content -->

					</div><!--/fluid-row-->

				</div><!--/#content.span10-->

			</div><!--/fluid-row-->

		</div><!--/.fluid-container-->


    <!-- Modal -->
    <div id="InterestedModal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-xlg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Interested Students</h4>
          </div>
          <div class="modal-body">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
                <tr>
                  <th>Student ID</th>
                  <th>Student Name</th>
                  <th>Confirm to Hire</th>
                </tr>
              </thead>
              <tbody>
              <?

              $arr_keys = array_keys($Available_Interndetails_arr);

              foreach($arr_keys as $key ){
              ?>
              <tr>
                <td>  <? echo  $Intersted_students_arr[$key][1]['student_id'];  ?> </td>
                <td>  <? echo  $Intersted_students_arr[$key][1]['student_name'];   ?> </td>
                <td class="center">  <input type=text name="test" id="test" value=""/></td>
              </tr>
              <? } ?>

              </tbody>
            </table>
          </div>

        </div>

      </div>
    </div>

    <!-- Modal -->
    <div id="PositionDetailsModal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-xlg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Position Details</h4>
          </div>
          <div class="modal-body">
            <p>Some text in the modal.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>

    <div id="HiredModal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-xlg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Hired Students</h4>
          </div>
          <div class="modal-body">
            <p>Some text in the modal.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>

		<footer style="border:1px solid black">

			<p>
				<span style="text-align:left;float:left">&copy; 2016  Copyright Reserved </span>

			</p>

		</footer>

	<!-- start: JavaScript-->

		<script src="../js/jquery-1.9.1.min.js"></script>
		<script src="../js/jquery-migrate-1.0.0.min.js"></script>

		<script src="../js/jquery-ui-1.10.0.custom.min.js"></script>

		<script src="../js/jquery.ui.touch-punch.js"></script>

		<script src="../js/modernizr.js"></script>

		<script src="../js/bootstrap.min.js"></script>

		<script src="../js/jquery.cookie.js"></script>

		<script src='../js/fullcalendar.min.js'></script>

		<script src='../js/jquery.dataTables.min.js'></script>

  	<script src="../js/excanvas.js"></script>
    <script src="../js/jquery.flot.js"></script>
    <script src="../js/jquery.flot.pie.js"></script>
    <script src="../js/jquery.flot.stack.js"></script>
    <script src="../js/jquery.flot.resize.min.js"></script>

		<script src="../js/jquery.chosen.min.js"></script>

		<script src="../js/jquery.uniform.min.js"></script>

		<script src="../js/jquery.cleditor.min.js"></script>

		<script src="../js/jquery.noty.js"></script>

		<script src="../js/jquery.elfinder.min.js"></script>

		<script src="../js/jquery.raty.min.js"></script>

		<script src="../js/jquery.iphone.toggle.js"></script>

		<script src="../js/jquery.uploadify-3.1.min.js"></script>

		<script src="../js/jquery.gritter.min.js"></script>

		<script src="../js/jquery.imagesloaded.js"></script>

		<script src="../js/jquery.masonry.min.js"></script>

		<script src="../js/jquery.knob.modified.js"></script>

		<script src="../js/jquery.sparkline.min.js"></script>

		<script src="../js/counter.js"></script>

		<script src="../js/retina.js"></script>

		<script src="../js/custom.js"></script>
	<!-- end: JavaScript-->

</body>
</html>
<?
}
else
{
		header('Location: ../index.php');
}

?>
