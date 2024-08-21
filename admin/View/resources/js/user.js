// let ID;
// (() => {
//   $("#userTable tbody").on("click", "tr", tableRowClick);
// })();

// function tableRowClick() {
//   ID = Number($($(this).children()[0]).text());
//   let name = $($(this).children()[1]).text();
//   let age = $($(this).children()[2]).text();
//   let gender = $($(this).children()[3]).text();
//   let date = $($(this).children()[4]).text();
//   let nrcFront = $($(this).children()[5]).text();  // Assuming NRC front is in the 6th column
//   let nrcBack = $($(this).children()[6]).text();   // Assuming NRC back is in the 7th column
//   let nrc_verify = Number($($(this).children()[7]).text());  // Assuming NRC status is in the 8th column

//   $("#userName").text(name);
//   $("#userID").text(ID);
//   $("#userAge").text(age);
//   $("#userGender").text(gender);
//   $("#userRegisterdDate").text(date);
//   $("#verify").text(nrc_verify);

//   // Handle NRC verification status
//   const nrcFrontElem = $("#nrcFront");
//   const nrcBackElem = $("#nrcBack");

//   if (nrc_verify === 0) {
//     nrcFrontElem.text("Pending");
//     nrcBackElem.text("Pending");
//     nrcFrontElem.removeClass("bg-gray-400").addClass("bg-yellow-400");
//     nrcBackElem.removeClass("bg-gray-400").addClass("bg-yellow-400");
//   } else if (nrc_verify === 1) {
//     nrcFrontElem.text("Verified");
//     nrcBackElem.text("Verified");
//     nrcFrontElem.removeClass("bg-gray-400").addClass("bg-green-400");
//     nrcBackElem.removeClass("bg-gray-400").addClass("bg-green-400");
//   } else if (nrc_verify === 2) {
//     nrcFrontElem.text("Rejected");
//     nrcBackElem.text("Rejected");
//     nrcFrontElem.removeClass("bg-gray-400").addClass("bg-red-400");
//     nrcBackElem.removeClass("bg-gray-400").addClass("bg-red-400");
//   } else {
//     nrcFrontElem.text("Not Given");
//     nrcBackElem.text("Not Given");
//     nrcFrontElem.removeClass("bg-gray-400").addClass("bg-gray-400");
//     nrcBackElem.removeClass("bg-gray-400").addClass("bg-gray-400");
//   }

//   $("#userBox").fadeIn(100);
// }

$(document).ready(function () {
  // Close Back
  $("#detail-view").on("click", "#close-detail", function () {
    $("#detail-view").addClass("hidden");
  });
});
