<!DOCTYPE html>
<html lang="en">

<head>
	@include('includes.head')
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
	<!-- Navigation
    ==========================================-->
	<nav id="menu" class="navbar navbar-default navbar-fixed-top">
		@include('includes.menu')
	</nav>
	<!-- Header -->
	<header id="header">
		<div class="intro">
			<div class="overlay">
				<div class="container">
					<div class="row">
						<div class="intro-text">
							<h1>leish
								<span class="highlight">DB</span>
							</h1>
							<p>Integrating Leishmania genomic information.</p>

							<div class="row">
								<div class="col-xs-12 col-md-12">
									<form action="http://www.leishdb.com/query/actsearch" method="post">
										<input type="text" class="form-control ui-autocomplete-input" name="term" id="term" placeholder="Proteins names, UNIPROT ID, ncRNA type, Gene name, LeishDB ID"
										    required="required" style="border-radius: 10px; height: 60px" autocomplete="off">
										<br>
										<div>
											<button type="submit" class="btn btn-warning btn-lg page-scroll" target="_blank">Search</button>
											<button type="button" class="btn btn-success btn-lg page-scroll" data-toggle="modal" data-target="#advancedSearch">
												Advanced Search
											</button>
											<!--<a href="../index.php?p=blast.php" class="btn btn-cta-secondary" >BLAST</a>-->
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div id="advancedSearch" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-body">
					<form method="post" name="adv" id="adv" action="http://www.leishdb.com/query/actadvsearch">
						<div class="row">
							<div class="col-md-8">
								<h5 class="text-left">&nbsp;Select the species:</h5>
								<select class="form-control" onchange="showExtra()" id="organism" name="organism">
									<option selected="selected" value="">Select the species</option>
									<option value="1">Leishmania braziliensis</option>
								</select>
							</div>
							<div id="extra" name="extra" hidden="">
								<div class="col-md-8">
									<h5 class="text-left">
										<input type="radio" name="advoption" id="advoption" required="required" value="1">&nbsp;Select genes/ncRNAs by genomic coordinates:</h5>
									<select class="form-control" onchange="onclickChromossome(0)" id="genomeid" name="genomeid">
										<option selected="selected" value="">Select the chromossome:</option>
									</select>
									<input class="form-control" type="number" name="start" id="start" placeholder="Start position">
									<input class="form-control" type="number" name="end" id="end" placeholder="End position">
								</div>
								<div class="col-md-5">
									<h5 class="text-left">
										<input type="radio" name="advoption" id="advoption" required="required" value="2"> &nbsp;Select ncRNA by type:</h5>
									<select class="form-control" onchange="onclickChromossome(1)" id="ncrnatype" name="ncrnatype">
										<option selected="selected" value="">Select the ncRNA type</option>
										<option value="miRNA">miRNA</option>
										<option value="snoRNA">snoRNA</option>
										<option value="snRNA">snRNA</option>
										<option value="rRNA">rRNA</option>
										<option value="tRNA">tRNA</option>
										<option value="IRES">IRES</option>
										<option value="sRNA">sRNA</option>
										<option value="piRNA">piRNA</option>
										<option value="siRNA">siRNA</option>
										<option value="lncRNA">lncRNA</option>
									</select>
								</div>
							</div>
						</div>
					</form>

				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Search</button>
				</div>
			</div>

		</div>
	</div>

	@yield('content')

	<div id="footer">
		@include('includes.footer')
	</div>

	@include('includes.scripts')

</body>

</html>