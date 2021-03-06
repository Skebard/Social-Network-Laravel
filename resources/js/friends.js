const CURRENT_USER_ID = document.getElementById('current-userId-id').value;
const PROFILE_USER_ID = document.getElementById('profile-userId-id').value;
const body = document.querySelector('body');
const friendsModal = document.getElementById('friends-modal-id');
const friendsContainer = document.getElementById('friends-container-id');

const utils = require('./utils');
const relationship = require('./components/relationships');
const {BASE_URL} = require('./config');
body.addEventListener("click",relationship.handleFriendAction);
body.addEventListener("click", showFriends);

function showFriends(e) {
    if (e.target.closest('#friends-btn-id')) {
        utils.handleRequest(BASE_URL+'/user/' + PROFILE_USER_ID + '/friends',populateFriends);
    }

}


function populateFriends(data) {

    let friends = data.profileFriends;
    let html = '';
    friends.forEach(friend => {
        let profilePhoto =friend.profile_photo_path ?BASE_URL+'/'+ friend.profile_photo_path : friend.profile_photo_url;
        html += `
        <li>
                        <a href="${BASE_URL}/user/${friend.username}">
                            <div class="profile-info">
                                <div class='round-profile-img'>
                                    <div class='profile-image-container'>
                                        <img src="${profilePhoto}" alt="profile photo">
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
                        html += `<a href='${BASE_URL}/user/friend/accept/${friend.id}' class='accept-request edit-btn m-width friend-action'>Accept Request</a>`;
                    }else{
                        html += `<a href='${BASE_URL}/user/friend/cancelRequest/${friend.id}' class='remove-request edit-btn m-width friend-action'>Request Sent</a>`;
                    }
                    break;
                case 1:
                    html += `<a href='${BASE_URL}/user/friend/remove/${friend.id}' class='remove-friend  edit-btn m-width friend-action'>Remove Friend</a>`;
                    break;
                case 2:
                    html += `<a href='${BASE_URL}/user/friend/add/${friend.id}' class='add-friend edit-btn m-width friend-action action-btn'>Add Friend</a>`;
                    break;
                case 3:
                    if(rel[0].user_action_id!==friend.id){
                        html += `<a href='${BASE_URL}/user/friend/unblock/${friend.id}' class='unblock-user edit-btn m-width friend-action'>Unblock</a>`;
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
