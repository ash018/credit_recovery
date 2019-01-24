<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
				<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
				<li class="sidebar-search-wrapper">
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
					<!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
					<form class="sidebar-search " action="#" method="POST">
						<a href="javascript:;" class="remove">
						<i class="icon-close"></i>
						</a>
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search...">
							<span class="input-group-btn">
							<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
							</span>
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				<li class="start active open">
					<a href="javascript:;">
						<a href="index.php"><i class="icon-home"></i>
						<span class="title">Dashboard</span>
						<span class="selected"></span></a>
						<!--<span class="arrow open"></span> -->
					</a>					
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-puzzle"></i>
					<span class="title">Recovery</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="javascript:;">
							<i class="icon-docs"></i>
							<span class="title">View</span>
							<span class="arrow "></span>
							</a>							
							<ul class="sub-menu">
								<li>
									<a href="viewcredithistory.php">
									<i class="icon-home"></i>
									View History</a>
								</li>
								<li>
									<a href="dailyactivity.php">
									<i class="icon-home"></i>
									Daily Activity</a>
								</li>
								<!--<li>
									<a href="viewcollectionhistory.php">
									<i class="icon-home"></i>
									Credit Collection</a>
								</li>	
								<li>
									<a href="viewcreditanalysis.php">
									<i class="icon-home"></i>
									Credit Analysis</a>
								</li>-->
								<li>
									<a href="viewcolorreport.php">
									<i class="icon-home"></i>
									Color Report</a>
								</li>		
							</ul>
						</li>
						<!--<li>
							<a href="javascript:;">
							<i class="icon-docs"></i>
							<span class="title">Projection</span>
							<span class="arrow "></span>
							</a>							
							<ul class="sub-menu">
								<li>
									<a href="uploadprojection.php">
									<i class="icon-home"></i>
									Upload Projection</a>
								</li>								
							</ul>
						</li>-->
						<li>
							<a href="javascript:;">
							<i class="icon-docs"></i>
							<span class="title">Assessment</span>
							<span class="arrow "></span>
							</a>							
							<ul class="sub-menu">
								<li>
									<a href="addquestions.php">
									<i class="icon-home"></i>
									Add Questions</a>
								</li>	
								<li>
									<a href="viewassessment.php">
									<i class="icon-home"></i>
									Assessment Result</a>
								</li>
								<!--<li>
									<a href="viewassessinquiry.php">
									<i class="icon-home"></i>
									Assessment Inquiry</a>
								</li>-->
								<li>
									<a href="viewverify.php">
									<i class="icon-home"></i>
									Who Varified?</a>
								</li>
							</ul>
						</li>
						
					</ul>
				</li>				
				<!--<li>
					<a href="monthly_assessment.php"><i class="icon-home"></i>
					<span class="title">Assessment(Monthly)</span>
					</a>				
				</li>
				<li>
					<a href="monthly_Sdms.php"><i class="icon-home"></i>
					<span class="title">From SDMS</span>
					</a>				
				</li>-->
				<li>
					<a href="monthly_collection.php"><i class="icon-home"></i>
					<span class="title">All Collection</span>
					</a>				
				</li>
				<li>
					<a href="monthly_projection.php"><i class="icon-home"></i>
					<span class="title">All Projection</span>
					</a>				
				</li>
				<li>
					<a href="allcommitmentamount.php"><i class="icon-home"></i>
					<span class="title">All Commitment</span>
					</a>				
				</li>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>