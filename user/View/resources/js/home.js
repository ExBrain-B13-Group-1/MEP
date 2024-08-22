// document.querySelectorAll('#userProfile').forEach(profile => {
//     profile.addEventListener('click', function() {
//         const profileMenu = document.getElementById('profileMenu');
//         let isOpen = this.getAttribute('aria-isOpen');

//         // Set initial state if not set
//         if (isOpen === null) {
//             isOpen = 'false';
//             this.setAttribute('aria-isOpen', isOpen);
//         }

//         isOpen = isOpen === 'true';

//         if (isOpen) {
//             profileMenu.classList.add('hidden');
//             this.setAttribute('aria-isOpen', 'false');
//         } else {
//             profileMenu.classList.remove('hidden');
//             this.setAttribute('aria-isOpen', 'true');
//         }
//     });
// });

function menuForMobile () {
    if($('#userProfile').attr('aria-isOpen') === 'true'){
      $('#userProfile').css({display:'none'})
      $('#userProfile').attr('aria-isOpen',false) 
    }else{
      $('#userProfile').css({display:'block'})
      $('#userProfile').attr('aria-isOpen',true) 
    }
  }