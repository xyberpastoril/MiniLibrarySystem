document.addEventListener('DOMContentLoaded', ()=>{
    let _search_btn = document.getElementById('_search_btn');
    let _search_textBox = document.getElementById('_search_textBox')
    let _advanced_search = document.getElementById('_advanced_search')
    let _genre_textBox = document.getElementById('_genre_textBox')
    let _checkBox = document.getElementById('_checkBox')
    let _tab_main = document.getElementById('_tab_main')
    let _tab_search_res = document.getElementById('_tab_search_res')

    _search_btn.addEventListener('click', async()=>{
        try{
            let res;
            let data;
            if (_advanced_search.getAttribute('clicked')=='0'){
                res = await fetch(`/result/books/search/?search=${_search_textBox.value}`)
            }
            else{
                res = await fetch(`/result/books/search/?search=${_search_textBox.value}&genre=${_genre_textBox.value}&status=${_checkBox.checked? '1' : '0'}`)
            }

            if (_search_textBox.value==''){
                _tab_search_res.classList.replace('d-block', 'd-none')
                _tab_main.classList.replace('d-none', 'd-block')
                _tab_search_res.innerHTML = ''
                 
            }
            else{
                _tab_search_res.classList.replace('d-none', 'd-block')
                 _tab_main.classList.replace('d-block', 'd-none')

                data = await res.json()
                _tab_search_res.innerHTML = generate_book_cards(data.data)
            }
           
        }catch(e){
            //please change it to notif or span-error later on
            console.log(`Something is wrong Woof! Error: ${e} Woof~!`)
        }
       
    })
    _advanced_search.addEventListener('click', ()=>{
        if (_advanced_search.getAttribute('clicked')=='0'){
            _advanced_search.setAttribute('clicked', '1')
        }
        else{
            _advanced_search.setAttribute('clicked', '0')
        }
    })
})
generate_book_cards = (data) =>{
    let inner = '';
    if (data.length==0){
        inner += `<h3 class="fw-bold me-5 my-1">No results found.</h3>`
    }
    else {
        inner += `<h3 class="fw-bold me-5 my-1">${data.length} results found.</h3>`
        inner += '<div class="py-8 d-flex flex-row flex-wrap align-items-center justify-content-center justify-content-lg-start w-100 position-relative h-auto">'
        for(d of data){
            inner+= `<div class="card card-block me-11 my-card mb-4" style="width: 14rem;flex: 0 0 auto;">
            <img class="card-img-top" src="https://m.media-amazon.com/images/I/71ROjSv2ttL._AC_UY327_FMwebp_QL65_.jpg" alt="Book Cover" 
                style="width: 100%; height: 225px; object-fit: cover;">
            <div class="card-body p-2">
                <p class="card-text text-truncate">
                    <a href="#" class="text-gray-800 text-hover-primary mb-1">${d.title}</a>
                    <br />
                    <small class="text-muted">
                        ${d.authors.length>1? `${d.authors[0].name} and ${d.authors.length-1} others` : d.authors[0].name}
                    </small>
                </p>
            </div>
        </div>`
        }
        inner += '</div>'
    }
    return inner
}