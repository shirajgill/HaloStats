
$(document).ready(function(){
  $("#submitText").click(submitGamerTag);
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
      $("#profilePage").html(result.profilePage);
    }, 
    error: function(result) {
      console.log(result);
    }
  });
}

function preselectGamertag(e) {
  $("#getMatches").val($(e.currentTarget).text());
}