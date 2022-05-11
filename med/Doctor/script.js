function editrequest(){
    document.querySelector(".editRequest").style.display = "block";
    document.querySelector(".overlay").style.display = "block";
}

function deleteRequest(){
    location.replace("requestdeleted.php")
}

function deleteApp(){
    location.replace("appdeleted.php")
}

function addPatient(){
    document.querySelector(".addpatient").style.display = "block";
    document.querySelector(".overlay").style.display = "block";
}


function addToArchive(){
    document.querySelector(".dashboardPatientTable").style.display = "block";
    document.querySelector(".overlay").style.display = "block";
}

function closeArchivePatient(){
    document.querySelector(".dashboardPatientTable").style.display = "none";
    document.querySelector(".overlay").style.display = "none";

}