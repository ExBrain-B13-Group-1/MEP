let ID;
(() => {
  $("#instituteTable tbody").on("click", "tr", tableRowClick);
})();

function tableRowClick() {
  ID = Number($($(this).children()[0]).text());
  let name = $($(this).children()[2]).text();
   $("#instituteName").text(name)
   $("#instituteID").text(ID)
  
  $("#instituteBox").fadeIn(100);
}

$("#closeInstituteBox").click(() => {
  $("#instituteBox").fadeOut(10);
});
