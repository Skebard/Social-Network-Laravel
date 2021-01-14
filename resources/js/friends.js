const CURRENT_USER_ID = document.getElementById('current-userId-id').value;
const PROFILE_USER_ID = document.getElementById('profile-userId-id').value;
const body = document.querySelector('body');
const friendsModal = document.getElementById('friends-modal-id');
const friendsContainer = document.getElementById('friends-container-id');

const utils = require('./utils');
const relationship = require('./components/relationships');

body.addEventListener("click",relationship.handleFriendAction);
body.addEventListener("click", showFriends);

function showFriends(e) {
    if (e.target.closest('#friends-btn-id')) {
        utils.handleRequest('/user/' + PROFILE_USER_ID + '/friends',populateFriends);
    }

}


function populateFriends(data) {

    let friends = data.profileFriends;
    let html = '';
    friends.forEach(friend => {
        html += `
        <li>
                        <a href="/user/${friend.username}">
                            <div class="profile-info">
                                <div class='round-profile-img'>
                                    <div class='profile-image-container'>
                                        <img src="${friend.profile_photo_url}" alt="">
                                    </div>
                                </div>
                            </div>
                            <span class='friends-modal__user-info'>
                                <span class='search-username'>${friend.username}</span>
                                <span class='search-name'>${friend.name}</span>
                            </span>
                        </a>
                            `;
        let rel = data.loggedUserRelationships.filter(relationship => {
            if (friend.id == CURRENT_USER_ID) {
                return false
            } else if (relationship.user_one_id === friend.id || relationship.user_two_id === friend.id) {
                return true;
            }
            return false;
        });
        if (rel[0]) {
            switch (rel[0].status) {
                case 0:
                    if(rel[0].user_action_id===friend.id){
                        html += `<a href='/user/friend/accept/${friend.id}' class='edit-btn m-width'>Accept Request</a>`;
                    }else{
                        html += `<a href='/user/friend/cancelRequest/${friend.id}' class='edit-btn m-width'>Request Sent</a>`;
                    }
                    break;
                case 1:
                    html += `<a href='/user/friend/remove/${friend.id}' class='edit-btn m-width'>Remove Friend</a>`;
                    break;
                case 2:
                    html += `<a href='/user/friend/add/${friend.id}' class='edit-btn m-width'>Add Friend</a>`;
                    break;
                case 3:
                    if(rel[0].user_action_id!==friend.id){
                        html += `<a href='/user/friend/unblock/${friend.id}' class='edit-btn m-width'>Unblock</a>`;
                    }
                    break;
            }
        } else { // the friend it is the same user that is looking the profile
            html += ` `;
        }
        html += `</li>`;
    });
    friendsContainer.innerHTML = html;
    friendsModal.classList.remove('hide');
}
