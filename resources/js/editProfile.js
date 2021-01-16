
const privacyCheckbox = document.getElementById('privacy-checkbox-id');
const URL_UPDATE_ACCOUNT_PRIVACY = '/accounts/privacy/update';
const tokenValue = document.querySelector('.account-privacy-form input[name=_token]').value;
privacyCheckbox.addEventListener('change',updateAccountPrivacy)
function updateAccountPrivacy(e)
{
    let formData = new FormData();
    let privateVal = privacyCheckbox.checked?1:0;
    formData.append('private',privateVal);
    formData.append('_method','PUT');
    // x-www-form-urlencoded
    fetch(URL_UPDATE_ACCOUNT_PRIVACY,{
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': tokenValue
        }
    })
    .then(resp=>resp.text())
    .then(data=>console.log(data));

}