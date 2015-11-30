<!DOCTYPE html>
<html>

  <head>
    <link href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/shift.css" rel="stylesheet">
    
    <link rel="stylesheet" href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/bootstrap.css">
    <link rel="stylesheet" href="main.css">
    
  </head>

  <body>
    <!--div class="nav">
      <div class="container">
        <ul class = "pull-left">
          <li><a href="#">Name</a></li>
          <li><a href="#">Browse</a></li>
        </ul>
        <ul class = "pull-right">
          <li><a href="#">Sign Up</a></li>
          <li><a href="#">Log In</a></li>
          <li><a href="#">Help</a></li>
        </ul>
      </div>
    </div-->

    <div class="jumbotron">
      <div class="container">
        <h1>Search Engine</h1>
        <p>Input your keywords in the search box below.</p>
	<p>You can choose between BM25, TFIDF, Frequency</p>
        <div class = "search_box">
            <form id="searchbox" action="index.php">
                <input name="search" type="text" placeholder="Type here">
				<input type="radio" name="search_type" value="BM25" checked="checked"> BM25
				<input type="radio" name="search_type" value="TFIDF">TFIDF
				<input type="radio" name="search_type" value="frequency">Frequency
				<input id="submit" type="submit" value="Search">
            </form>
        </div>
      </div>
    </div> 

	   <?php
       if(isset($_GET["search_type"]))
	   {
	   		$search_type = $_GET["search_type"];
			$search = $_GET["search"];
		   

	if($search_type == "BM25")
	{
	?>
		<div class="BM25">
		  <div class="container">
			<h2>Search Results</h2>
			<p>Below are your result <?php echo $search; ?> ranked by BM25</p>
				<div class="row">
				  <div class="col-md-4">
				    <h3>Top 10 results</h3>
				  </div>	
			</div>
	      </div>
	    </div>
	<?php
	}			
	else if($search_type=="TFIDF")
	    {
	   ?>
	    <div class="TFIDF">
	      <div class="container">
			<h2>Search Results</h2>
			<p>Below are your result ranked by BM25</p>
				<div class="row">
				  <div class="col-md-4">
				    <h3>Top 3 results</h3>
				  </div>
				  <div class="col-md-4">
				    <h3>Top 6 results</h3>
				  </div>
				  <div class="col-md-4">
			    <h3>Top 6 results</h3>
			  </div>		
			</div>
	      </div>
	    </div>
		<?php
	    }	
	else if($search_type="frequency")
	    {
	   ?>
	    <div class="Frequency">
	      <div class="container">
			<h2>Search Results</h2>
			<p>Below are your result ranked by BM25</p>
				<div class="row">
				  <div class="col-md-4">
				    <h3>Top 3 results</h3>
				  </div>
				  <div class="col-md-4">
				    <h3>Top 6 results</h3>
				  </div>
				  <div class="col-md-4">
			    <h3>Top 6 results</h3>
			  </div>		
			</div>
	      </div>
	    </div>
		<?php
	    }	
	}
       ?>	
    
	<!---div class="BM25">
        <div class="container">
            <h2>Search Results</h2>
            <p>Below are your results ranked by BM25 through Whoosh.</p>
             <div class="row">
                <div class="col-md-4">
					<h3>Top 3 results</h3>	
					<?php echo $_POST["search"];?>
					<?php echo $_POST["search_type"];?>
				</div>
                <div class="col-md-4">
			<h3>Top 6 results</h3>
                </div>
                <div class="col-md-4">
			<h3>Top 9 results</h3>
                </div>
            </div>
        </div>
    </div>
	<div class="PageRank">
	  <div class="container">
		<h2>Search results</h2>
		<p>Below are you results ranked by page rank.</p>
		<div class = "row">
	      		<div class = "col-md-4">
				<h3>Top 3 results</h3>	
	      		</div>
		  
			<div class="col-md-4">
				<h3>Top 6 results</h3>
		  	</div>
		  
			<div class="col-md-4">
				<h3>Top 9 results</h3>
		  	</div>
	    	</div>
	  </div>
	</div-->
  </body>
</html>
