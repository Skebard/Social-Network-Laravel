const DEBOUNCE_TIME_MS = 1000;
const searchInput = document.getElementById('search-input-id');
const upArrow = document.getElementById('up-arrow-id');
const resultsContainer = document.getElementById('search-results-id');

function manageSearch() {
    resultsContainer.classList.add('hide');
    upArrow.classList.add('hide');
    var debounceTimeout;
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
    console.log(text);
    //send text to server and print
    fetch('/user/search/' + text)
        .then(resp => resp.json())
        .then(data => {
            if (data.status == 1) {
                console.log(data.users);
                let html = '';
                data.users.forEach(user => {
                    let profilePhoto = user.profile_photo_path ? user.profile_photo_path : user.profile_photo_url;
                    //console.log(profilePhoto);
                    html += `<a href="/user/${user.username}">
                <div class="profile-info">
                    <div class='round-profile-img'>
                        <div class='profile-image-container'>
                            <img src="${profilePhoto}" alt="">
                        </div>
                    </div>
                </div>
                <span class='search-results__user-info'>
                    <span class='search-username'>${user.username}</span>
                    <span class='search-name'>${user.name + user.last_name}</span>
                </span>
            </a>`;

                });
                resultsContainer.innerHTML = html;
            }

        });
    resultsContainer.classList.remove('hide');
    upArrow.classList.remove('hide');
}

function showResults(data) {

}


exports.manageSearch = manageSearch;
