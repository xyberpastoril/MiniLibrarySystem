document.addEventListener('DOMContentLoaded', ()=>{
    let _search_btn = document.getElementById('_search_btn');
    let _search_textBox = document.getElementById('_search_textBox')
    
    _search_btn.addEventListener('click', async()=>{
        let res = await fetch(`/result/books/search/?search=${_search_textBox.value}`)
        let data = await res.json()
        
    })
})