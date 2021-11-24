document.addEventListener('DOMContentLoaded', async()=>{
    let key = document.getElementById('_table_transactions').getAttribute('key')
    window.data = await fetch_transactions(key) // tbd
    let _table_body = document.getElementById('_table_body')
    let _search_text = document.getElementById('_search_text')
    
    if (data){
        if (key == 'waiting'){
            _table_body.innerHTML = _generate_rows_approval(data.data)
            init_Buttons('_buttonCancel')
        }
        else if (key == 'progress'){
            _table_body.innerHTML = _generate_rows_progress(data.data)
        }
    }
    let data_temp = _table_body.innerHTML
    _search_text.addEventListener('input', ()=>{
        if (_search_text.value!=''){
            _table_body.innerHTML = search_from_rows(_search_text.value, key)
        }
        else{
            _table_body.innerHTML = data_temp
        }

        if (key=='waiting'){
            init_Buttons('_buttonCancel')
        }
    })
    
})
fetch_transactions = async(status) =>{
    try{
        let raws = await fetch(`/result/transactions/search/?status=${status}`)
        let data = await raws.json()
        return data
    }catch(e){
        console.log('Woof! Something is wrong!!~')
        return null
    }
}
_generate_rows_approval = (data) =>{
    let inner = ''
    for (d of data){
        inner+=`
        <!--begin::Table row | Book -->
                <tr class="_waiting" table_id= ${d.id} book_isbn=${d.isbn}>
                    <!-- Checkbox -->
                    <td>
                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" value="1">
                        </div>
                    </td>

                    <!-- Transaction Number -->
                    <td class>${d.id}</td>

                    <!-- Book ID / ISBN -->
                    <td>
                        <a href="#" class="text-gray-800 text-hover-primary mb-1">${d.isbn}</a>
                    </td>

                    <!-- Request Date -->
                    <td>${(new Date(d.created_at)).toLocaleString([], {year: 'numeric', month: 'short', day: 'numeric', hour: '2-digit', minute: '2-digit'})}</td>

                    <!-- From -->
                    <td></td>

                    <!-- To -->
                    <td></td>

                    <!-- Copies -->
                    <td>TBD</td>
                    
                    <!-- Actions -->
                    <td class="text-end">
                        <a id="returnedButton" class="btn btn-light btn-danger btn-sm _buttonCancel" fetch_id='${d.id}'>Cancel
                        </a>
                    </td>
                </tr>`
    }
    return inner
}
_generate_rows_progress = (data) =>{
    let inner = ''
    for (d of data){
        inner+=`
        <!--begin::Table row | Book -->
                <tr class='_progress' table_id= ${d.id} book_isbn=${d.isbn}>

                    <!-- Transaction Number -->
                    <td class>${d.id}</td>

                    <!-- Book ID / ISBN -->
                    <td>
                        <a href="#" class="text-gray-800 text-hover-primary mb-1">${d.isbn}</a>
                    </td>

                    <!-- Accepted Date -->
                    <td>TBD</td>

                    <!-- From -->
                    <td>${(new Date(d.date_from)).toLocaleString([], {year: 'numeric', month: 'short', day: 'numeric'})}</td>

                    <!-- To -->
                    <td>${(new Date(d.date_to)).toLocaleString([], {year: 'numeric', month: 'short', day: 'numeric'})}</td>

                    <!-- Copies -->
                    <td>TBD</td>

                    <!-- Penalty -->
                    <td>NaN</td>

                    <!-- Status -->
                    <td>
                        <span class="badge badge-light-success">Pending</span>
                    </td>
                </tr>
                <!--end::Table row | Book -->`
    }
    return inner
}
init_Buttons = (className) => {
    let btns = document.getElementsByClassName(className)
    for (_bt of btns){
        _bt.addEventListener('click', async()=>{
            console.log(_bt.getAttribute('fetch_id'))
        })
    }
}
search_from_rows = (keyword, key) =>{
    if (key=='waiting'){
        return _generate_rows_approval(window.data.data.filter(x => x.id == keyword || x.isbn == keyword))
    }
    else if (key =='progress'){
        return _generate_rows_progress(window.data.data.filter(x => x.id == keyword || x.isbn == keyword))
    }
}
