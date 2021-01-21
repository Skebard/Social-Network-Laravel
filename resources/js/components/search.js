const DEBOUNCE_TIME_MS = 1000;
const searchInput = document.getElementById('search-input-id');
const upArrow = document.getElementById('up-arrow-id');
const resultsContainer = document.getElementById('search-results-id');
const {BASE_URL} = require('../config');


function manageSearch() {
    resultsContainer.classList.add('hide');
    upArrow.classList.add('hide');
    document.querySelector('body').addEventListener('click',(e)=>{
        if(!e.target.closest('.search')){
            upArrow.classList.add('hide');
            resultsContainer.classList.add('hide');
        }
    });
    var debounceTimeout;

    searchInput.addEventListener('focus',()=>{
        if(resultsContainer.children.length>0){
            resultsContainer.classList.remove('hide');
            upArrow.classList.remove('hide');
        }
    });
    searchInput.addEventListener('keydown', (e) => {
        clearTimeout(debounceTimeout);
        debounceTimeout = setTimeout(() => {
            searchUsers(searchInput.value)
        }, 1000);
        if (e.key === 'Enter') {
            clearTimeout(debounceTimeout);
            searchUsers(searchInput.value);
        }
    });
}

function searchUsers(text) {
    //send text to server and print
    fetch(BASE_URL+'/user/search/' + text)
        .then(resp => resp.json())
        .then(data => {
            if (data.status == 1 && data.users.length>0) {
                let html = '';
                data.users.forEach(user => {
                    let profilePhoto = user.profile_photo_path ?BASE_URL+'/'+ user.profile_photo_path : user.profile_photo_url;
                    html += `<a href="${BASE_URL}/user/${user.username}">
                <div class="profile-info">
                    <div class='round-profile-img'>
                        <div class='profile-image-container'>
                            <img src="${profilePhoto}" alt="">
                        </div>
                    </div>
                </div>
                <span class='search-results__user-info'>
                    <span class='search-username'>${user.username}</span>
                    <span class='search-name'>${user.name} ${user.lastName?user.lastName:''}</span>
                </span>
            </a>`;

                });
                resultsContainer.innerHTML = html;
                resultsContainer.classList.remove('hide');
                upArrow.classList.remove('hide');
            }

        })
        .catch(e=>{
        });

}



exports.manageSearch = manageSearch;
