const privacyCheckbox = document.getElementById('privacy-checkbox-id');
const URL_UPDATE_ACCOUNT_PRIVACY = '/accounts/privacy/update';
const tokenValue = document.querySelector('.account-privacy-form input[name=_token]').value;
const ALLOWED_TYPES = ['jpeg','gif','png'];

const profileImgDisplay = document.getElementById('profile-image-display-id');
const changeImgInput = document.getElementById('change-image-input-id');
const changeImgInputImage = document.getElementById('change-image-input-image-id');

privacyCheckbox.addEventListener('change', updateAccountPrivacy)
changeImgInput.addEventListener('change',handleProfilePhoto);
changeImgInputImage.addEventListener('change',handleProfilePhoto);


function updateAccountPrivacy(e) {
    let formData = new FormData();
    let privateVal = privacyCheckbox.checked ? 1 : 0;
    formData.append('private', privateVal);
    formData.append('_method', 'PUT');
    // x-www-form-urlencoded
    fetch(URL_UPDATE_ACCOUNT_PRIVACY, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': tokenValue
            }
        })
        .then(resp => resp.json())
        .then(data => {
            if (data.status === 0) {
                privacyCheckbox.checked = !privacyCheckbox.checked;
                toastr.warning('Something went wrong. Please try again');
            }
        });
}


function handleProfilePhoto(e) {
    let input = e.target;
    if (input.files && input.files[0]) {
        updateProfilePhoto(input.files[0]);
        showPhoto(input.files[0]);
    }
}

function showPhoto(file)
{
    var reader = new FileReader();
    reader.onload = function(e){
        console.log(file.type);
        profileImgDisplay.src = e.target.result;
    }
    reader.readAsDataURL(file);
}


function updateProfilePhoto(file)
{
    let formData = new FormData();
    formData.append('_method','PUT');
    formData.append('profile_photo',file)
    fetch('/accounts/photo/update', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': tokenValue
        }
    })
    .then(resp=>resp.text())
    .then(data=>console.log(data));
}
