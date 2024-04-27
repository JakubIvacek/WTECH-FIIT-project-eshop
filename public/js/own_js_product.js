
const ddSelect = document.getElementById('dd');
const sizeSelect = document.getElementById('size');

// Event listener for the dropdown select
ddSelect.addEventListener('change', function () {
    localStorage.setItem('ddSelection', ddSelect.value);
});

// Event listener for the size select
sizeSelect.addEventListener('change', function () {
    localStorage.setItem('sizeSelection', sizeSelect.value);
});
function addToCart(){
    const id  = localStorage.getItem('product');
    const sizeSelection = localStorage.getItem('sizeSelection');
    const contSelection = localStorage.getItem('ddSelection');
    window.location.href = 'cart/' + id + '/' + contSelection + '/' + sizeSelection
}
