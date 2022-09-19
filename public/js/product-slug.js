const inputName = document.querySelector('#name');
const inputSlug = document.querySelector('#slug');

inputName.addEventListener('change', function(){
    fetch(`/dashboard/products/checkSlug?name=${inputName.value}`).then(function(response){
        return response.json()
    }).then(function(response){
        inputSlug.value = response.slug
    });
});