@extends('layouts.master_home')

@section('content')
@endsection('content')

@section('modals')

<!-- CREATE POST -->
<div class="hide modal create-post">
    <div class="modal-content">
        <button class="close-modal">
            Close modal
        </button>

        <form id='new-post-form-id' class='new-post-form multi-images-form' action="/posts" method='POST' enctype="multipart/form-data">
            @csrf
            <textarea name="content" id="" cols="30" rows="10"></textarea>
            <div class="images-container" id='images-container-id'>
                <div class="input-container">
                    <div class=" last multi-images-form__btn delete-image-btn multi-images-form__btn"><i class="fas fa-trash-alt"></i></div>
                    <button class=" active add-image-btn multi-images-form__btn"><i class="fas fa-plus"></i></button>
                    <div class=" edit-image-btn  multi-images-form__btn"><i class="far fa-edit"></i></div>
                    <img class='image-display' src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-image-512.png" alt="">
                    <input id='input-1-id' type="file" name='image[]' class="multi-images-form__image-input">
                </div>

            </div>
            <!-- <input type='file' name='image[]' data-pos='1'> -->

            @error('image')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <button type='submit'>Create</button>
            <button>Cancel</button>
        </form>
    </div>
</div>

@endsection('modals')