const profileMenu = document.querySelector('.user-pages-links')
const upArrow = document.getElementById('up-arrow-profile-menu-id');
function openCloseProfileMenu(e)
{
    if(e.target.closest('.profile-icon')){
        profileMenu.classList.remove('hide');
        upArrow.classList.remove('hide');
    }else{
        profileMenu.classList.add('hide');
        upArrow.classList.add('hide');
    }
}

exports.openCloseProfileMenu = openCloseProfileMenu;