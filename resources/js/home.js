//** MODULES */
const stories = require('./home/stories');
const posts = require('./home/posts');

const body = document.querySelector('body');

stories.slideStoriesEvents();
body.addEventListener('click', posts.postSlider);


const imagesContainer = document.getElementById("images-container-id");

const inputContainerContent = `
    <button class=" last multi-images-form__btn delete-image-btn multi-images-form__btn"><i class="fas fa-trash-alt"></i></button>
    <button class=" active add-image-btn multi-images-form__btn"><i class="fas fa-plus"></i></button>
    <button class=" edit-image-btn  multi-images-form__btn"><i class="far fa-edit"></i></button>
    <img class="image-display" src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-image-512.png" alt="">
    <input  type="file" name='image[]' class="multi-images-form__image-input">`;


const firstInput = document.getElementById('input-1-id');


firstInput.addEventListener('change', handleImageInputs);

imagesContainer.addEventListener('click',deleteImageInput);

/**
 * 
 * @param {} e 
 */
function deleteImageInput(e){
    console.log(e.target);
    if(e.target.classList.contains('fa-trash-alt')){
        e.target.parentElement.parentElement.remove();
    }
}

function handleImageInputs(e) {
    console.log(e.target);
    let input = e.currentTarget;
    console.log(imagesContainer.lastElementChild);
    //Check if a file has been selected
    let inputContainer = input.parentElement;
    if (input.files && input.files[0]) {
        console.log('YES')
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
            newInput.input.addEventListener('change',handleImageInputs);
        }
    } else {
        console.log('NO');
        if(inputContainer !== imagesContainer.lastElementChild){
            inputContainer.remove();
        }
    }
    
}

/**
 * Creates a new imageInput HTMLElement and returns it.
 * @return {Object} Object whose properties are the html container of the input and the input itself
 */
function createImageInput() {
    //remove last class from the previous input
    imagesContainer.querySelector('.delete-image-btn.last').classList.remove('last');
    let inputContainer = document.createElement('div');
    inputContainer.classList.add('input-container');
    inputContainer.innerHTML = inputContainerContent;
    let inputImage = inputContainer.querySelector('.multi-images-form__image-input')
    return {
        container: inputContainer,
        input:inputImage
    };
}
