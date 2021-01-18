const currentUsername = document.getElementById('current-username-id').value;



/** 
 * 
 * @param {Event} e 
 */
function postComment(e) {
    if (e.target.classList.contains('post-comment-btn')) {
        e.preventDefault();
        let commentForm = e.target.closest('.post-comment-form');
        let formData = new FormData();
        let postId = commentForm.querySelector('input[name=post_id]').value;
        let comment = commentForm.querySelector('input[name=comment]').value;
        formData.append('post_id', postId);
        formData.append('comment', comment);
        let token = commentForm.querySelector('input[name=_token]');
        fetch('/' + postId + '/comment', {
                method: 'post',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': token.value
                }
            })
            .then(resp => resp.json())
            .then(data => {
                if (data.status === 1) {
                    let comments = commentForm.parentElement.parentElement.querySelector('.post__comments');
                    let newComment = document.createElement('li');
                    let commentWords = comment.split(' ');
                    commentWords = commentWords.map(word=>{
                        if(word.includes('@')){
                            let taggedUser = word.substr(1);
                            return `<a class="username-tag" href="/user/${taggedUser}">${word}</a>`;
                        }
                        return word;
                    });
                    comment = commentWords.join(' ');

                    newComment.innerHTML = ` <a href="/user/'.${currentUsername}" class='post__comments--username'>
                    ${currentUsername}</a>
                    ${comment}`;
                    comments.querySelector('.post__comments--list').append(newComment);
                    let numComments = comments.querySelector('.num-comments');
                    if (numComments) {
                        comments.querySelector('.num-comments').textContent = parseInt(numComments.textContent) + 1;
                    }
                    currentInput.value='';
                    toastr.success('Post commented');
                } else {}
            });
    }
}

let currentTagUser;
let taggingUser = false;
const regex = /^[ A-Za-z0-9()[\]+-/%]*$/;
let currentInput;
let displayedUsers;

function recommendUserTag(e) {
    if (e.target.tagName === 'INPUT' && e.target.name === 'comment') {
        currentInput = e.target;
        if (taggingUser) {

            if (e.key === '@') {
                currentTagUser = '';
                searchUser(currentTagUser);
            } else if (e.key === 'Enter' || e.key === ' ') {
                taggingUser = false;
                if (displayedUsers) {
                    displayedUsers.remove();
                    displayedUsers = undefined;
                }
            } else if (e.key.length === 1 && regex.test(e.key)) {
                currentTagUser += e.key;
                //search user
                searchUser(currentTagUser);
            } else if (e.key === 'Backspace') {
                if(currentTagUser.length===0){//we have deleted the @
                    taggingUser = false;
                    if(displayedUsers){
                        displayedUsers.remove();
                        displayedUsers=undefined;
                    }
                    return false;
                }
                currentTagUser = currentTagUser.substr(0, currentTagUser.length - 1);
                //serach user 
                searchUser(currentTagUser);

            } else {
                taggingUser = false;
            }
        } else {
            if (e.key === '@') {
                currentTagUser = '';
                taggingUser = true;
            }else if (e.key==='Backspace'){ //check if we are back to a @adf...
                let currentText = currentInput.value; // we must exclude the deleted char by the backspace
                if(currentText.length>0){
                    currentText = currentText.substr(0,currentText.length-1);
                }
                let words = currentText.split(' ');
                let lastWord = words[words.length-1];
                if(lastWord.includes('@')){
                    currentTagUser = lastWord.replace('@','');
                    searchUser(currentTagUser);
                    taggingUser=true;
                }
            }
        }
    }

}

const SEARCH_USERS_URL = '/user/friends/search/';

function searchUser(text) {
    if (text.length === 0) {
        return false;
    }
    fetch(SEARCH_USERS_URL + text)
        .then(resp => resp.json())
        .then(data => {
            showPossibleTagUsers(data.users);

        });
}

function showPossibleTagUsers(users) {
    let form = currentInput.closest('.post-comment-form');

    let existentContainer = form.querySelector('.container-tag-users');
    if (existentContainer) {
        existentContainer.remove();
    }
    if (users.length === 0) {
        return false;
    }
    let container = document.createElement('ul');
    container.classList.add('container-tag-users');
    container.classList.add('box');
    users.forEach(user => {

        container.innerHTML += `<div class="round-profile-img user-to-tag" >
                    <div class="profile-image-container">
                        <img src="/${user.profile_photo_path}" alt="">
    
                    </div>
                    <a href="http://localhost:8000/user/Tija" class="post__username">
                        ${user.username}
                    </a>
                </div>`
    });

    displayedUsers = container;
    form.append(container);
}

function insertTagUser(e)
{


    let tagContainer = e.target.closest('.user-to-tag')
    if(tagContainer){
        e.preventDefault();
        let username = tagContainer.querySelector('.post__username').innerText;
        let words = currentInput.value.split(' ');
        words[words.length-1] = '@'+username;
        currentInput.value = words.join(' ');
        displayedUsers.remove();
        displayedUsers = undefined;
        currentInput.focus();

    }
}

exports.postComment = postComment;
exports.recommendUserTag = recommendUserTag;
exports.insertTagUser = insertTagUser;
