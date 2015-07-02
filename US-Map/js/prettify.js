function drawStatesMap() {
        var dimension = "population";
        $.ajax({
          url: "states.json",
          dataType: "JSON"
        }).done(function(data) {
                var statesArray = [["State",dimension]];
                $.each(data.states, function() {
                    var stateitem = [this.abbrev, this[dimension]];
                    statesArray.push(stateitem);
                });
          var statesData = google.visualization.arrayToDataTable(statesArray);
          var options = {region: 'US', resolution: 'provinces'};
          var chart = new google.visualization.GeoChart(document.getElementById('chart_div'));
          chart.draw(statesData, options);
          $("h3").append(" Sorted by  "+dimension);
        });
}
google.load('visualization', '1', {'packages': ['geochart']});
google.setOnLoadCallback(drawStatesMap);
