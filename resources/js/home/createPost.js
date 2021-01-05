const newPostForm = document.getElementById("new-post-form-id");

newPostForm
const input1= document.getElementById('input-1-id');
input1.addEventListener('change',function(e){
    if(e.currentTarget && e.currentTarget[0]){
        console.log('YES')
    }else{
        console.log('NO');
    }
});

// document.getElementById('service-image-id').addEventListener('change',readURL);
// let imgSlider = document.getElementById("visible-img-id");
// function readURL(input) {
//     input = input.currentTarget;
//         if (input.files && input.files[0]) {
//             var reader = new FileReader();

//             reader.onload = function (e) {
//                 imgSlider.src = e.target.result;

//             };
//             reader.readAsDataURL(input.files[0]);

//         }
//     }