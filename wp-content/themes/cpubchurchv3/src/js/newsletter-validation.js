jQuery(document).ready(function ($) {
  $("#newsletter-submit").click(function () {
    const form = document.querySelector(".wpcf7-form");
    var newsletterSection = form.querySelector(".newsletter-options");
    if (form) {
      const checkboxes = form.querySelectorAll(
        'input[name^="mc4wp-INTERESTS[60b117d0d0][]"]'
      );

      const existingError = form.querySelector(".newsletter-error");
      if (existingError) {
        existingError.remove();
      }

      if (!Array.from(checkboxes).some((checkbox) => checkbox.checked)) {
        const errorMsg = document.createElement("span");
        errorMsg.className = "wpcf7-not-valid-tip newsletter-error";
        errorMsg.textContent = "Must select at least one subscription option.";
        newsletterSection.after(errorMsg);
      } else {
        $("form.wpcf7-form").find(".wpcf7-submit").trigger("click");
      }
    }
  });

  // remove newsletter form validation message on change
  $(document).on(
    "change",
    'input[name="mc4wp-INTERESTS[60b117d0d0][]"]',
    function () {
      var form = $(this).closest(".wpcf7");
      var newsletterSubscriptions = form.find(
        'input[name="mc4wp-INTERESTS[60b117d0d0][]"]'
      );
      var hasChecked = newsletterSubscriptions
        .toArray()
        .some((checkbox) => checkbox.checked);

      if (hasChecked) {
        form.find(".newsletter-error").remove();
      }
    }
  );
});
