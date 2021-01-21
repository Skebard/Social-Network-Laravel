const inputContainerContent = `
    <button class=" last multi-images-form__btn delete-image-btn multi-images-form__btn"><i class="fas fa-trash-alt"></i></button>
    <button class="  add-image-btn multi-images-form__btn"><i class="fas fa-plus"></i></button>
    <button class=" active edit-image-btn  multi-images-form__btn"><i class="far fa-edit"></i></button>
    <img class="image-display" src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-image-512.png" alt="">
    <input  type="file" name='image[]' class="multi-images-form__image-input">`;

const imagesContainer = document.getElementById("edit-images-container-id");

const POST_URL = '/api/posts/';
const descriptionInput = document.getElementById('edit-content-id');
const editPostForm = document.getElementById('edit-post-form-id');
const firstInput = document.getElementById('edit-input-1-id');
const editModal = document.getElementById('edit-modal-id');
const optionsModal = document.getElementById('post-options-modal-id');
const {BASE_URL} = require('../config');
let currentPostId;

function showEditForm(e) {
    if (e.target.tagName = 'A' && e.target.classList.contains('edit-post-option')) {
        optionsModal.classList.add('hide');
        let numImages = imagesContainer.children.length;
        Array.from(imagesContainer.children).forEach((div, index) => {
            if (index < numImages - 1) {
                div.remove();
            }

        });
        let postId = e.target.dataset.post_id;
        editModal.classList.remove('hide');
        populateModal(postId);
    }
}

function populateModal(postId) {
    currentPostId = postId;
    imagesContainer.addEventListener('click', deleteImageInput);
    firstInput.addEventListener('change', handleImageInputs)
    fetch(BASE_URL+POST_URL + postId)
        .then(resp => resp.json())
        .then(data => {
            //get description
            descriptionInput.value = data.content;
            //get post images
            data.images = data.images.sort((a, b) => b.position - a.position);
            data.images.forEach(image => {
                let imageContainer = createImageInput(image.image);
                imagesContainer.insertAdjacentElement('afterbegin', imageContainer.container);
                imageContainer.input.addEventListener('change', handleImageInputs);
            });
        });
}



/**
 * 
 * @param {} e 
 */
function deleteImageInput(e) {
    if (e.target.classList.contains('fa-trash-alt')) {
        e.target.parentElement.parentElement.remove();
    }
}

function handleImageInputs(e) {
    let input = e.currentTarget;
    //Check if a file has been selected
    let inputContainer = input.parentElement;
    if (input.files && input.files[0]) {
        let imgDisplay = inputContainer.querySelector('.image-display');
        var reader = new FileReader();

        reader.onload = function (e) {
            imgDisplay.src = e.target.result;

        };
        reader.readAsDataURL(input.files[0]);
        if (inputContainer === imagesContainer.lastElementChild) {
            //show edit icon
            inputContainer.querySelector('.add-image-btn').classList.remove('active');
            inputContainer.querySelector('.edit-image-btn').classList.add('active');
            let newInput = createImageInput();
            imagesContainer.append(newInput.container);
            newInput.input.addEventListener('change', handleImageInputs);
        }
    } else { //if the user does not select an image remove the input unless is the last one
        if (inputContainer !== imagesContainer.lastElementChild) {
            inputContainer.remove();
        }
    }

}



/**
 * Creates a new imageInput HTMLElement and returns it.
 * @return {Object} Object whose properties are the html container of the input and the input itself
 */
function createImageInput(url = undefined) {
    let inputContainer = document.createElement('div');
    inputContainer.classList.add('input-container');
    inputContainer.innerHTML = inputContainerContent;
    if (url) {
        inputContainer.querySelector('.image-display').src =BASE_URL+'/'+ url;
        inputContainer.querySelector('.delete-image-btn.last').classList.remove('last');
    } else {
        //remove last class from the previous input
        imagesContainer.querySelector('.delete-image-btn.last').classList.remove('last');
    }
    let inputImage = inputContainer.querySelector('.multi-images-form__image-input')
    return {
        container: inputContainer,
        input: inputImage
    };
}

editPostForm.addEventListener('submit', editPost);

function editPost(e) {
    e.preventDefault();
    let formData = getFormData();
    let postId = currentPostId;
    token = editPostForm.querySelector('input[name=_token]');
    fetch(BASE_URL+'/posts/' + postId + '/update', {
            method: 'post',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': token.value
            }
        })
        .then(resp => resp.json())
        .then(data => {
            if (data.status == 1) {
                location.reload();
            }else{
                toastr.error(data.message);
            }
        });

}


/**
 * Gets the data from the form and returns the images in the displayed order
 * @return {Object} Ordered array of objects where each object represe
 */
function getFormData() {
    let formData = new FormData();
    let imagesData = [];
    Array.from(imagesContainer.children).forEach((image, pos) => {
        let input = image.querySelector('input');
        //the last input is always empty so it is not saved
        if (!image.querySelector('.last')) {
            //if there is no file (length 0)
            if (input.files.length > 0) {
                formData.append('imagesFiles[]', input.files[0])
                imagesData.push({
                    type: 'file'
                });

            } else {
                imagesData.push({
                    type: 'src',
                    image: image.querySelector('.image-display').src
                });
            }
        }
    });
    formData.append('images', JSON.stringify(imagesData));
    formData.append('content', descriptionInput.value);
    return formData;
}

exports.showEditForm = showEditForm;
