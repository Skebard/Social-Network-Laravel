
const utils = require('../utils');
const body = document.querySelector('body');
const PROFILE_USER_ID = document.getElementById('profile-userId-id').value;


function handleFriendAction(e)
{
    let friendBtn = e.target.closest('.friend-action');
    if(friendBtn){
        e.preventDefault();
        let container = e.target.parentElement;
        let classes = e.target.classList;
        let newHTMLlink;
        let notification;
        //send request
        //if request succeeds show new link
        let userId = PROFILE_USER_ID;
        utils.handleRequest(friendBtn.href,(data)=>{
            console.log(data);
            if(data.status===1){
                if(classes.contains('add-friend')){
                    newHTMLlink = `<a class='remove-request friend-action edit-btn' href="/user/friend/remove/${userId}" class='edit-btn'> Request sent</a>`;
                    notification = 'Friend request sent successfully';
                }else if( classes.contains('accept-request')){
                    newHTMLlink = `<a class='remove-friend friend-action edit-btn' href="/user/friend/remove/${userId}" class='edit-btn'>Remove Friend</a>`;
                    notification = 'New friend added';
                }else if( classes.contains('decline-request')){
                    newHTMLlink = `<a class='add-friend-btn add-friend friend-action edit-btn' href="/user/friend/add/${userId}" class='edit-btn'> Add Friend</a>`;
                    notification = 'Request declined';
                }else if( classes.contains('remove-friend')){
                    newHTMLlink = `<a class='add-friend-btn add-friend friend-action edit-btn' href="/user/friend/add/${userId}" class='edit-btn'> Add Friend</a>`;
                    notification = 'Friend removed';
                }else if( classes.contains('unblock-user')){
                    notification = 'User unblocked';
                    newHTMLlink = `<a class='add-friend-btn add-friend friend-action edit-btn' href="/user/friend/add/${userId}" class='edit-btn'> Add Friend</a>`;
                }else if( classes.contains('remove-request')){
                    notification = 'Friend request removed';
                    newHTMLlink = `<a class='add-friend-btn add-friend friend-action edit-btn' href="/user/friend/add/${userId}" class='edit-btn'> Add Friend</a>`;
                }
                e.target.insertAdjacentHTML('afterend',newHTMLlink);
                e.target.remove();
                toastr.success(notification);
            }
        });
    }
}

function hideShow(container,classToShow,classToHide)
{
    console.log(container)
    container.querySelector('.'+classToShow).classList.remove('hide');
    container.querySelector('.'+classToHide).classList.add('hide');
}

exports.handleFriendAction = handleFriendAction;


