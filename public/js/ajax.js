//hien thi chi tiet san pham
const productphoto = document.querySelectorAll('.product_photo');
productphoto.forEach(element => {
    element.addEventListener('mouseover', (e) => {
        getProductDetail(element.dataset.productId);
    })
});
async function getProductDetail(productId) {
    const url = './api/product/' + productId;
    const reponse = await fetch(url);
    const result = await reponse.json();
    const divResult = document.querySelector('#result');
    divResult.innerHTML = `
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
     <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Product Detail</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body"><h4>${result.name}</h4>
        <img src="../img/product/${result.image}"class="img-fluid">
        <div class="product-price"><h4>Price&nbsp;&nbsp;${result.price}VND</h4></div>
        <div class="product-description"><h5>${result.description}</h5></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Add to Cart</button>
        </div>
      </div>
    </div>
  </div>
    `
};
//search
async function Search(keyword) {
    //buoc 1 
    if (keyword != "") {
        const url = './api/productsearch/' + keyword;
        const response = await fetch(url)
        let html = '';
        // buoc 2:
        const result = await response.json();
        //buoc 3: 
        const divSearch = document.querySelector("#product-search");
        result.forEach(element => {
            const regex = new RegExp('(' + keyword + ')', 'gi');
            const productname = element.name.replace(regex, `<b>$1</b>`)
            html += `<li class="d-flex">
      <img src="../img/product/${element.image}" alt="" style="width: 200px" class="img-fluid">
      <a href="./productDetail/${element.id}" style="color: darkolivegreen">${productname}</a></li></ul>`
        });
        divSearch.innerHTML = html;
    } else {
        divSearch.innerHTML = "";
    }
}

const btnComment = document.querySelector('#btn-comment');
btnComment.addEventListener('click', function() {
    addComment(this.dataset.productId, this.dataset.url);
});

async function addComment(productId, url) {
    const commentContent = document.querySelector('#comment_content');
    const rating = document.querySelector('#rating');
    const data = {
        product_id: productId,
        comment_content: commentContent.value,
        rating: rating.value
    };
    const response = await fetch(url, {
        method: "POST",
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify(data)
    });
    const result = await response.json();
    const divComment = document.querySelector('#comments');
    divComment.innerHTML = '';
    result.forEach(element => {
        divComment.innerHTML += `<li class="list-group-item">${element.rating} - ${element.comment_content}</li>`
    });
    commentContent.value = '';
    rating.value = '';
}