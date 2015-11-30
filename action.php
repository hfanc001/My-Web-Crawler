<html>
  <body>
    <?php
       
	echo $_GET["search"]; 
	
if($search_type="BM25")
       {
       ?>
    <div class="BM25">
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
       else if($search_type="TFIDF")
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
    <div class="frequency">
      <div class="container">
	<h2>Search Results</h2>
	<p>Below are your result ranked by frequenct</p>
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
       if($search_type="PageRank")
       {
       ?>
    <div class="PageRank">
      <div class="container">
	<h2>Search Results</h2>
	<p>Below are your result ranked by PageRank</p>
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
       ?>
  </body>
</html>
