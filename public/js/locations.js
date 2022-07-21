$("#selectCounty").change(function () {
  var county = $("#selectCounty").val();
  $("#selectConstituency").find("option").remove().end();
  $("#selectWard").find("option").remove().end();

  $.get("/api/county/" + county, function (response, status) {
    var obj = jQuery.parseJSON(response);
    $("#selectConstituency")
      .find("option")
      .end()
      .append("<option value=''>Select Constituency...</option>");
    $.each(obj, function (key, value) {
      $("#selectConstituency")
        .find("option")
        .end()
        .append("<option value='" + key + "'>" + value.toUpperCase() + "</option>");
    });
  });
});

$("#selectConstituency").change(function () {
  var constituency = $("#selectConstituency").val();
  $("#selectWard").find("option").remove().end();
  $.get("/api/constituency/" + constituency, function (response, status) {
    var obj = jQuery.parseJSON(response);
    $("#selectWard")
      .find("option")
      .end()
      .append("<option value=''>Select Ward...</option>");
    $.each(obj, function (key, value) {
      $("#selectWard")
        .find("option")
        .end()
        .append("<option value='" + key + "'>" + value.toUpperCase() + "</option>");
    });
  });
});
