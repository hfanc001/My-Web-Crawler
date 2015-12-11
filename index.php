<!DOCTYPE html>
<html>

  <head>
    <link href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/shift.css" rel="stylesheet">
    
    <link rel="stylesheet" href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/bootstrap.css">
    <link rel="stylesheet" href="main.css">
    
  </head>

  <body>

    <div class="jumbotron">
      <div class="container">
		<h1><a href="main.php">Search Engine</a></h1>
        <p>Input your keywords in the search box below.</p>
	<p>You can choose between BM25, TFIDF</p>
        <div class = "search_box">
            <form id="searchbox" action="main.php">
                <input name="search" type="text" <placeholder="Type here">
				<input type="radio" name="search_type" value="BM25" checked="checked"> BM25
				<input type="radio" name="search_type" value="TFIDF">TFIDF
				<input id="submit" type="submit" value="Search"><br/>
				&emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp14; &emsp14;
				<input type="radio" name="operation_type" value="AND" checked="checked"> AND
				<input type="radio" name="operation_type" value="OR"> OR
				
            </form>

        </div>
      </div>
    </div> 

	   <?php
	  
       if(isset($_GET["search_type"]) && isset($_GET["search"]) && isset($_GET["operation_type"]))
	   {
	   		
	   		$search_type = $_GET["search_type"];
			$operation_type = $_GET["operation_type"];
			$search = $_GET["search"];
			$check = trim($search," ");
			
	if($search_type == "BM25" && !empty($check))
	{
	?>
		
		<div class="BM25">
		  <div class="container">
<?php					// This will contain: array('status' => 'Yes!')

			$result="";
			$command = 'python C:\xampp\htdocs\searcher.py ';
			$search = "\"".$search . "\"";
			$command .= "$search, $search_type, $operation_type";
			system($command);
			
	?>			  
	      </div>
	    </div>
	<?php
	}			
	else if($search_type=="TFIDF" && !empty($check))
	    {
	   ?>
	    <div class="TFIDF">
	     <div class="container">
<?php					// This will contain: array('status' => 'Yes!')

			$result="";
			$command = 'python C:\xampp\htdocs\searcher.py ';
			$search = "\"".$search . "\"";
			$command .= "$search, $search_type, $operation_type";
			system($command);
			
	?>			  
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
