// Button Carousel
document.addEventListener("DOMContentLoaded", function() {
    let carouselItems = document.querySelectorAll('.carousel-item');

    carouselItems.forEach(function(item) {
        let scrollDownButton = document.createElement('div');
        scrollDownButton.classList.add('scroll-down');
        scrollDownButton.innerHTML = '<a href="#" onclick="scrollToAbout()"><i class="fa-solid fa-circle-chevron-down fa-2xl" style="color: #fff;"></i></a>';
        item.appendChild(scrollDownButton);
    });
});
function scrollToAbout() {
    document.getElementById('about').scrollIntoView({
        behavior: 'smooth'
    });
}

// Upload Artwork
const selectImage = document.querySelector('.select-image');
const inputFile = document.querySelector('#file');
const imgArea = document.querySelector('.img-area');


selectImage.addEventListener('click', function () {
    inputFile.click();
})


inputFile.addEventListener('change', function () {
    const image = this.files[0]
    if(image.size < 2000000) {
        const reader = new FileReader();
        reader.onload = ()=> {
            const allImg = imgArea.querySelectorAll('img');
            allImg.forEach(item=> item.remove());
            const imgUrl = reader.result;
            const img = document.createElement('img');
            img.src = imgUrl;
            imgArea.appendChild(img);
            imgArea.classList.add('active');
            imgArea.dataset.img = image.name;
        }
        reader.readAsDataURL(image);
    } else {
        alert("Image size more than 2MB");
    }
})

//Upload Avatar
const avatarFileUpload = document.getElementById('AvatarFileUpload')
const imageViewer = avatarFileUpload.querySelector('.selected-image-holder>img')
const imageSelector = avatarFileUpload.querySelector('.avatar-selector-btn')
const imageInput = avatarFileUpload.querySelector('input[name="avatar"]')

imageSelector.addEventListener('click', e => {
    e.preventDefault()
    imageInput.click()
})
imageInput.addEventListener('change', e => {
    var reader = new FileReader();
    reader.onload = function(){
        imageViewer.src = reader.result;
    };
    reader.readAsDataURL(e.target.files[0]);
})