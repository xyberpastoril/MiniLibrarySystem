document.addEventListener('DOMContentLoaded', ()=>{
    let _search_btn = document.getElementById('_search_btn');
    let _search_textBox = document.getElementById('_search_textBox')
    let _advanced_search = document.getElementById('_advanced_search')
    let _genre_textBox = document.getElementById('_genre_textBox')
    let _checkBox = document.getElementById('_checkBox')
    _search_btn.addEventListener('click', async()=>{
        try{
            let res;
            let data;
            if (_advanced_search.getAttribute('clicked')=='0'){
                res = await fetch(`/result/books/search/?search=${_search_textBox.value}`)
            }
            else{
                res = await fetch(`/result/books/search/?search=${_search_textBox.value}&genres=${_genre_textBox.value}&status=${_checkBox.checked? '1' : '0'}`)
            }
            // data = await res.json()

            data = await res.json();
            console.log(data);
            // console.log(data.data)
        }catch(e){
            //please change it to notif or span-error later on
            console.log(`Something is wrong! Error: ${e}`)
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