

//read tvd info
function readInfo() {

    $.get("./data/read_tvd_info.php", {}, function (data) {
            // PARSE json data
           var records = JSON.parse(data);
            // Adding existing values to the modal popup fields
            $("#infoID").val(records.ID);
            $("#nvTVDDesc").val(records.nvDesc);
            $("#nvVision").val(records.nvVision);
            $("#nvMission").val(records.nvMission);
            $("#nvPurpose").val(records.nvPurpose);
            $("#nvRegistrationRequirements").val(records.nvRegistrationRequirements);
            $("#fkiTVDStatusID").val(records.fkiStatusID).attr("selected", "selected");
        }
    );
}

function updateInfo() {
    // get  values
    var id = $("#infoID").val();
    var nvDesc = $("#nvTVDDesc").val();
    var nvVision = $("#nvVision").val();
    var nvMission = $("#nvMission").val();
    var nvPurpose = $("#nvPurpose").val();
    var nvRegistrationRequirements = $("#nvRegistrationRequirements").val();
    var fkiStatusID = $("#fkiTVDStatusID option:selected").val();

    // Update the details
    $.post("./data/update_tvd_info.php", {
        id: id,
        nvDesc: nvDesc,
        nvVision: nvVision,
        nvMission: nvMission,
        nvPurpose: nvPurpose,
        nvRegistrationRequirements: nvRegistrationRequirements,
        fkiStatusID: fkiStatusID
        },
        function (data) {

        // get affected database rows
        var count = data;
        if (count > 0){

            // show updated info
            readInfo();

            // Open the popup
            $("#modalSuccess").modal("show");
        }
        else
        {
            $("#modalFail").modal("show");
        }
    });
}

$(document).ready(function(){
  //get TVD Info
  readInfo();
  $("#error").html("");
  $("#fkiTVDStatusID").prop("selectedIndex", 0);
});


