// I intentionally use old JS syntax, but i know i can simplify this into ES6 syntax

const previews = document.querySelectorAll('img.picture-input');
const imageInputs = document.querySelectorAll('input.picture-input');

// Each preview has its pair input. This should work for any amount of inputs
for(let i = 0; i < previews.length; i++){
    previews[i].addEventListener('click', function(){
        imageInputs[i].click();
    });
}

for(let i = 0; i < imageInputs.length; i++){
    imageInputs[i].addEventListener('change', function(){
        previewImage(imageInputs[i], previews[i]);
    });
}

function previewImage(input, preview){
    const oFReader = new FileReader();
    oFReader.readAsDataURL(input.files[0]);

    oFReader.onload = function(oFREvent){
        preview.src = oFREvent.target.result
    }
}