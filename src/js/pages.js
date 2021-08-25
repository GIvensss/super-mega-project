const currentPage = isNaN(Number(getId())) ? 1 : Number(getId());
const nextPage = Number(currentPage) + 1;
const prevPage = Number(currentPage) - 1;
let pageList = document.querySelector('.pagination');
const totalPages = fetchGet('/api/get/total-pages');

totalPages.then(totalPages => {
    let result = '';
    result += `<li class="page-item`;

    result += (prevPage !== 0) ? ' ">' : ' disabled">';

    result += `<a href="/products/page/${prevPage}" class="page-link">Previous Page</a></li>`;
    result += `<li class="page-item active">`;

    result += `<a href="/products/page/${currentPage}" class="page-link">${currentPage}`;
    result += `</a></li>`;

    result += `<li class="page-item`;
    result += (nextPage <= totalPages) ? ' ">' : ' disabled">';
    result += `<a href="/products/page/${nextPage}" class="page-link">Next Page</a></li>`;

    pageList.innerHTML = result;
})

