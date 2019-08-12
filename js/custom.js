var matches;
$(document).ready(function(){
  $("#submitText").click(submitGamerTag);
  $(document).on("click",".getStats", function() {
    $("#getMatches").val($(this).data("gamertag"));
    submitGamerTag();
    $([document.documentElement, document.body]).animate({
      scrollTop: $("#profilePage").offset().top
    }, 1000);
  });
  $("#pre-selected-gamertags button").click(preselectGamertag);
});

function submitGamerTag() {
  $.ajax({
    type : "POST",
    url: "HaloStats/playerStats",
    data: {
      gamertag : $("#getMatches").val()
    },
    success: function(result) {
      result = JSON.parse(result);
      matches = JSON.parse(result.matches);
      $("#profilePage").html(result.profilePage);
      $("#matchGraph").replaceWith("<canvas id=\"matchGraph\" ></canvas>");   
      displayMatchGraph(matches);
      $("#matchHistory").removeClass("d-none");
      $([document.documentElement, document.body]).animate({
        scrollTop: $("#profilePage").offset().top
      }, 1000);
    }, 
    error: function(result) {
      console.log(result);
    }
  });
}

function preselectGamertag(e) {
  $("#getMatches").val($(e.currentTarget).text());
}

function getMatchColor(matchResult) {
  switch (matchResult) {
    case 0:
    case 1:
      return "rgba(150, 0, 0, 0.5)";
    case 2: 
      return "rgba(0, 0, 150, 0.5)";
    case 3: 
      return "rgba(0, 150, 0, 0.5)";
    default:
      return "rgba(150, 0, 0, 0.5)";
  }
}

function displayMatchGraph(matches) {
  var ctx = document.getElementById('matchGraph').getContext('2d');
  var labels = [];
  var colors = [];
  var totalKD = [];
  var kdr = [];
  for (let match of matches) {
    labels.push(match.playdate);
    colors.push(getMatchColor(match.resultOfMatch))
    totalKD.push([match.playerList[0].totalKills, match.playerList[0].totalDeaths]);
    if (match.playerList[0].totalDeaths == 0) {
      kdr.push(0);
    } else {
      kdr.push(Math.round((match.playerList[0].totalKills / match.playerList[0].totalDeaths) * 100) / 100);
    }
  }
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'K/D ratio',
            data: kdr,
            backgroundColor: colors,
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        legend: {
          display: false
        },
        scales: {
          xAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Time game was played'
            }
          }],
          yAxes: [{
            ticks: {
              beginAtZero: true
            },
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'KDR'
            }
          }]
        },
        tooltips: {
          callbacks: {
             afterBody: function(t, d) {
                return 'Total Kills: ' + totalKD[t[0].index][0] + "\n" + 'Total Deaths: ' + totalKD[t[0].index][1]; 
             }
          }
       },
      hover: {
        mode: 'index',
        intersect: true
      },
      annotation: {
        annotations: [{
          type: 'line',
          mode: 'horizontal',
          scaleID: 'y-axis-0',
          value: 1,
          borderColor: 'rgba(5, 192, 0, .5)',
          borderWidth: 4,
          label: {
            enabled: true,
            content: 'Positive K/D'
          }
        }]
      }
    }
  });



  $("#matchGraph").click(
    function (evt) {
        var activePoints = myChart.getElementAtEvent(evt);
        getMatchInfoFor(activePoints[0]._index);
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#matchInfo").offset().top
        }, 1000);
    }
  );
}

function getMatchInfoFor(index) {
  $.ajax({
    type : "POST",
    url: "HaloStats/match",
    data: {
      matchId : matches[index].matchId
    },
    success: function(result) {
      result = JSON.parse(result);
      $("#matchInfo").html(result);
    }, 
    error: function(result) {
      console.log(result);
    }
  });

}