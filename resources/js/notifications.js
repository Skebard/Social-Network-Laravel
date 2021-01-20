const { toSafeInteger } = require("lodash");

const body = document.querySelector('body');




body.addEventListener('click',handleNotificationBtn);


function handleNotificationBtn(e)
{
    if(e.target.classList.contains("add-friend-btn") || e.target.classList.contains('remove-friend-btn')){
        e.preventDefault();
        fetch(e.target.href)
    .then(()=>{
        if(e.target.classList.contains("add-friend-btn")){
            toastr.success('Friend added successfully');
        }else{
            toastr.success('Friend removed successfully');
        }
        e.target.closest('.round-profile-img').remove();
        
    });
    }
}
