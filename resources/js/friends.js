const CURRENT_USER_ID = document.getElementById('current-userId-id').value;
const PROFILE_USER_ID = document.getElementById('profile-userId-id').value;
const body = document.querySelector('body');
const friendsModal = document.getElementById('friends-modal-id');
const friendsContainer = document.getElementById('friends-container-id');

body.addEventListener("click",showFriends);

function showFriends(e)
{
    if(e.target.closest('#friends-btn-id')){
        getFriends()
        .then(populateFriends);
        friendsModal.classList.remove('hide');
    }

}
function getFriends()
{
    return fetch('/user/'+PROFILE_USER_ID+'/friends')
    .then(resp=>resp.json());
}
function populateFriends(friends)
{
    let html='';
    friends.forEach(friend=>{
        html+=`
        <li>
                        <a href="#">
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
                            <a href='#' class='edit-btn m-width'>Remove Friend</a>
                        </a>
                    </li>
        `;
    });
    friendsContainer.innerHTML = html;

}