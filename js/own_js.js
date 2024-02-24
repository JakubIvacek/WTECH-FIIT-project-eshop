function createCard(imageSrc, cardText) {
    return `
            <li style="padding: 5px;">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top img-fluid" src="${imageSrc}" height="200px" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">${cardText}</p>
                    </div>
                </div>
            </li>
        `;
}

function printCards(){
    //let cardsHTML = '<ul class="list-unstyled d-flex flex-wrap">';
    //for (let i = 1; i <= 8; i++) {
    //    cardsHTML += createCard("img/shirt-black.jpg", "Description : Card " + i);
    //}
    //cardsHTML += '</ul>';
    let cardsHTML = createCarousel(["img/shirt-black.jpg","img/shirt-black.jpg","img/shirt-black.jpg"],"Description : Card " + i)
    const cardContainer = document.getElementById('cardContainer');
    cardContainer.innerHTML = cardsHTML;
}
