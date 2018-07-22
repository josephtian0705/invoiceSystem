// Client Invoice Table ALL / DRAFT / PAID / OVERDUE / PARTIAL
function tableAll(){
  document.getElementById("allTable").style.display = "block";
  document.getElementById("draftTable").style.display = "none";
  document.getElementById("paidTable").style.display = "none";
  document.getElementById("overdueTable").style.display = "none";
  document.getElementById("partialTable").style.display = "none";
}
function tableDraft(){
  document.getElementById("allTable").style.display = "none";
  document.getElementById("draftTable").style.display = "block";
  document.getElementById("paidTable").style.display = "none";
  document.getElementById("overdueTable").style.display = "none";
  document.getElementById("partialTable").style.display = "none";
}
function tablePaid(){
  document.getElementById("allTable").style.display = "none";
  document.getElementById("draftTable").style.display = "none";
  document.getElementById("paidTable").style.display = "block";
  document.getElementById("overdueTable").style.display = "none";
  document.getElementById("partialTable").style.display = "none";
}
function tableOverdue(){
  document.getElementById("allTable").style.display = "none";
  document.getElementById("draftTable").style.display = "none";
  document.getElementById("paidTable").style.display = "none";
  document.getElementById("overdueTable").style.display = "block";
  document.getElementById("partialTable").style.display = "none";
}
function tablePartial(){
  document.getElementById("allTable").style.display = "none";
  document.getElementById("draftTable").style.display = "none";
  document.getElementById("paidTable").style.display = "none";
  document.getElementById("overdueTable").style.display = "none";
  document.getElementById("partialTable").style.display = "block";
}