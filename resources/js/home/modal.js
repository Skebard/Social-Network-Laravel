const modal = document.querySelector('.modal');
const newPostBtn = document.getElementById('new-post-btn-id');

function addEvents(){
    document.querySelector('html').addEventListener('click',handleModal);
    newPostBtn.addEventListener('click',openModal);
}


function openModal(){
    modal.classList.remove('hide');
}

function handleModal(e){
    let modal = e.target.closest('.modal');
    if(modal && (e.target.classList.contains('close-modal') || !e.target.closest('.modal-content'))){
        modal.classList.add('hide');
    }
}
exports.addEvents = addEvents;
