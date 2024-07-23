function profileMenu(type) {
  const profile = $("#profileSetting").children()[0];
  const photo = $("#profileSetting").children()[1];
  const account = $("#profileSetting").children()[2];

  switch (type) {
    case "general":
      $(profile).attr("aria-active", true);
      $(photo).attr("aria-active", false);
      $(account).attr("aria-active", false);

      $("#accountSection").fadeOut();
      $("#photoSection").fadeOut();
      $("#profileSection").fadeIn(100);
      break;
    case "photo":
      $(profile).attr("aria-active", false);
      $(photo).attr("aria-active", true);
      $(account).attr("aria-active", false);

      $("#accountSection").fadeOut();
      $("#profileSection").fadeOut();
      $("#photoSection").fadeIn(100);
      break;

    case "account":
      $(profile).attr("aria-active", false);
      $(photo).attr("aria-active", false);
      $(account).attr("aria-active", true);

      $("#profileSection").fadeOut();
      $("#photoSection").fadeOut();
      $("#accountSection").fadeIn(100);
      break;

    default:
      break;
  }
}
