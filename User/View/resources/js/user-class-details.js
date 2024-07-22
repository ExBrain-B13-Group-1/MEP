/*
*Create:Thiha Thwin(18/07/2024)
*Update:Author Name(22/07/2024)
*/

// $(document).ready(function() {
//     // Toggle profile dropdown menu
//     $('#userProfile').click(function() {
//         var isOpen = $(this).attr('aria-isOpen') === 'true';
//         $(this).attr('aria-isOpen', !isOpen);
//         $('#profileMenu').toggle();
//     });

//     // Hide profile menu if clicked outside
//     $(document).click(function(event) {
//         if (!$(event.target).closest('#userProfile, #profileMenu').length) {
//             $('#profileMenu').hide();
//             $('#userProfile').attr('aria-isOpen', 'false');
//         }
//     });

//     // Toggle user dropdown menu
//     $('#userDropdownToggle').click(function() {
//         var isOpen = $(this).attr('aria-isOpen') === 'true';
//         $(this).attr('aria-isOpen', !isOpen);
//         $('#userDropdown').toggle();
//     });

//     // Hide user dropdown menu if clicked outside
//     $(document).click(function(event) {
//         if (!$(event.target).closest('#userDropdownToggle, #userDropdown').length) {
//             $('#userDropdown').hide();
//             $('#userDropdownToggle').attr('aria-isOpen', 'false');
//         }
//     });
// });

// Function for the user profile container to show when clicked
// Also a function for when user click anywhere thats not on the droped down container the show class will be removed
$(document).ready(function() {
    $('#userProfile').click(function(event) {
        event.stopPropagation();
        $('.user-drop-down-container').toggleClass('show');
    });

    $(document).click(function(event) {
        if (!$(event.target).closest('.user-drop-down-container').length && !$(event.target).closest('#userProfile').length) {
            $('.user-drop-down-container').removeClass('show');
        }
    });
});