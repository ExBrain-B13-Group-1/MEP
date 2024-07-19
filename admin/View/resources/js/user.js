let ID;
(() => {
  $("#userTable tbody").on("click", "tr", tableRowClick);
})();

function tableRowClick() {
  ID = Number($($(this).children()[0]).text());
  let name = $($(this).children()[1]).text();
  let age = $($(this).children()[2]).text();
  let gender = $($(this).children()[3]).text();
  let date = $($(this).children()[4]).text();
   $("#userName").text(name)
   $("#userID").text(ID)
   $("#userAge").text(age);
   $("#userGender").text(gender);
   $("#userRegisterdDate").text(date);
  
  $("#userBox").fadeIn(100);
}

$("#closeUserBox").click(() => {
  $("#userBox").fadeOut(10);
});
