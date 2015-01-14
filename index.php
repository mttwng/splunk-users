<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link href="assets/styles.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets/favicon.png" />

    <!-- Metadata -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="keywords" content="Splunk Users"/>
    <meta name="description" content="Splunk Users is a one-stop site for viewing all the information you need as a splunk user. "/>
    <meta name="author" content="Matthew Wong">
    
</head>
<body class="loading">
    <!-- Fixed navbar -->
    <!-- <nav class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Users.Splunk</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="answers.php">Answers</a></li>
            <li><a href="apps.php">Apps</a></li>
            <li><a href="blog.php">Blog</a></li>
          </ul>
        </div>
      </div>
    </nav> -->

    <div class="banner">
      <div class="container">
        <h1>splunk<span style='color:#959595'>></span>users</h1>
        <!-- <h3>by <a href="http://webualize.com/">Matt</a></h3> -->
        <h3> 
          Trending information for Splunk users after you <a href="http://wiki.splunk.com/Deploy" class="banner-link" target="_blank">deploy</a>.
        
          (<a href="http://dev.splunk.com/" class="banner-link" target="_blank">dev</a>)
        </h3>

      </div>
    </div>

    <div class="modal"></div>
    
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <!-- Custom -->
    <script src="assets/script.js"></script>



    <div class="container-fluid">

        <div class="row">

            <div class="col-md-4 border-left">
                <h2><a href="http://answers.splunk.com/" class="no-color" target="_blank">Answers</a></h2>
                <p>recently asked questions</p>
                <hr>
                <?php include 'answers.php';?>
            </div>

            <div class="col-md-4 border-left">
                <h2><a href="http://apps.splunk.com/" class="no-color" target="_blank">Apps</a></h2>
                <p>recently updated apps</p>
                <hr>
                <?php include 'apps.php';?>
            </div>

            <div class="col-md-4 border-left">
                <h2><a href="http://blogs.splunk.com/" class="no-color" target="_blank">Blogs</a></h2>
                <p>recent blog posts</p>
                <hr>
                <?php include 'blogs.php';?>
            </div>


        </div>
        <div class="row">

            <div class="col-md-4 border-left">
                <h2><a href="http://docs.splunk.com/Documentation" class="no-color" target="_blank">Docs</a></h2>
                <p>recent doc changes</p>
                <hr>
                <?php include 'docs.php';?>
            </div>

            <div class="col-md-4 border-left">
                <h2><a href="http://splunk.com/page/events" class="no-color" target="_blank">Events</a></h2>
                <p>upcoming events</p>
                <hr>
                <?php include 'events.php';?>
            </div>

            <div class="col-md-4 border-left">
                <h2><a href="http://wiki.splunk.com/" class="no-color" target="_blank">Wiki</a></h2>
                <p>recently updated posts</p>
                <hr>
                <?php include 'wiki.php';?>
            </div>

        </div>

        <div class="row top-space">
            <div class="col-md-12 text-center bottom-space">
                <hr>
                &copy; 
                <script type="text/javascript">
                    document.write(new Date().getFullYear());
                </script>
                 Splunk Inc. Created by <a href="http://therealmatt.com/" target="_blank" rel="designer">Matthew Wong</a>.

            </div>
        </div>
    </div> <!-- Fluid Container -->    

</body>
</html>