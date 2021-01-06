const modal = document.querySelector('.modal');
const newPostBtn = document.getElementById('new-post-btn-id');

function addEvents(){
    modal.addEventListener('click',handleModal);
    newPostBtn.addEventListener('click',openModal);
}


function openModal(){
    modal.classList.remove('hide');
}

function handleModal(e){
    if(e.target.classList.contains('close-modal')){
        modal.classList.add('hide');
    }
}
exports.addEvents = addEvents;
