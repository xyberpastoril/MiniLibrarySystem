document.addEventListener('DOMContentLoaded', ()=>{
    let _search_btn = document.getElementById('_search_btn');
    let _search_textBox = document.getElementById('_search_textBox')
    let _advanced_search = document.getElementById('kt_horizontal_search_advanced_link')
    let _genre_textBox = document.getElementById('_genre_textBox')
    let _checkBox = document.getElementById('flexSwitchChecked')
    let _tab_main = document.getElementById('_tab_main')
    let _tab_search_res = document.getElementById('_tab_search_res')
    _search_btn.addEventListener('click', async()=>{
        try{
            let res;
            let data;
            let genre_array
            if (_advanced_search.getAttribute('clicked')=='0'){
                res = await fetch(`/result/books/search/?search=${_search_textBox.value}`)
            }
            else{
                 genre_array = _genre_textBox.value!=''? genre_toString(JSON.parse(_genre_textBox.value)) : ''
                //console.log(genre_array)
                res = await fetch(`/result/books/search/?search=${_search_textBox.value}&genres=${genre_array}&status=${_checkBox.checked ? 1 : 0}`)
            }
            data = await res.json()
            //console.log(data)
            if (_search_textBox.value==''){
                if (_advanced_search.getAttribute('clicked')!='0'){
                    _tab_search_res.classList.replace('d-none', 'd-block')
                    _tab_main.classList.replace('d-block', 'd-none')
                    _tab_search_res.innerHTML = generate_book_cards(data, data.length)
                }
                else{
                    _tab_search_res.classList.replace('d-block', 'd-none')
                    _tab_main.classList.replace('d-none', 'd-block')
                    _tab_search_res.innerHTML = ''
                }
                
            }
            else{
                _tab_search_res.classList.replace('d-none', 'd-block')
                _tab_main.classList.replace('d-block', 'd-none')

               _tab_search_res.innerHTML = generate_book_cards(data, data.length)
            }
           
        }catch(e){
            //please change it to notif or span-error later on
            console.log(`Something is wrong Woof! Error: ${e} Woof~!`)
        }
       
    })
    _advanced_search.addEventListener('click', (e)=>{
        if (_advanced_search.getAttribute('clicked')=='0'){
            _advanced_search.setAttribute('clicked', '1')
        }
        else{
            genre_array=''
            _advanced_search.setAttribute('clicked', '0')
        }
        //console.log(_advanced_search.getAttribute('clicked'))
    })
})
generate_book_cards = (data, count) =>{
    let inner = '';
    if (count==0){
        inner += `<h3 class="fw-bold me-5 my-1">No results found.</h3>`
    }
    else {
        inner += `<h3 class="fw-bold me-5 my-1">${count} result(s) found.</h3>`
        inner += '<div class="py-8 d-flex flex-row flex-wrap align-items-center justify-content-center justify-content-lg-start w-100 position-relative h-auto">'
        for(d of data){
            inner+= `
            <div class="card card-block my-card cursor-pointer shadow" style="width: 14rem;flex: 0 0 auto;" onclick="window.location.href= '/books/${d.id}';">
            <img class="card-img-top" src="${d.cover_url == null ? '/media/books/blank.jpg' : 'media/books/'+d.cover_url}" alt="Book Cover"
            style="width: 100%; height: 225px; object-fit: cover;">
            <div class="card-body p-2">
               <p class="card-text text-truncate">
                  <span class="text-gray-800 mb-1">${d.title}</span>
                  <br />
                  <small class="text-muted">
                  ${d.authors.length>1 ? d.authors[0].name + ` and ${d.authors.length-1} other(s)` : d.authors[0].name}
                  </small>
               </p>
            </div>
         </div>`
        }
        //inner += '</div>'
    }
    return inner
}
genre_toString = (arr) => {
    let newArr = []
    for(a of arr){
        newArr.push(a['value'])
    }
    //console.log(newArr)
    return newArr.join(',')
}