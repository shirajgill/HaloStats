<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!--Custom JS and CSS-->
    <link rel="stylesheet" href="css/custom.css"> 
  </head>
  <body>

    <div class="jumbotron jumbotron-green text-center">
      <h1>Halo Stats</h1>
      <p class="text-left">The purpose of this web service is to supply users with the ability to look at their stats for Halo 5. To get started, simply type your gamertag in the text field and click "Get Stats!"</p> 
      <hr />
      <div class="row">
        <div class="col-md-4">
          <p class="text-left mt-1">Don't have a gamertag? Choose from the following:</p>
        </div>
        <div class="col-md-4">
          <div id="pre-selected-gamertags">
            <button type="button" class="btn btn-outline-light">ll zD ll</button>
            <button type="button" class="btn btn-outline-light">Le Ananaz</button>
            <button type="button" class="btn btn-outline-light">Hsingh97</button>
          </div>
        </div>
      </div>
    </div>
    <div class="rounded background-light-green p-5">
      <div class="container">
        <div class="row">
          <div class="col-md-4 offset-md-4">
            <form class="form-inline pl-2">
              <div class="input-group">
                <input id="getMatches" type="text" class="form-control" size="50" placeholder="Enter Gamertag" required>
                <div class="input-group-btn">
                  <input type="button" id="submitText" class="btn btn-success" value="Get Stats!">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
    <div id="profilePage">
    </div>
    <div class="background-light-green pt-3 pb-3">
      <div id="matchHistory" class=" jumbotron-white d-none container p-5 mt-3 border border-3 border-success rounded">
        <h3>Last 10 matches with K/D <small>(Click bar for match details)</small><img class="float-right" src="/HaloStats/Halo/map_legend.PNG"/></h3>
        <div class="row pt-3 pb-3" >
          <canvas id="matchGraph" >
          </canvas>   
        </div>
      </div>
    </div>
    <div id="matchInfo">
    </div>
    <div id="compareStats">
      <div class="rounded p-5">
        <div class="container">
          <div class="row">
            <div class="col-md-6 offset-md-3">
              <form class="form-inline pl-2">
                <p class="text-left">You may compare the stats of 2 players below!</p> 
                <div class="input-group">
                  <input id="user1" type="text" class="form-control" size="80" value="ll zD ll" required>
                  <input id="user2" type="text" class="form-control" size="800" value="Le Ananaz" required>
                  <div class="input-group-btn">
                    <input type="button" id="compareSumbit" class="btn btn-success" value="Compare">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>  
        <div id="compareStatsInfo">
          
        </div>
        </div>
      </div>
    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <!-- Chart.js cdn for charting purposes -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>