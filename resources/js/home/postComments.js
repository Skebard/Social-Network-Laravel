
const currentUsername = document.getElementById('current-username-id').value;
function postComment(e)
{
    console.log('COMMENT');
    if(e.target.classList.contains('post-comment-btn')){
        e.preventDefault();
        let commentForm = e.target.closest('.post-comment-form');
        let formData = new FormData();
        let postId= commentForm.querySelector('input[name=post_id]').value;
        let comment = commentForm.querySelector('input[name=comment]').value;
        formData.append('post_id',postId);
        formData.append('comment',comment);
        let token = commentForm.querySelector('input[name=_token]');
        fetch('/'+postId+'/comment',{
            method:'post',
            body:formData,
            headers:{
                'X-CSRF-TOKEN': token.value
            }
        })
        .then(resp=>resp.json())
        .then(data=>{
            console.log(data);
            if(data.status===1){
                let comments = commentForm.parentElement.parentElement.querySelector('.post__comments');
                let newComment = document.createElement('li');
                newComment.innerHTML = ` <a href="/user/'.${currentUsername}" class='post__comments--username'>
                    ${currentUsername}</a>
                    ${comment}`;
                    comments.querySelector('.post__comments--list').append(newComment);
                    let numComments = comments.querySelector('.num-comments').textContent;
                    if(numComments){
                        comments.querySelector('.num-comments').textContent = parseInt(numComments)+1;
                    }

            }else{
                
            }
        });
    
    }
}

exports.postComment = postComment;